<?php

namespace App\Listeners;

use App\Mail\ProjectPledged as ProjectPledgedMail;
use App\Events\ProjectPledged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendProjectPledgedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectPledged  $event
     * @return void
     */
    public function handle(ProjectPledged $event)
    {
        Mail::to($event->transaction->project->owner->email)->send(
            new ProjectPledgedMail($event->transaction)
        );
    }
}
