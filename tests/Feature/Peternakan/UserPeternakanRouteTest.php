<?php

namespace Tests\Feature\Peternakan;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserPeternakanRouteTest extends TestCase
{
    /**
     * Test if user's peternakan index is found
     *
     * @return void
     */
    public function testPeternakanIndex()
    {
        $user = $userData = User::factory()->create(['role' => 'user']);
        $user->delete();

        $response = $this->actingAs($userData)
                         ->withSession(['foo' => 'bar', 'role' => 'user'])
                         ->get('/user/peternakan');

        $response->assertStatus(200);
    }
}
