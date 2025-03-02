<?php

namespace App\Models;

use Eloquent as Model;

class DelegateNovelty extends Model
{
    public $table = 'delegate_novelties';
    public $timestamps = true;

    public $fillable = [
        'name',
        'user_id'
    ];
    
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'user_id' => 'integer'
    ];
}