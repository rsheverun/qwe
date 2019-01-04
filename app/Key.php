<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $guarded = [];

    public function configsets()
    {
        return $this->belongsToMany('App\Configset');
    }

    public function configsetKeys()
    {
        return $this->belongsTo('App\ConfigsetKey');
    }
}
