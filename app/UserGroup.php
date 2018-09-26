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
        return $this->belongsToMany('App\Camera');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    // public function hunting_area()
    // {
    //     return $this->hasMany('App\HuntingArea');
    // }
    public function hunting_areas()
    {
        return $this->belongsToMany('App\HuntingArea');
    }
}
