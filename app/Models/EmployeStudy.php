<?php

namespace App\Models;

use Eloquent as Model;

class EmployeStudy extends Model
{
    public $table = 'employees_studies';
    public $timestamps = true;
    protected $guarded = [];
    public function rel_estudio(){
        return $this->hasOne(Schooling::class,'id','study_id');
    }
}