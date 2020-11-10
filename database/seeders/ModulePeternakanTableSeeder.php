<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModulePeternakanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ModulePeternakan::factory()->create(
            ['label_module' => 'ayam', 'jenis_module' => 'hewan_darat']
        );
    }
}
