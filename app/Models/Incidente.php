<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\OneToMany;
use App\Models\Confirmacao;


class Incidente extends Model
{
    //
    protected $fillable = [
                            'titulo',
                            'descricao',
                            'data_hora',
                            'latitude',
                            'longitude',
                            'bairro',
                            'cidade',
                            'uf',
                        ];

    public function confirmacoes(): OneToMany{
        return $this->oneToMany(Confirmacao::class);
    }
}
