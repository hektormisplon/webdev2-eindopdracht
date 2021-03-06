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

    /**
     * Date mutator
     * - Format dates for db
     */
    protected $dates = [
        'deadline',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
