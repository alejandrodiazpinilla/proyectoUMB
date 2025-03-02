<?php

namespace App\Models;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model{
	public $table = 'model_has_roles';	
	public $timestamps = false;	

	public function nombreRol(){
		return $this->hasOne(Role::class,'id','role_id');
	}
}
