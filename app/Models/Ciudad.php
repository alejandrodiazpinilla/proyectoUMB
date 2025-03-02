<?php

namespace App\Models;

use Eloquent as Model;

class Ciudad extends Model
{
    public $table = 'ciudades';
    public $timestamps = true;

    public $fillable = [
        'user_id',
        'nombre',
        'departamento'
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'nombre' => 'string',
        'departamento' => 'string',
    ];

    public function getFullNameAttribute()
    {
        return $this->nombre." - ".$this->departamento;

    }
}