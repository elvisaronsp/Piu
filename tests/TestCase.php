<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Auth;
use Session;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use WithoutMiddleware;

    public function setUp(){
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function authenticated(){
      $user = factory(User::class)->create();
      $response = $this->actingAs($user)->followingRedirects();
      return $response;
    }

}
