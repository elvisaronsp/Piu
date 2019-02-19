<?php

namespace App\Observers;

use App\School;

class SchoolObserver
{
    /**
     * Handle the school "created" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function created(School $school)
    {
        //
    }

    /**
     * Handle the school "updated" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function updated(School $school)
    {
        //
    }

    /**
     * Handle the school "deleted" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function deleted(School $school)
    {
        //
    }

    /**
     * Handle the school "restored" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function restored(School $school)
    {
        //
    }

    /**
     * Handle the school "force deleted" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function forceDeleted(School $school)
    {
        //
    }
}
