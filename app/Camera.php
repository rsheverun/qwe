<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    // protected $connection = 'mysql';
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

    /**
     * Relationship between tables cameras and camimages.
     *
     * @return void
     */
    public function camImages()
    {
        return $this->hasMany('App\Camimage', 'cam', 'cam_email');
    }

    /**
     * Relationship between tables cameras and usergroups.
     *
     * @return void
     */
    public function userGroups()
    {
        return $this->belongsToMany('App\UserGroup', 'camera_user_group', 'camera_id', 'user_group_id');
    }

    /**
     * Relationship between tables cameras and configsets.
     *
     * @return void
     */
    public function configset()
    {
        return $this->belongsTo('App\Configset','config_id');
    }
}
