<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

class EventFactory extends Factory
{
       /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           "name"=>$this->faker->name,
           "status_id"=>\App\Models\Status::all()->random()->id,
           "created_at"=>now()->subDays(rand(0,100))->format("Y-m-d H:i:s")
           //"cover"=>sprintf("eventos/%s.jpeg", rand(1,8)),
           //"cover"=>"https://dummyimage.com/600x400/edeef7/1d29cf",
           //"description"=>$this->faker->text,
           //"content"=>$this->faker->text,
        ];
    }
}
