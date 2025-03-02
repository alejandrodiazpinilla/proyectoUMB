<?php

namespace App\Models;

use Eloquent as Model;

class EmployeExperience extends Model
{
    public $table = 'employees_experiences';
    public $timestamps = true;
    protected $guarded = [];
}