<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camimage extends Model
{
    // protected $connection = 'camportal';
    public $timestamps = false;
    protected $fillable = [
        'cam',
        'datum',
        'bild',
    ];

    /**
     * Relationship between tables camimages and cameraas (One camera -> many camimages).
     *
     * @return void
     */
    public function camera()
    {
        return $this->belongsTo('App\Camera', 'cam', 'cam_email');
    }

    /**
     * Relationship between tables camimages and comments.
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function activity()
    {
        return $this->hasOne('App\Activity', 'image_id');
    }
}
