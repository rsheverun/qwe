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
}
