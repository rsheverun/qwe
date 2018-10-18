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
    /**
     * Relationship between tables Configsets and Cameras (One to Many).
     *
     * @return void
     */
    public function cameras()
    {
        return $this->hasMany('App\Camera');
    }
}
