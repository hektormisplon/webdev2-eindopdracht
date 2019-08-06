<?php

namespace App;

use App\Events\ProjectPublished;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => ProjectPublished::class
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function pledge()
    {
        return $this->hasOne(Pledge::class);
    }

    public function addPledge($pledge)
    {
        $this->pledge()->create($pledge);
    }
}
