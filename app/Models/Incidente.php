<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Confirmacao;
use DateTimeInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
                            'foto_url'
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


    protected function fotoUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value
                ? Storage::url($value)
                : null,
        );
    }

}
