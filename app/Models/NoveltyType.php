<?php

namespace App\Models;

use Eloquent as Model;

class NoveltyType extends Model
{
    public $table = 'novelties_types';
    public $timestamps = true;

    public function rel_novedades_areas(){
        return $this->hasOne(Area::class,'id','area_id');
    }
    public function rel_encargado_novedad(){
        return $this->hasOne(DelegateNovelty::class,'id','delegate_id');
    }
}