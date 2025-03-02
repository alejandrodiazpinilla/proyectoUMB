<?php

namespace App\Models;

use Eloquent as Model;

class CustomerTracing extends Model
{
    public $table = 'customers_tracing';
    public $timestamps = true;


    public $fillable = [
        'customer_id',
        'send_brochure',
        'email',
        'date_of_visit',
        'obs',
        'user_id'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'customer_id' => 'integer',
        'send_brochure' => 'string',
        'email' => 'string',
        'date_of_visit' => 'string',
        'obs' => 'string',
        'user_id' => 'integer'
    ];
    public function rel_cliente(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}