<?php

namespace App\Models;

use Eloquent as Model;

class EmployeAffiliation extends Model
{
    public $table = 'employees_affiliations';
    public $timestamps = true;
    protected $guarded = [];

    public function rel_afiliacion(){
        return $this->hasOne(Affiliation::class,'id','affiliation_id');
    }
}