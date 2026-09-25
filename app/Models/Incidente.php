<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Confirmacao;
use DateTimeInterface;

class Incidente extends Model
{
    //
    protected $fillable = [
                            'titulo',
                            'descricao',
                            'data_hora',
                            'bairro',
                            'cidade',
                            'uf',
                            'latitude',
                            'longitude',                           
                            'user_id',
                            'nivel_severidade',
                            'ativo',
                        ];

    public function confirmacoes(): HasMany{
        return $this->hasMany(Confirmacao::class);
    }


    protected function casts(): array
    {
        return [
            'data_hora' => 'datetime',
        ];
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->utc()->toISOString();
    }

}
