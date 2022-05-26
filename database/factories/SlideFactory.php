<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Slide;

class SlideFactory extends Factory
{

     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slide::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filePath = storage_path('app/public/sliders');
    
        return [
            "user_id"=>\App\Models\User::all()->random()->id,
            'name'=>$this->faker->name,
            "status_id"=>\App\Models\Status::all()->random()->id
            //"cover"=>'https://dummyimage.com/1600x333/edeef7/1d29cf',
            //'content'=>$this->faker->text,
            //'ordering'=>rand(1,5)
        ];
    }
}
