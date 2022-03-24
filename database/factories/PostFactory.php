<?php

namespace Database\Factories;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(mt_rand(10,25)),
            // 'body'=> '<p>'. implode('</p><p>',$this->faker->paragraphs(mt_rand(5,10))) . '</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'category_id' => mt_rand(1,2),
            'user_id' => mt_rand(1,2),
            'publish_status' => true,
            'comment_status' => true,
            'published_at' => Carbon::now()->format('Y-m-d'),
        ];
    }
}
