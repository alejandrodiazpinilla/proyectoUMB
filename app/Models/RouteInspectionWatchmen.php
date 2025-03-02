<?php

namespace App\Models;

use Eloquent as Model;

class RouteInspectionWatchmen extends Model
{
    public $table = 'route_inspections_watchmen';
    public $timestamps = false;
    
    public function rel_guarda(){
        return $this->hasOne(User::class,'id','watchman_id');
    }
}