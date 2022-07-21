<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sponsor::query()->delete();
        \App\Models\Sponsor::factory(12)->create()->each(function($model){
            $model->image()->create([
                "name"=>$model->name,
                "cover"=>'https://dummyimage.com/230x170/f3f4f6/000000',
            ]);
        });
    }
}
