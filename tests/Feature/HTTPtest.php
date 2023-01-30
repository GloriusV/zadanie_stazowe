<?php

namespace Tests\Feature;

use App\Models\Klient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HTTPtest extends TestCase
{
 use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */ 
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_Klient_crud_is_working()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/Klient');
        $response->assertOk();

        $response = $this->actingAs($user)->get('/Klient/create');
        $response->assertOk();        

        $response = $this->actingAs($user)->post('/Klient', [
            'name' => 'test1',
            'surname' => 'test1',
            'email' => 'test@test1',
            'phone_number' => '077777'
    ]);
        $response->assertRedirect('/Klient');

        $klient = Klient::factory()->create();
        $response = $this->actingAs($user)->put("/Klient/{$klient->id}", [
            'name' => 'test2',
            'surname' => 'test2',
            'email' => 'test@test2',
            'phone_number' => '077777'
    ]);
        $response->assertRedirect('/Klient');

        $this->assertDatabaseHas(Klient::class, [
            'name' => 'test2',
            'surname' => 'test2',
            'email' => 'test@test2',
            'phone_number' => '077777'
        ]);
        $response = $this->actingAs($user)->delete("/Klient/{$klient->id}");
        $response->assertRedirect('/Klient');
        $this->assertDatabaseMissing(Klient::class, [
            'name' => 'test2',
            'surname' => 'test2',
            'email' => 'test@test2',
            'phone_number' => '077777']);      
    
    }
}
