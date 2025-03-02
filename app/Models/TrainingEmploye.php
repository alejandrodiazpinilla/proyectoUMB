<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingEmploye extends Model
{
    public $table = 'trainings_employees';
    public $timestamps = true;
	protected $guarded = [];


    public function empleado(){
        return $this->hasOne(Employe::class,'id','employe_id');
    }
}