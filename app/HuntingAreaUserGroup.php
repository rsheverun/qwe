<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HuntingAreaUserGroup extends Model
{
    public $table = "hunting_area_user_group";

    protected $fillable =[
        'hunting_area_id',
        'user_group_id'
    ];
}
