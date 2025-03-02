<?php

namespace App\Models;

use Eloquent as Model;

class Cctv extends Model
{
    public $table = 'cctv_activities';
    public $timestamps = true;
    protected $guarded = [];

}