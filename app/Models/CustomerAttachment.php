<?php

namespace App\Models;

use Eloquent as Model;

class CustomerAttachment extends Model
{
    public $table = 'customers_attachments';
    public $timestamps = true;

    public $fillable = [
        'name',
        'date_send',
        'bidding',
        'risk_analysis',
        'user_id',
        'year',
        'type',
        'contract_init_date',
        'contract_end_date',
        'customer_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'date_send' => 'string',
        'bidding' => 'string',
        'risk_analysis' => 'string',
        'user_id' => 'integer',
        'year' => 'integer',
        'type' => 'string',
        'contract_init_date' => 'string',
        'contract_end_date' => 'string',
        'customer_id' => 'integer'
    ];
    public function rel_cliente(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}