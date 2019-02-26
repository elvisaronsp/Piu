<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class BouncerSeeder extends Seeder
{

    private $entities = [
        'admin' => 'Administrator',
        'secretary' => 'Secretary',
        'teacher' => 'Teacher',
        'general-secretary' => 'General Secretary'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = $this->createRoles();
        $abilities = $this->createEntitiesAbilities();
        $general_abilities = $this->generalAbilities();
        foreach($abilities as $ability){
            Bouncer::allow('admin')->to($ability['name']);
        }
        foreach($general_abilities as $ability){
            Bouncer::allow('admin')->to($ability['name']);
        }
        $teacher_abilities = [
                                'add-grades', 'delete-grades', 'edit-grades', 'view-grades', 'group-managment', 'view-student_groups'
                            ];
        $secretary_abilities = [
                                'add-groups', 'view-groups', 'edit-groups', 'add-students', 'view-students', 'delete-students',
                                'edit-students', 'view-employeers', 'add-employeers', 'edit-employeers', 'view-stuffs', 'add-stuffs',
                                'delete-stuffs', 'edit-stuffs', 'control-panel'
                                ];
        foreach ($teacher_abilities as $ability) {
            Bouncer::allow('teacher')->to($ability);
        }
        foreach ($secretary_abilities as $ability) {
            Bouncer::allow('secretary')->to($ability);
        }
    }

    public function generalAbilities(){
      $general_abilities = [
          'group-managment'=> 'Group Managment',
          'control-panel'=> 'Control Panel'
      ];
      $createds = [];
      foreach ($general_abilities as $name => $title) {
        $createds[$name] = Bouncer::ability()->firstOrCreate([
          'name' => "$name",
          'title' => "$title"
        ]);
      }
      return $createds;
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

    private function createEntitiesAbilities(){
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

}
