<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::create([
            'title' => 'Konten Pertama',
            'platform' => 'YouTube',
            'published_at' => now(),
            'views' => 1000,
        ]);
        Content::create([
            'title' => 'Konten Kedua',
            'platform' => 'TikTok',
            'published_at' => now()->subDays(2),
            'views' => 5000,
        ]);
    }
}
