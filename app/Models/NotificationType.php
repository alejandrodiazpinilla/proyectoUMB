<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    public $table = 'notification_types';
    public $timestamps = true;

    public $fillable = [
        'name',
        'user_id'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'user_id' => 'integer'
    ];

    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    } 

}
