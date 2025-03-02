<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    public $table = 'areas';
    public $timestamps = true;


    public $fillable = [
        'user_id',
        'empresa_id',
        'nombre'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'empresa_id' => 'integer',
        'nombre' => 'string'
    ];
    
    public static $rules = [

    ];

    public function empresas(){
        return $this->hasOne(Empresa::class,'id','empresa_id');
    } 
    public function usuario(){
        return $this->hasOne(User::class,'id','user_id');
    } 
}