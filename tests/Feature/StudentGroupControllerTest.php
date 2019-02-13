<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentGroupControllerTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->authenticated()->get('/student-groups');
        $response->assertStatus(200);
    }

    public function testJson()
    {
        $response = $this->authenticated()->get('/student-groups/json');
        $response->assertStatus(200);
    }

}
