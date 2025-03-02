<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeDisciplinaryRecord extends Model
{
    public $table = 'employees_disciplinary_records';
    public $timestamps = true;
    protected $guarded = [];
    public function rel_antecedente(){
        return $this->hasOne(TypesDisciplinaryRecord::class,'id','disciplinary_record_id');
    }
}
