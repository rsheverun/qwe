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
        'lat',
        'long',
        'group_id',
        'cam_email',
        'config_id'
    ];

    public function camimages()
    {
        return $this->hasMany('App\Camimage', 'cam_id');
    }

    public function usergroup()
    {
        return $this->belongsTo('App\UserGroup','group_id');
    }
    public function configset()
    {
        return $this->belongsTo('App\Configset','config_id');
    }
}
