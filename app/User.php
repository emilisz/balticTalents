<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed $groups
 * @property mixed $students
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'surname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    user can have many groups
    public function groups() {
        return $this->hasMany('App\Group');
    }

    // each student BELONGS to many groups
    // define our pivot table also
    public function students() {
        return $this->belongsToMany('App\Group', 'groups_users', 'user_id', 'group_id');
    }
}
