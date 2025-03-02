<?php

namespace App\Models;

use Eloquent as Model;

class DeliveryEndowment extends Model
{
    public $table = 'delivery_endowment';
    public $timestamps = true;
    protected $guarded = [];

    public function rel_dotacion_prendas(){
        return $this->hasMany(EndowmentGarments::class, 'delivery_endowment_id', 'id');
    }
    public function rel_guarda(){
		return $this->hasOne(User::class,'id','guard_id');
	}
    public function rel_funcionario(){
		return $this->hasOne(User::class,'id','user_id');
	}
}