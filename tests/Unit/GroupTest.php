<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     public function testIndex(){
       $response = $this->authenticated()->get('/groups');
       $this->assertStatus(200);
     }

     public function testCreate(){
       $response = $this->authenticated()->get('/groups/create');
       $this->assertStatus(200);
     }
}
