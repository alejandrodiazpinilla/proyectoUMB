<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkMinutesCommitments extends Model {

    use HasFactory;

    public $table = 'work_minutes_commitments';
    public $timestamps = true;
    protected $guarded = [];

     /* Relaciones */
     public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function rel_responsable(){
        return $this->hasOne(User::class,'id','responsible_id');
    }

    public function rel_acta(){
        return $this->hasOne(WorkMinutes::class,'id','work_minutes_id');
    }

}
