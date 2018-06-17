<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $files
 */
class Lecture extends Model
{
    protected $fillable = [
        'group_id',
        'date',
        'name',
        'description',
        'file' => 'image|nullable|max:1999'
    ];
    // each group has many courses
    public function files() {
        return $this->hasMany('App\File');
    }
}
