<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeVisitRelative extends Model
{
    public $timestamps = true;
    protected $guarded = [];

    public function rel_nivel_educacion(){
        return $this->hasOne(EducationLevel::class,'id','education_level_id');
    }
}
