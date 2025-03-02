<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoveltiesRrhh extends Model
{
	public $table = 'novelties_rrhh';
    public $timestamps = true;
	protected $guarded = []; 

	public function rel_empleado(){
        return $this->hasOne(Employe::class,'id','employe_id');
    } 
	public function rel_empresa(){
        return $this->hasOne(Empresa::class,'id','company_id');
    } 
	public function rel_cliente(){
        return $this->hasOne(Customer::class,'id','customer_id');
    } 
	public function rel_area(){
        return $this->hasOne(Area::class,'id','area_id');
    } 
	public function rel_tipo_novedad(){
        return $this->hasOne(NoveltyType::class,'id','novelty_type_id');
    } 
	public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    } 
}
