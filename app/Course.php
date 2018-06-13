<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $group
 */
class Course extends Model
{

    protected $fillable = ['name'];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
