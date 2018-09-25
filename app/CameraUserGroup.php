<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CameraUserGroup extends Model
{
    public $table = "camera_user_group";
    protected $fillable = [
        'camera_id',
        'user_group_id'
    ];
}
