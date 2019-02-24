<?php

namespace App\Observers;

use App\School;
use Bouncer;

class SchoolObserver
{

    private $entities = [
      'admin' => 'Administrator',
      'secretary' => 'Secretary',
      'teacher' => 'Teacher',
      'general-secretary' => 'General Secretary'
    ];

    /**
     * Handle the school "created" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function created(School $school)
    {
      $roles = $this->createRoles();
      $abilities = $this->createAbilities();
      Bouncer::allow('admin')->toOwnEverything();
      $teacher_abilities = [
                              'add-grades', 'delete-grades', 'edit-grades', 'view-grades'
                           ];
      $secretary_abilities = [
                              'add-groups', 'view-groups', 'edit-groups', 'add-students', 'view-students', 'delete-students',
                              'edit-students', 'view-employeers', 'add-employeers', 'edit-employeers', 'view-stuffs', 'add-stuffs',
                              'delete-stuffs', 'edit-stuffs'
                            ];
      foreach ($teacher_abilities as $ability) {
        Bouncer::allow('secretary')->to($ability);
      }
      foreach ($secretary_abilities as $ability) {
        Bouncer::allow('teacher')->to($ability);
      }
    }

    private function createRoles(){
      $createds = [];
      foreach ($this->entities as $name => $title) {
        $createds[$name] = Bouncer::role()->firstOrCreate([
          'name' => $name,
          'title' => $title,
        ]);
      }
      return $createds;
    }

    public function createAbilities(){
      $entities = ['students', 'grades', 'stuffs', 'groups', 'options', 'employeers'];
      $actions = ['view'=> 'View', 'delete'=> 'Delete', 'edit'=> 'Edit', 'add'=>'Add'];
      $createds = [];
      foreach ($entities as $entity) {
        foreach ($actions as $name => $title) {
          $createds["$name-$entity"] = Bouncer::ability()->firstOrCreate([
            'name' => "$name-$entity",
            'title' => "$title $entity"
          ]);
        }
      }
      return $createds;
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
