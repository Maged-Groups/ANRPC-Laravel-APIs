<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\ReactionType;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reaction>
 */
class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $models = [
            'Post',
            'Comment',
            'Reply',
        ];

        $model = fake()->randomElement($models);

        $id = match ($model) {
            'Post' => Post::get()->random()->id,
            'Comment' => Comment::get()->random()->id,
            'Reply' => Reply::get()->random()->id,
        };

        return [
            'user_id' => User::get()->random()->id,
            'reaction_type_id' => ReactionType::get()->random()->id,
            'reactable_type' => 'App\Models\\'. $model,
            'reactable_id' => $id,
        ];
    }
}
