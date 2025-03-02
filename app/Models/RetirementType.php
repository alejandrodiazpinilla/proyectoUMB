<?php

namespace App\Models;

use Eloquent as Model;

class RetirementType extends Model
{
	public $table = 'retirement_types';
	public $timestamps = true;
	protected $guarded = []; 
}