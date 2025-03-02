<?php

namespace App\Models;

use Eloquent as Model;

class Empresa extends Model
{
    public $table = 'empresas';
    public $timestamps = true;

    public $fillable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'celular',
        'ciudad_id',
        'sobre_nosotros',
        'mision',
        'vision',
        'video_inst',
        'ubicacion_maps',
        'facebook',
        'instagram',
        'linkedin',
        'observaciones',
        'logo',
        'estado',
        'user_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'nit' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'celular' => 'string',
        'ciudad_id' => 'integer',
        'sobre_nosotros' => 'string',
        'mision' => 'string',
        'vision' => 'string',
        'video_inst' => 'string',
        'ubicacion_maps' => 'string',
        'facebook' => 'string',
        'instagram' => 'string',
        'linkedin' => 'string',
        'observaciones' => 'string',
        'logo' => 'string',
        'estado' => 'integer',
        'user_id' => 'integer'
    ];
    
    public static $rules = [

    ];
    public function ciudad(){
        return $this->hasOne(Ciudad::class,'id','ciudad_id');
    }
    public function usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function servicios(){
        return $this->hasMany(EmpresaServicio::class,'empresa_id','id');
    }
}