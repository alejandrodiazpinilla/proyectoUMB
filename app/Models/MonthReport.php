<?php

namespace App\Models;

use Eloquent as Model;

class MonthReport extends Model
{
    public $table = 'monthly_report';
    public $timestamps = true;
    protected $guarded = [];

    public function rel_area(){
        return $this->hasOne(Area::class,'id','area_id');
    }
    public function rel_usuario(){
        return $this->hasOne(User::class,'id','user_id');
    } 
    public function rel_company(){
        return $this->hasOne(Empresa::class,'id','company_id');
    } 
    public function rel_imagenes(){
        return $this->hasMany(MonthReportImages::class,'monthly_report_id','id');
    }
}