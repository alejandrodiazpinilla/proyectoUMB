<?php

namespace App\Models;

use Eloquent as Model;

class TechnicalVisit extends Model
{
    public $table = 'technical_visits';
    public $timestamps = true;

    public $fillable = [
        'visit_type_id',
        'description',
        'date',
        'user_id',
        'observation',
        'new_date',
        'managed_by',
        'state'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'visit_type_id' => 'integer',
        'description' => 'string',
        'date' => 'string',
        'user_id' => 'integer',
        'observation' => 'string',
        'new_date' => 'string',
        'managed_by' => 'integer',
        'state' => 'integer'
    ];
    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function rel_gestionado_por(){
        return $this->hasOne(User::class,'id','managed_by');
    }
}