<?php

namespace App\Models;

use Eloquent as Model;

class DocumentType extends Model
{
    public $table = 'document_types';
    public $timestamps = true;

    public $fillable = [
        'name',
        'abbreviation',
        'document_category_id',
        'user_id'
    ];
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'abbreviation' => 'string',
        'document_category_id' => 'integer',
        'user_id' => 'integer'
    ];
}