<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationProvider extends Model
{
    protected $guarded = []; 
    public $timestamps = false;

    public function rel_proveedor1(){
        return $this->hasOne(Provider::class,'id','provider_id_1');
    }

    public function rel_proveedor2(){
        return $this->hasOne(Provider::class,'id','provider_id_2');
    }

    public function rel_proveedor3(){
        return $this->hasOne(Provider::class,'id','provider_id_3');
    }

    public function rel_tipo_pago1(){
        return $this->hasOne(PaymentCondition::class,'id','payment_condition_id_1');
    }

    public function rel_tipo_pago2(){
        return $this->hasOne(PaymentCondition::class,'id','payment_condition_id_2');
    }

    public function rel_tipo_pago3(){
        return $this->hasOne(PaymentCondition::class,'id','payment_condition_id_3');
    }
}
