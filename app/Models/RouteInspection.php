<?php

namespace App\Models;

use Eloquent as Model;

class RouteInspection extends Model
{
    public $table = 'route_inspections';
    protected $fillable = ['id','initial_image','customer_id','company_id','file_revi'];
    public $timestamps = true;
}