<?php

namespace App\Models;

use Eloquent as Model;

class NoveltyCustomer extends Model
{
    public $table = 'novelties_customers';
    public $timestamps = true;
    protected $fillable = ['id','action_type','action_type_id','description_action'];

    public function rel_tipo_novedad(){
        return $this->hasOne(NoveltyType::class,'id','novelty_type_id');
    } 
}