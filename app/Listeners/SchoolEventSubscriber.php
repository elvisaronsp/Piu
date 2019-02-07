<?php

namespace App\Listeners;


class SchoolEventSubscriber {

    public function onCreated($event){
        //TODO: Criar as matérias
    }

    public function subscribe($events){
        $events->listen(
            'App\Event\SchoolCreated',
            'App\Listeners\SchoolEventSubscriber@onCreated'
        );
    }

}