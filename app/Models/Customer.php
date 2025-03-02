<?php

namespace App\Models;

use Eloquent as Model;

class Customer extends Model
{
    public $table = 'customers';
    public $timestamps = true;

    public $fillable = [
        'name',
        'address',
        'city_id',
        'locality_id',
        'neighborhood_id',
        'admin_name',
        'telephone',
        'email',
        'residential_units',
        'current_contract_end_date',
        'contract_init_date',
        'contract_end_date',
        'last_notification',
        'company_id',
        'logo',
        'state',
        'user_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'city_id' => 'integer',
        'locality_id' => 'integer',
        'neighborhood_id' => 'integer',
        'admin_name' => 'string',
        'telephone' => 'string',
        'email' => 'string',
        'residential_units' => 'string',
        'current_contract_end_date' => 'string',
        'contract_init_date' => 'string',
        'contract_end_date' => 'string',
        'last_notification' => 'string',
        'company_id' => 'integer',
        'logo' => 'string',
        'state' => 'integer',
        'user_id' => 'integer'
    ];
    public function rel_ciudad(){
        return $this->hasOne(Ciudad::class,'id','city_id');
    }
    public function rel_localidad(){
        return $this->hasOne(Locality::class,'id','locality_id');
    } 
    public function rel_barrio(){
        return $this->hasOne(Neighborhood::class,'id','neighborhood_id');
    } 
    public function rel_empresa(){
        return $this->hasOne(Empresa::class,'id','company_id');
    } 
    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function rel_seguimiento(){
        return $this->hasMany(CustomerTracing::class,'customer_id','id');
    }

    public function rel_usuarios_clientes(){
        return $this->hasMany(UserCustomer::class,'customer_id','id');
    }
}