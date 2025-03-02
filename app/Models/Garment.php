<?php

namespace App\Models;

use Eloquent as Model;

class Garment extends Model
{
    public $table = 'garments';
    public $timestamps = true;
    protected $guarded = [];

}