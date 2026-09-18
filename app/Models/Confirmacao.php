<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confirmacao extends Model
{
    //
    protected $table = 'confirmacoes';
    protected $fillable = [
        'comentario',
        'incidente_id',
        'user_id',        
    ];
}
