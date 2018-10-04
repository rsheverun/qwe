<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camimage extends Model
{
    protected $connection = 'camportal';
    protected $fillable = [
        'cam',
        'datum',
        'bild',
    ];
    public function camera()
    {
        return $this->belongsTo('App\Camera', 'cam', 'cam_email');
    }
}
