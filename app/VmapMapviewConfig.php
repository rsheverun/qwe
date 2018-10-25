<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HuntingArea;

class VmapMapviewConfig extends Model
{
    public $table = 'vmap_mapview_configs';
    public $timestamps = false;
    
    protected $fillable = [
        'value',
        'description'
    ];

    public function hunting_area()
    {
        return $this->hasOne('App\HuntingArea');
    }
}
