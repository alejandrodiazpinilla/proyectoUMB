<?php

namespace App\Models;

use Eloquent as Model;

class EmployeReference extends Model
{
    public $table = 'employees_references';
    public $timestamps = true;
    protected $guarded = [];
}