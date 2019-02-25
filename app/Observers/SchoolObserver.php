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
      //$roles = $this->createRoles();
      $abilities = $this->createAbilities();
      $general_abilities = ['group-managment', 'control-painel'];
      foreach($abilities as $ability){
        Bouncer::allow('admin')->to($ability['name']);
      }
      foreach($general_abilities as $ability){
        Bouncer::allow('admin')->to($ability);
      }
      $teacher_abilities = [
                              'add-grades', 'delete-grades', 'edit-grades', 'view-grades', 'group-managment'
                           ];
      $secretary_abilities = [
                              'add-groups', 'view-groups', 'edit-groups', 'add-students', 'view-students', 'delete-students',
                              'edit-students', 'view-employeers', 'add-employeers', 'edit-employeers', 'view-stuffs', 'add-stuffs',
                              'delete-stuffs', 'edit-stuffs', 'control-painel'
                            ];
      foreach ($teacher_abilities as $key => $ability) {
        Bouncer::allow('teacher')->to($key);
      }
      foreach ($secretary_abilities as $key => $ability) {
        Bouncer::allow('secretary')->to($key);
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
      $entities = ['students', 'grades', 'stuffs', 'groups', 'options', 'employeers', 'student_groups', 'units'];
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
