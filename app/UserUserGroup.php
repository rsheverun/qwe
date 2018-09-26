<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUserGroup extends Model
{
    public $table = "user_user_group";
    protected $fillable =[
        'user_id',
        'user_group_id'
    ];
    
}
