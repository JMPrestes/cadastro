<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = 'telefone';

    protected $fillable = [
        'ddd',
        'telefone',
        'cliente_id',
    ];

    public function relCliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
}
