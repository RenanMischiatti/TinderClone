<?php

namespace App\Observers;

use App\Models\MatchAlert;
use App\Models\Matchs;

class MatchObserver
{
    /**
     * Handle the Matchs "created" event.
     */
    public function created(Matchs $match)
    {
        MatchAlert::create([
            // Defina os campos e seus valores correspondentes
            'match_id' => $match->id,
            'user_alerted' => $match->user_one,
            'visualized' => false,
        ]);
    }

    /**
     * Handle the Matchs "updated" event.
     */
    public function updated(Matchs $matchs): void
    {
        //
    }

    /**
     * Handle the Matchs "deleted" event.
     */
    public function deleted(Matchs $matchs): void
    {
        //
    }

    /**
     * Handle the Matchs "restored" event.
     */
    public function restored(Matchs $matchs): void
    {
        //
    }

    /**
     * Handle the Matchs "force deleted" event.
     */
    public function forceDeleted(Matchs $matchs): void
    {
        //
    }
}
