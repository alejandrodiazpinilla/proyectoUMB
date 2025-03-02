<?php

namespace App\Models;

use Eloquent as Model;

class TracingTermination extends Model
{
    public $table = 'tracing_termination';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = false;
    protected $guarded = [];

    public function rel_seguimiento()
    {
        return $this->belongsTo(TerminationStaff::class, 'termination_id', 'id');
    }
    public function rel_estado(){
		return $this->hasOne(StateTermination::class,'id','state_id');
	}
}