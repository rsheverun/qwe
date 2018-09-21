<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserGroup extends Model
{
    protected $fillable = [
        'name',
        'role_id',
    ];
    public function role()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
