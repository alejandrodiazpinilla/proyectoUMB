<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffRequest extends Model
{
    public $table = 'staff_request';
    public $timestamps = true;
    protected $guarded = [];

    public function rel_cliente(){
		return $this->hasOne(Customer::class,'id','customer_id');
	}
    public function rel_tipo_vacante(){
		return $this->hasOne(VacantType::class,'id','vacant_type_id');
	}
    public function rel_tipo_contrato(){
		return $this->hasOne(ContratType::class,'id','contract_type_id');
	}
    public function rel_usuario_creador(){
		return $this->hasOne(User::class,'id','requesting_user_id');
	}
    public function rel_usuario_rrhh(){
		return $this->hasOne(User::class,'id','rrhh_user_id');
	}
	public function rel_candidatos(){
		return $this->hasMany(StaffRequestCandidate::class,'id','staff_request_id');
    }
}
