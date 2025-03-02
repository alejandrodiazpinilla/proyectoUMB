<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $guarded = [];
    public $timestamps = true;

    public function rel_empleado(){
        return $this->hasOne(Employe::class,'identification','identification');
    }
}
