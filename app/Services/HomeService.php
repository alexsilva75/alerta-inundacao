<?php
namespace App\Services;

use App\Models\Incidente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HomeService{

    public function fetchActiveIncidents($cidade, $uf)
    {
        return Incidente::where('cidade', $cidade)
                        ->where('uf', $uf)
                        ->where('ativo', true)
                        ->get();
    }

    public function fetchIncidents($cidade, $uf, $ativo)
    {
        return Incidente::where('cidade', $cidade)
                        ->where('uf', $uf)
                        ->where('ativo', $ativo)
                        ->get();
    }

    public function fetchStats($cidade, $uf){
        $stats =  Incidente::query()
            ->select([
                'cidade',
                'uf',
                DB::raw('COUNT(*) as total_incidentes'),
                DB::raw('SUM(CASE WHEN ativo = 1 THEN 1 ELSE 0 END) as incidentes_ativos'),
                DB::raw('MAX(data_hora) AS ultimo_incidente'),
            ])->where('cidade', $cidade)
                ->where('uf', $uf)                
            ->groupBy([
                'cidade',
                'uf'
            ])->first();

        if ($stats?->ultimo_incidente) {
            $stats->ultimo_incidente = Carbon::parse(
                $stats->ultimo_incidente,
                'UTC'
            )->setTimezone('America/Sao_Paulo');
        }

        return $stats;
    }

    public function fetchHomeData($cidade, $uf){
        $incidentes = $this->fetchActiveIncidents($cidade, $uf);
        $stats = $this->fetchStats($cidade, $uf);

        return ['incidentes' => $incidentes, 'stats' => $stats];
    }

    public function homeSearch($cidade, $uf, $ativo){
        $incidentes = $this->fetchIncidents($cidade, $uf, $ativo);
        $stats = $this->fetchStats($cidade, $uf);

        return ['incidentes' => $incidentes, 'stats' => $stats];
    }
}
