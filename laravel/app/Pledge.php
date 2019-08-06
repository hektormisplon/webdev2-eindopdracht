<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    protected $guarded = [];
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function sponsor() {
        $this->update(['pledged' => $this->pledged + request('pledged')]);
    }
}
