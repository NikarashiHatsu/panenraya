<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create(['password' => Hash::make('12345678'), 'role' => 'admin']);
        \App\Models\User::factory(2)->create(['password' => Hash::make('12345678'), 'role' => 'user']);
        \App\Models\User::factory(2)->create(['password' => Hash::make('12345678'), 'role' => 'guest']);
        \App\Models\User::factory(2)->create(['password' => Hash::make('12345678'), 'role' => 'volunteer_peternakan']);
        \App\Models\User::factory(2)->create(['password' => Hash::make('12345678'), 'role' => 'volunteer_pertanian']);
    }
}
