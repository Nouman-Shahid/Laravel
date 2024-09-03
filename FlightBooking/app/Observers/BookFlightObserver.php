<?php

namespace App\Observers;

use App\Models\bookflight;

class BookFlightObserver
{
    /**
     * Handle the bookflight "created" event.
     */
    public function created(bookflight $bookflight): void
    {
        //
    }

    /**
     * Handle the bookflight "updated" event.
     */
    public function updated(bookflight $bookflight): void
    {
        //
    }

    /**
     * Handle the bookflight "deleted" event.
     */
    public function deleted(bookflight $bookflight): void
    {
        //
    }

    /**
     * Handle the bookflight "restored" event.
     */
    public function restored(bookflight $bookflight): void
    {
        //
    }

    /**
     * Handle the bookflight "force deleted" event.
     */
    public function forceDeleted(bookflight $bookflight): void
    {
        //
    }
}
