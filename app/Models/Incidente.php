<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Confirmacao;


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
}
