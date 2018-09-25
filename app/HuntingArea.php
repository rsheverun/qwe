<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HuntingArea extends Model
{
    protected $fillable = [
        'name',
        'description',
        'vmap_instance_id',
        'vmap_mapviewid_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function vmap_instance_config()
    {
        return $this->hasOne('App\VmapInstanceConfig');
    }

    public function vmap_mapview_config()
    {
        return $this->hasOne('App\VmapMapviewConfig');
    }

}
