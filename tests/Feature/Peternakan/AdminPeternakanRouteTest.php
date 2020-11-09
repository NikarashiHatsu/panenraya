<?php

namespace Tests\Feature\Peternakan;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminPeternakanRouteTest extends TestCase
{
    /**
     * Check if the peternakan page didn't throw error
     *
     * @return void
     */
    public function testPeternakanRoute()
    {
        $user = $userData = User::factory()->create(['role' => 'admin']);
        $user->delete();
        
        $response = $this->actingAs($userData)
                         ->withSession(['foo' => 'bar', 'role' => 'admin'])
                         ->get('/admin/peternakan');

        $response->assertStatus(200);
    }

    /**
     * Check if the hewan darat page didn't throw error
     *
     * @return void
     */
    public function testPeternakanHewanDaratRoute()
    {
        $user = $userData = User::factory()->create(['role' => 'admin']);
        $user->delete();

        $response = $this->actingAs($userData)
                         ->withSession(['foo' => 'bar', 'role' => 'admin'])
                         ->get('/admin/peternakan/hewan_darat');

        $response->assertStatus(200);
    }

    /**
     * Check if the hewan air page didn't throw error
     *
     * @return void
     */
    public function testPeternakanHewanAirRoute()
    {
        $user = $userData = User::factory()->create(['role' => 'admin']);
        $user->delete();

        $response = $this->actingAs($userData)
                         ->withSession(['foo' => 'bar', 'role' => 'admin'])
                         ->get('/admin/peternakan/hewan_air');

        $response->assertStatus(200);
    }

    /**
     * Check if the hewan amfibi page didn't throw error
     *
     * @return void
     */
    public function testPeternakanHewanAmfibiRoute()
    {
        $user = $userData = User::factory()->create(['role' => 'admin']);
        $user->delete();

        $response = $this->actingAs($userData)
                         ->withSession(['foo' => 'bar', 'role' => 'admin'])
                         ->get('/admin/peternakan/hewan_amfibi');

        $response->assertStatus(200);
    }

    /**
     * Check if the hewan amfibi page didn't throw error
     *
     * @return void
     */
    public function testPeternakanRelawanPeternakanRoute()
    {
        $user = $userData = User::factory()->create(['role' => 'admin']);
        $user->delete();

        $response = $this->actingAs($userData)
                         ->withSession(['foo' => 'bar', 'role' => 'admin'])
                         ->get('/admin/peternakan/relawan_peternakan');

        $response->assertStatus(200);
    }
}
