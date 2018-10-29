<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HuntingArea extends Model
{
    
    protected $fillable = [
        'name',
        'description',
        'vmap_instance_id',
        'vmap_mapviewid_id',
        'id'
    ];

    public function userGroups()
    {
        return $this->belongsToMany('App\UserGroup');
    }
    
    public function vmap_instance_config()
    {
        return $this->belongsTo('App\VmapInstanceConfig', 'vmap_instance_id');
        
    }

    public function vmap_mapview_config()
    {
        return $this->belongsTo('App\VmapMapviewConfig','vmap_mapviewid_id');
    }
   


}
