<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex(){
      $response = $this->authenticated()->get('/students');
      $response->assertStatus(200);
    }

    public function testCreate(){
      $response = $this->authenticated()->get('/students/create');
      $response->assertStatus(200);
    }

}
