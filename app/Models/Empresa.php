<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'tb_empresa';
    protected $primaryKey = 'pk_empresa';

    protected $fillable = [
        'razao_social',
        'cnpj',
        'uf',
    ];

    public function relCliente()
    {
        return $this->hasMany('App\Models\Cliente', 'fk_empresa');
    }
}
