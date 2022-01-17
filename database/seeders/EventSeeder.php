<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Event::query()->delete();
        \App\Models\Event::factory(12)->create()->each(function($model){
            $model->image()->create([
                "name"=>$model->name,
                "cover"=>sprintf("eventos/%s.jpeg", rand(1,8)),
            ]);
            $model->description()->create(
                \App\Models\Description::factory()->make()->toArray()
            );
        });
    }
}
