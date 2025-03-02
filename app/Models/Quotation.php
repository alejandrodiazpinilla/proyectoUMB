<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
	protected $guarded = []; 
    public $timestamps = true;

    public function rel_detalle(){
		  return $this->hasMany(QuotationProvider::class,'quotation_id','id');
    }

    public function rel_usuario(){
      return $this->hasOne(User::class,'id','user_id');
    }

    public function rel_aprobado_por(){
      return $this->hasOne(User::class,'id','approved_by');
    }

    public function rel_empresa(){
      return $this->hasOne(Empresa::class,'id','company_id');
    }

    public function rel_proveedor(){
      return $this->hasOne(Provider::class,'id','provider_id');
  }
}
