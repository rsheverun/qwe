<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VmapInstanceConfig extends Model
{
    public $table = 'vmap_instance_configs';
    public $timestamps = false;
    
    protected $fillable = [
        'value',
        'description'
    ];

    public function hunting_area()
    {
        return $this->belongsTo('App\HuntingArea','vmap_instance_id');
    }
}
