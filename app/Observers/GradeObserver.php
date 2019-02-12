<?php

namespace App\Observers;

use App\Grade;
use Illuminate\Notifications\Notifiable;
use App\Notifications\GradeSaved as GradeSavedNotification;
use Auth;

class GradeObserver
{

    public $email = '';

    use Notifiable;

    private function setSchoolEmail(){
        $this->email = Auth::user()->email;
    }

    /**
     * Handle the grade "created" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function created(Grade $grade)
    {
        $this->setSchoolEmail();
        $this->notify(new GradeSavedNotification($grade));
    }

    /**
     * Handle the grade "updated" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function updated(Grade $grade)
    {
        //
    }

    /**
     * Handle the grade "deleted" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function deleted(Grade $grade)
    {
        //
    }

    /**
     * Handle the grade "restored" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function restored(Grade $grade)
    {
        //
    }

    /**
     * Handle the grade "force deleted" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function forceDeleted(Grade $grade)
    {
        //
    }
}
