<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $teacher
 * @property mixed $courses
 * @property mixed $students
 * @property mixed $lectures
 */
class Group extends Model
{
    use Notifiable;
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = ['course_id','user_id','name', 'start_at', 'end_at'];


    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each group HAS one teacher(user)
    public function teacher() {
        return $this->hasOne('App\user', 'id', 'user_id'); // this matches the Eloquent model
    }

    // each group has many courses
    public function courses() {
        return $this->hasMany('App\Course', 'id', 'course_id');
    }


    // each group has many lectures
    public function lectures() {
        return $this->hasMany('App\Lecture', 'group_id');
    }

    // each group BELONGS to many students
    // define our pivot table also
    public function students() {
        return $this->belongsToMany('App\User', 'groups_users', 'group_id', 'user_id');
    }
}
