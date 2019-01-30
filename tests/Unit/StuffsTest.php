<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;

class StuffsTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->authenticated()->get('/stuffs');
        $response->assertStatus(200);
    }

    public function testCreate(){
        $response = $this->authenticated()->get('/stuffs/create');
        $response->assertStatus(200);
    }

    public function testStore(){
      $response = $this->authenticated()->post('/stuffs/store', [
        'title'=> 'testing...'
      ]);
      $response->assertStatus(200);
    }

}
