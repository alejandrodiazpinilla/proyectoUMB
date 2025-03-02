<?php

namespace App\Models;

use Eloquent as Model;

class StaffRequestCandidate extends Model
{
    public $table = 'staff_request_candidates';
    public $timestamps = false;
    protected $guarded = [];
}
