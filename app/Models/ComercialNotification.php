<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComercialNotification extends Model
{
    public $table = 'comercial_notifications';
    public $timestamps = true;

    public $fillable = [
        'type_id',
        'read',
        'customer_id',
        'obs',
        'user_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'type_id' => 'integer',
        'read' => 'string',
        'customer_id' => 'string',
        'obs' => 'string',
        'user_id' => 'integer'
    ];

    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    } 
    public function rel_tipo(){
        return $this->hasOne(NotificationType::class,'id','type_id');
    } 
    public function rel_cliente(){
        return $this->hasOne(Customer::class,'id','customer_id');
    } 
}