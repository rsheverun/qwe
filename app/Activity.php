<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'camera_id',
        'image_id',
        'date'
    ];
    public $timestamps = false;

    /**
     * Relationship between tables Activities and Cameras (One to One).
     *
     * @return void
     */
    public function camera()
    {
        return $this->belongsTo('App\Camera');
    }

    /**
     * Relationship between tables Activities and Cameras (One to One).
     *
     * @return void
     */
    public function camImage()
    {
        return $this->belongsTo('App\Camimage','image_id');
    }
}
