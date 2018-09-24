<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configset extends Model
{
    protected $fillable = [
        'model',
        'config_name',
        'org_name',
        'server',
        'port',
        'user'
    ];

    public function cameras()
    {
        return $this->hasMany('App\Camera');
    }
}
