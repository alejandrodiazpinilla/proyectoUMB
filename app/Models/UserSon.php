<?php

namespace App\Models;

use Eloquent as Model;

class UserSon extends Model
{
    public $table = 'users_sons';
    public $timestamps = false;

    public $fillable = [
        'son_name',
        'birthdate',
        'user_id',
        'gender',
        'city_id'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'son_name' => 'string',
        'birthdate' => 'string',
        'user_id' => 'integer',
        'gender' => 'string',
        'city_id' => 'integer'
    ];

}