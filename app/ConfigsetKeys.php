<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigsetKeys extends Model
{
    protected $fillable = [
        'configset_id',
        'key_id',
        'value'
    ];

    
    public function configsets()
    {
        return $this->hasMany('App\Configset');
    }

    public function keys()
    {
        return $this->hasMany('App\Key');
    }
    
}
