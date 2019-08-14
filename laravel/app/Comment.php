<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function sender()
    {
        return $this->belongsTo('App\User');
    }
}
