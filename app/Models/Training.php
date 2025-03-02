<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    public $table = 'trainings';
    public $timestamps = true;

    public $fillable = [
        'fecha',
        'no_participants',
        'description',
        'user_id'
    ];
    protected $casts = [
        'id' => 'integer',
        'fecha' => 'string',
        'no_participants' => 'integer',
        'description' => 'string',
        'user_id' => 'integer'
    ];
    public function capacEmpl(){
		return $this->hasMany(TrainingEmploye::class,'id','employe_id');
    }

}