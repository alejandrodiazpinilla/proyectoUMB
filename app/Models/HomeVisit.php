<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeVisit extends Model
{
    public $timestamps = true;
    protected $guarded = [];

    public function rel_empleado(){
        return $this->hasOne(Employe::class,'id','employe_id');
    }
    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function rel_empresa(){
        return $this->hasOne(Empresa::class,'id','company_id');
    }
    public function rel_nivel_educacion(){
        return $this->hasOne(EducationLevel::class,'id','education_level_id');
    }
    public function rel_tipo_visita(){
        return $this->hasOne(VisitType::class,'id','visit_type_id');
    }
    public function rel_familiares(){
        return $this->hasMany(HomeVisitRelative::class,'home_visit_id','id');
    }
    public function rel_imagenes(){
        return $this->hasMany(HomeVisitImages::class,'home_visit_id','id');
    }

}