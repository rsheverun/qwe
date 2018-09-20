<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    public function role()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role');
    }
}
