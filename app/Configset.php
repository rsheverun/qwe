<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configset extends Model
{
    protected $fillable = [
        'model',
        'config_name',
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
    public function key()
    {
        return $this->hasOne('App\Key');
    }
}
