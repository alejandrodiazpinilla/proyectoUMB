<?php

namespace App\Models;

use Eloquent as Model;

class AreaUsers extends Model
{
    public $table = 'areas_users';	
	public $timestamps = false;

    public $fillable = [
        'user_id',
        'area_id'
    ];
    
    protected $casts = [
        'user_id' => 'integer',
        'area_id' => 'integer'
    ];
    
    public function usuarios(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function nombreAreas(){
		return $this->hasOne(Area::class,'id','area_id');
	}
}