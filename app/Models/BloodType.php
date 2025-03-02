<?php

namespace App\Models;

use Eloquent as Model;

class BloodType extends Model
{
    public $table = 'blood_types';
    public $timestamps = true;

    public $fillable = [
        'name',
        'user_id'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'user_id' => 'integer'
    ];

    public function usuario(){
        return $this->hasOne(User::class,'id','user_id');
    } 
}