<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = 'tb_telefone';
    protected $primaryKey = 'pk_telefone';

    protected $fillable = [
        'ddd',
        'telefone',
        'fk_cliente',
    ];

    public function relCliente()
    {
        return $this->hasOne('App\Models\Cliente', 'pk_cliente', 'fk_cliente');
    }
}
