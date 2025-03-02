<?php

namespace App\Models;

use Eloquent as Model;

class TerminationStaff extends Model
{

	public $table = 'termination_staff';
	public $timestamps = true;
	protected $guarded = [];

	public function rel_cliente(){
		return $this->hasOne(Customer::class,'id','customer_id');
	}
	public function rel_ciudad(){
		return $this->hasOne(Ciudad::class,'id','city_id');
	}
	public function rel_empleado(){
		return $this->hasOne(Employe::class,'id','employe_id');
	}
	public function rel_tipo_retiro(){
		return $this->hasOne(RetirementType::class,'id','retirement_type_id');
	}
	public function rel_usuario(){
		return $this->hasOne(User::class,'id','user_id');
	}   
	public function rel_seg(){
        return $this->hasMany(TracingTermination::class,'termination_id','id');
    }
	public function rel_state(){
		return $this->hasOne(StateTermination::class,'id','state_id');
	}
}