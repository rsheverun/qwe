<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmapMapviewConfig extends Model
{
    public $table = 'vmap_mapview_configs';
    public $timestamps = false;
    
    protected $fillable = [
        'value',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\HuntingArea', 'vmap_mapviewid_id');
    }
}
