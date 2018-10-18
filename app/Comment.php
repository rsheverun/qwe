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
    
    /**
     * Relationship between tables Comments and Camimages (One to Many).
     *
     * @return void
     */
    public function camImage()
    {
        return $this->belongsTo('App\Camimage');
    }

    /**
     * Relationship between tables Comments and Users (One to Many).
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
