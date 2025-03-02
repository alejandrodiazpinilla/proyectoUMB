<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaUser extends Model
{
    public $timestamps = false;
    protected $guarded = [];

	public function nombreEmpresa(){
		return $this->hasOne(Empresa::class,'id','empresa_id');
	}
}
