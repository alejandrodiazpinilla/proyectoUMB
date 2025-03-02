<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherEmployeDocument extends Model
{
    public $timestamps = true;
    protected $guarded = [];
    public function rel_otro(){
        return $this->hasOne(DocumentType::class,'id','other_document_id');
    }
}
