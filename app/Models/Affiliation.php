<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affiliation extends Model
{
    public $table = 'affiliations';
    public $timestamps = true;

    public $fillable = [
        'name',
        'state',
        'user_id'
    ];
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'state' => 'integer',
        'user_id' => 'integer'
    ];

    public static $rules = [];
}