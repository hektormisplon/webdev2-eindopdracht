<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;

class ProjectPublished
{
    use SerializesModels;

    public $project;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        $this->project = $project;
    }
}
