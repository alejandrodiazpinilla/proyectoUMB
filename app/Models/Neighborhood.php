<?php

namespace App\Models;

use Eloquent as Model;

class Neighborhood extends Model
{
    public $table = 'neighborhoods';
    public $timestamps = true;

    public $fillable = [
        'name',
        'user_id',
        'locality_id'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'locality_id' => 'integer',
        'user_id' => 'integer'
    ];

    public function usuario(){
        return $this->hasOne(User::class,'id','user_id');
    } 
    public function localidad(){
        return $this->hasOne(Locality::class,'id','locality_id');
    } 
}