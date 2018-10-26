<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CamModel;

class Camera extends Model
{
    // protected $connection = 'mysql';
    protected $fillable = [
        'cam',
        'cam_name',
        'desc',
        'latitude',
        'longitude',
        'group_id',
        'cam_email',
        'config_id',
        'cam_model_id'
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
    /**
     * Relationship between tables Activities and Cameras (One to One).
     *
     * @return void
     */
    public function activity()
    {
        return $this->hasOne('App\Activity');
    }

    /**
     * Relationship between tables Camera and CamMOdel (One to One).
     *
     * @return void
     */
    public function cam_model()
    {
        return $this->belongsTo('App\CamModel');
    }
}
