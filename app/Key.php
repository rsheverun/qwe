<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $guarded = [];

    public function configset()
    {
        return $this->belongsTo('App\Configset','configset_id');
    }
}
