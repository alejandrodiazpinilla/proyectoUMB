<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $timestamps = true;
    protected $guarded = [];

    public function rel_contrato(){
        return $this->hasOne(EmployeContract::class,'id','contract_id');
    } 
}
