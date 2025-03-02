<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    
    public $timestamps = true;
    protected $fillable = [
        'name', 'email','username', 'estado', 'password', 'cargo','user_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empresa(){
        return $this->hasMany(EmpresaUser::class,'user_id','id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'model_has_roles','model_id','role_id');
    }

    public function roles_id(){
        return $this->hasMany(RoleUser::class,'model_id','id');
    }

    public function areas(){
        return $this->hasMany(AreaUsers::class,'user_id','id');
    }
    public function rel_cliente(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function rel_empleado()
    {
        return $this->belongsTo(Employe::class, 'id', 'user_rel_id');
    }
}