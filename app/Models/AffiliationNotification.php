<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliationNotification extends Model
{
    public $timestamps = true;
    protected $guarded = [];

    public function rel_usuario()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function rel_empleado()
    {
        return $this->hasOne(Employe::class, 'id', 'employe_id');
    }
}
