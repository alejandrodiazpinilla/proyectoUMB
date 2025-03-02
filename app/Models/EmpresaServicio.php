<?php

namespace App\Models;

use Eloquent as Model;

class EmpresaServicio extends Model
{
    public $table = 'empresas_servicios';
    public $timestamps = false;

    public $fillable = [
        'empresa_id',
        'nombre',
        'imagen',
        'descripcion'
    ];

    protected $casts = [
        'empresa_id' => 'integer',
        'nombre' => 'string',
        'imagen' => 'string',
        'descripcion' => 'string'
    ];

    public function empresa(){
        return $this->hasOne(Empresa::class,'id','empresa_id');
    }
}