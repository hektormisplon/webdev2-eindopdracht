<?php

namespace App;

use App\Events\ProjectPledged;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'pledged' => ProjectPledged::class
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
