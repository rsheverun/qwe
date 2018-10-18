<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'nickname',
        'notification',
        'email', 
        'password',
        'group_id',
        'last_login'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationship between tables users and usergroups(Many to Many).
     *
     * @return void
     */
    public function userGroups()
    {
        return $this->belongsToMany('App\UserGroup', 'user_user_group', 'user_id', 'user_group_id');
    }
    
    /**
     * Relationship between tables users and comments.(One to Many)
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id');
    }
}
