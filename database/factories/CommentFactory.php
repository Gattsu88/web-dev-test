<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        $commentable = [Post::class, News::class];

        $commentableType = $this->faker->randomElement($commentable);

        if ($commentableType === Post::class) {
            $commentableId = Post::all()->random()->id;
        } else {
            $commentableId = News::all()->random()->id;
        }

        return [
            'commentable_type' => $commentableType,
            'commentable_id' => $commentableId,          
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'text' => $this->faker->sentences(5, true),            
            'status' => $this->faker->randomElement([0 ,1, 2])
        ];
    }
}
