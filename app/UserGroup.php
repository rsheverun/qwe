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
    public function cameras()
    {
        return $this->hasMany('App\Camera', 'group_id');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function hunting_area()
    {
        return $this->hasMany('App\HuntingArea');
    }
}
