<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
        'user_id',
        'camimage_id',
    ];
    
    public function camImage()
    {
        return $this->belongsTo('App\Camimage');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}