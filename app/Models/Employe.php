<?php

namespace App\Models;

use Eloquent as Model;

class Employe extends Model
{
    public $table = 'employees';
    public $timestamps = true;

    // scope activos
    public function scopeActivos($query) {
        return $query->where('state', 1);
    }

    public function rel_tipo_documento(){
        return $this->hasOne(DocumentType::class,'id','document_type_id');
    }
    public function rel_ciudad_expedicion(){
        return $this->hasOne(Ciudad::class,'id','expedition_city_id');
    }
    public function rel_empresa(){
        return $this->hasOne(Empresa::class,'id','company_id');
    }
    public function rel_tipo_sangre(){
        return $this->hasOne(BloodType::class,'id','blood_type_id');
    }
    public function rel_estado_civil(){
        return $this->hasOne(MaritalStatus::class,'id','marital_status_id');
    }
    public function rel_municipio_residencia(){
        return $this->hasOne(Ciudad::class,'id','home_city_id');
    }
    public function rel_localidad(){
        return $this->hasOne(Locality::class,'id','locality_id');
    }
    public function rel_barrio(){
        return $this->hasOne(Neighborhood::class,'id','neighborhood_id');
    }
    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function rel_usuario_empleado(){
        return $this->hasOne(User::class,'id','user_rel_id');
    }
    public function rel_contratos(){
        return $this->hasMany(EmployeContract::class,'employe_id','id')->orderBy('id','desc');
    }
    public function rel_ult_contrato(){
		return $this->hasOne(EmployeContract::class,'employe_id','id')->latest();
    }
    public function rel_afiliaciones(){
        return $this->hasMany(EmployeAffiliation::class,'employe_id','id');
    }
    public function rel_estudios(){
        return $this->hasMany(EmployeStudy::class,'employe_id','id');
    }
    public function rel_antecedentes(){
        return $this->hasMany(EmployeDisciplinaryRecord::class,'employe_id','id');
    }
    public function rel_otros(){
        return $this->hasMany(OtherEmployeDocument::class,'employe_id','id');
    }
    public function rel_experiencia(){
        return $this->hasMany(EmployeExperience::class,'employe_id','id');
    }
    public function rel_referencias(){
        return $this->hasMany(EmployeReference::class,'employe_id','id');
    }
    public function rel_capacitaciones(){
        return $this->hasMany(TrainingEmploye::class,'employe_id','id');
    }
}