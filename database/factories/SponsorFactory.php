<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sponsor;
class SponsorFactory extends Factory
{
       /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sponsor::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id"=>\App\Models\User::all()->random()->id,
            "name"=>$this->faker->name,
            "status_id"=>\App\Models\Status::all()->random()->id
           // "cover"=>"https://dummyimage.com/230x170/f3f4f6/000000",
           // "description"=>$this->faker->text,
        ];
    }
}
