<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Slide::query()->delete();
        \App\Models\Slide::factory(3)->create();
    }
}
