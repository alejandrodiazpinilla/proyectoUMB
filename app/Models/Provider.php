<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
	protected $guarded = []; 
	public $timestamps = true;

	public function rel_empresa(){
        return $this->hasOne(Empresa::class,'id','company_id');
    }

	public function rel_ciudad(){
        return $this->hasOne(Ciudad::class,'id','city_id');
    }
	public function rel_condicion(){
        return $this->hasOne(PaymentCondition::class,'id','payment_condition_id');
    }
	public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
