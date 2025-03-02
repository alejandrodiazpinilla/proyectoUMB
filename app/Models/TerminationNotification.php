<?php

namespace App\Models;

use Eloquent as Model;

class TerminationNotification extends Model
{
    public $table = 'termination_notifications';
    public $timestamps = true;
    protected $guarded = [];

    public function rel_empleado(){
        return $this->hasOne(Employe::class,'id','employe_id');
    } 
    public function rel_tipo(){
        return $this->hasOne(NotificationType::class,'id','type_id');
    } 

}