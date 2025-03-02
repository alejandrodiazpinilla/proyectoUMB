<?php

namespace App\Models;

use Eloquent as Model;

class Schooling extends Model
{
    public $table = 'schoolings';
    public $timestamps = true;
    protected $guarded = [];
}