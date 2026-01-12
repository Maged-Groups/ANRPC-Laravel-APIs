<?php

namespace Database\Seeders;

use App\Models\ReactionType;
use Illuminate\Database\Seeder;

class ReactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'like',
            'love',
            'haha',
            'wow',
            'sad',
            'angry',
        ];

        foreach ($types as $type) {
            ReactionType::factory()->create([
                'type' => $type,
            ]);
        }
    }
}
