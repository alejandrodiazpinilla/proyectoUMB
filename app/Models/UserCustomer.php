<?php

namespace App\Models;

use Eloquent as Model;

class UserCustomer extends Model
{
    public $table = 'user_customers';
    public $timestamps = true;


    public $fillable = [
        'user_id',
        'customer_id'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'customer_id' => 'integer'
    ];
    
    public static $rules = [

    ];

    public function customer(){
        return $this->hasOne(Customer::class,'id','customer_id');
    } 
    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    } 
}