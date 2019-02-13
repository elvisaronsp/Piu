<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use Faker\Generator as Faker;

class EmployeerControllerTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->followingRedirects();
        $user = factory(User::class)->make();
        $response = $response->post(route('employeers.store'),[
          'registration_number' => '123456789',
          'emitter' => 'SSP',
          'registration_emission' => '2000-01-12',
          'cpf' => '85964601529',
          'sus_card' => '123456789123456789',
          'allergic' => 'maracujá',
          'breed' => 'pardo',
          'formation' => 'superior pedagogia',
          'specialization' => 'ensino de autistas',
          'contract' => '123716820',
          'statutory' => '1928371982371',
          'workload' => '40',
          'observations' => 'Formado fora do Brasil',
          'book' => '12543',
          'birth_number' => '1287361872',
          'leaf' => '12',
          'birth_emission' => '1997-01-06',
          'term' => '46',
          'street' => 'Apóstolo Paulo',
          'state' => 'Bahia',
          'city' => 'Salvador',
          'cod_postal' => '41227006',
          'number' => '8',
          'neighborhood' => 'Calabetão',
          'complement' => '',
          'responsability_id' => 2,
          'email' => $user->email,
          'password' => '12345678',
          'password_confirmation' => '12345678',
          'school_id'=> 1,
          'name' => 'João do teste'
        ]);
        $response->assertStatus(200);
    }
}
