<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkMinutesOrder extends Model {

    use HasFactory;

    public $table = 'work_minutes_order';
    public $timestamps = true;
    protected $guarded = [];

    /* Relaciones */
    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function rel_acta(){
        return $this->hasOne(WorkMinutes::class,'id','work_minutes_id');
    }

}
