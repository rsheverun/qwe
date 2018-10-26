<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Camera;

class CamModel extends Model
{
    protected $fillable = [
        'name',
    ];

    public function camera()
    {
        return $this->hasOne('App\Camera');
    }
}
