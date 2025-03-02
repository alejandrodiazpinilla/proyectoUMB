<?php

namespace App\Models;

use Eloquent as Model;

class DocumentCategory extends Model
{
    public $table = 'document_categories';
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