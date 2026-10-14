<?php

namespace App\Observers;

use App\Models\ScoringSection;
use Illuminate\Support\Facades\Storage;

class SectionObserver
{
    /**
     * Handle the ScoringSection "created" event.
     */
    public function created(ScoringSection $scoringSection): void
    {
        //
    }

    /**
     * Handle the ScoringSection "updated" event.
     */
    public function updated(ScoringSection $scoringSection): void
    {
        //
    }

    /**
     * Handle the ScoringSection "deleted" event.
     */
    public function deleted(ScoringSection $scoringSection): void
    {
        if ($scoringSection->icon) {
            Storage::disk('public')->delete($scoringSection->icon);
        }
    }

    /**
     * Handle the ScoringSection "restored" event.
     */
    public function restored(ScoringSection $scoringSection): void
    {
        //
    }

    /**
     * Handle the ScoringSection "force deleted" event.
     */
    public function forceDeleted(ScoringSection $scoringSection): void
    {
        //
    }
}
