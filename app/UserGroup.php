<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserGroup extends Model
{
    protected $fillable = [
        'name',
        'role_id',
    ];

    /**
     * Relationship between tables usergroups and roles(One to Many).
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role');
    }

    /**
     * Relationship between tables usergroups and cameras.(Many to Many)
     *
     * @return void
     */
    public function cameras()
    {
        return $this->belongsToMany('App\Camera');
    }

    /**
     * Relationship between tables usergroups and cameras.(Many to Many)
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Relationship between tables usergroups and hunting_areas.(Many to Many)
     *
     * @return void
     */
    public function hunting_areas()
    {
        return $this->belongsToMany('App\HuntingArea');
    }
}
