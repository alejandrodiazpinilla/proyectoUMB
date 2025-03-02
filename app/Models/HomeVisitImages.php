<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeVisitImages extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function rel_visita(){
        return $this->hasOne(HomeVisit::class,'id','home_visit_id');
    }

}