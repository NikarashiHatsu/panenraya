<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebRouteTest extends TestCase
{
    /**
     * Check if index didn't throw error.
     *
     * @return void
     */
    public function testRootRoute()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Check if the login page didn't throw error
     * 
     * @return void
     */
    public function testLoginRoute()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Check if the registration page didn't throw error
     * 
     * @return void
     */
    public function testRegisterRoute()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * Check if the admin page didn't throw error
     *
     * @return void
     */
    public function testAdminRootRoute()
    {
        $user = $userData = User::factory()->create(['role' => 'admin']);
        $user->delete();

        $response = $this->actingAs($userData)
                         ->withSession(['foo' => 'bar', 'role' => 'admin'])
                         ->get('/dashboard');

        $response->assertStatus(200);
    }
}
