<?php

namespace App\Models;

use Eloquent as Model;

class Locality extends Model
{
    public $table = 'localities';
    public $timestamps = true;

    public $fillable = [
        'name',
        'user_id',
        'ciudad_id'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'ciudad_id' => 'integer',
        'user_id' => 'integer'
    ];

    public function usuario(){
        return $this->hasOne(User::class,'id','user_id');
    } 
    public function ciudad(){
        return $this->hasOne(Ciudad::class,'id','ciudad_id');
    } 
}