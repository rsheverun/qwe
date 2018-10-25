<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HuntingArea;
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
        return $this->hasOne('App\HuntingArea');
    }
}
