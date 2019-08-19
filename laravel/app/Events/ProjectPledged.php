<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ProjectPledged
{
    use Dispatchable, SerializesModels;

    public $transaction;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }
}
