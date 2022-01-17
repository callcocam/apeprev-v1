<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::query()->delete();
        \App\Models\Post::factory(100)->create()->each(function($model){
            $model->image()->create([
                "name"=>$model->name,
                "cover"=>$model->type == 'post' ? 'https://dummyimage.com/280x180/edeef7/1d29cf':'https://dummyimage.com/136x136/edeef7/1d29cf',
            ]);
            $model->description()->create(
                \App\Models\Description::factory()->make()->toArray()
            );
        });
    }
}
