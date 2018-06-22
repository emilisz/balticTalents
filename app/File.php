<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function paskaita()
    {
        return $this->belongsTo('App\Lecture');
    }
}
