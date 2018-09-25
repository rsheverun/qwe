<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camimage extends Model
{
    protected $fillable = [
        'cam',
        'datum',
        'bild',
    ];
    public function camera()
    {
        return $this->belongsTo('App\Camera', 'cam_email', 'cam_email');
    }
}
