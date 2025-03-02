<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffRequestNotification extends Model
{
    public $table = 'staff_request_notifications';
    public $timestamps = true;
    protected $guarded = [];

    public function rel_solicitud(){
		return $this->hasOne(StaffRequest::class,'id','staff_request_id');
	}
    public function rel_usuario(){
		return $this->hasOne(User::class,'id','user_id');
	}
}
