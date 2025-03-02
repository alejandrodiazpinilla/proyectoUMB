<?php

namespace App\Models;

use Eloquent as Model;

class NoveltyWatchmen extends Model
{
    public $table = 'novelties_watchmen';
    public $timestamps = true;

    public function rel_novedades_guardas(){
        return $this->hasOne(NoveltyType::class,'id','novelty_type_id');
    } 
}