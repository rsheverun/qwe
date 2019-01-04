<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configset extends Model
{
    protected $fillable = [
        'model',
        'name',
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
    public function keys()
    {
        return $this->belongsToMany('App\Key', 'configset_keys', 'configset_id', 'key_id');
    }

    public function configsetKeys()
    {
        return $this->belongsTo('App\ConfigsetKey');
    }
}
