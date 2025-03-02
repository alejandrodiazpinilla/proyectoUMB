<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeContract extends Model
{
    public $table = 'employees_contracts';
    public $timestamps = true;
    protected $guarded = [];

    public function rel_empleado(){
        return $this->hasOne(Employe::class,'id','employe_id');
    }
    public function rel_tipo_contrato(){
      return $this->hasOne(ContratType::class,'id','contract_type_id');
  }
    public function rel_ult_examen(){
		return $this->hasOne(Exam::class,'contract_id','id')->whereIn('type',['Ingreso','Periódico'])->latest();
    }
}