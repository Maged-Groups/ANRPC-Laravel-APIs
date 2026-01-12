<?php

namespace Database\Seeders;

use App\Models\PostStatus;
use Illuminate\Database\Seeder;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Pending',
            'Published',
            'Canceled',
            'Postponed',
            'Rejected',
        ];

        foreach ($types as $type) {
            PostStatus::factory()->create([
                'type' => $type,
            ]);
        }

    }
}
