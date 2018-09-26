<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    protected $fillable = [
        'cam',
        'cam_model',
        'cam_name',
        'desc',
        'latitude',
        'longitude',
        'group_id',
        'cam_email',
        'config_id'
    ];

    public function camimages()
    {
        return $this->hasMany('App\Camimage', 'cam', 'cam_email');
    }

    public function usergroups()
    {
        return $this->belongsToMany('App\UserGroup', 'camera_user_group', 'camera_id', 'user_group_id');
    }
    //    public function hunting_areas()
    //     {
    //         return $this->belongsToMany('App\HuntingArea', 'camera_hunting_area', 'camera_id', 'hunting_area_id');
    //     }
    public function configset()
    {
        return $this->belongsTo('App\Configset','config_id');
    }
}
