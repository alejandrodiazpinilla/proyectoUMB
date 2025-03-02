<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkMinutes extends Model {

    use HasFactory;

    public $table = 'work_minutes';
    protected $guarded = [];

    /* Relaciones */
    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function rel_lider(){
        return $this->hasOne(User::class,'id','leader_id');
    }

    public function rel_area(){
        return $this->hasOne(Area::class,'id','area_id');
    }

    public function rel_empresa(){
        return $this->hasOne(Empresa::class,'id','company_id');
    }

    public function rel_orden_dia(){
        return $this->hasMany(WorkMinutesOrder::class,'work_minutes_id','id');
    }

    public function rel_compromisos(){
        return $this->hasMany(WorkMinutesCommitments::class,'work_minutes_id','id');
    }

    public function rel_asistentes(){
        return $this->hasMany(WorkMinutesAttendees::class,'work_minutes_id','id');
    }
}
