<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model{
	public $table = 'role_has_permissions';	
	public $timestamps = false;
}
