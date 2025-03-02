<?php

namespace App\Models;

use Eloquent as Model;

class EndowmentGarments extends Model
{
    public $table = 'endowment_garments';
    public $timestamps = false;
    protected $guarded = [];

    public function rel_prenda(){
      return $this->hasOne(Garment::class,'id','garment_id');
    }
}