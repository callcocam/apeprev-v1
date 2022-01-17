<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{
      /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filePath = storage_path('app/public/posts');
        return [
           "user_id"=>\App\Models\User::all()->random()->id,
           "type"=>$type = ['post','noticy'][rand(0,1)],
           "name"=>$this->faker->name,
           "status_id"=>\App\Models\Status::all()->random()->id,
           "created_at"=>now()->subDays(rand(0,100))->format("Y-m-d H:i:s")
          // "cover"=>$type == 'post' ? 'https://dummyimage.com/280x180/edeef7/1d29cf':'https://dummyimage.com/136x136/edeef7/1d29cf',
           //"cover"=>sprintf("posts/%s", $this->faker->image($filePath, 640, 400, null, false)),
          // "description"=>$this->faker->text,
         //  "content"=>$this->faker->text,
        ];
    }
}
