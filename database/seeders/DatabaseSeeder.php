<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public $categories = [
        'Horror',
        'Racing',
        'picchiaduro',
        'Simulazione',
        'Open World',
        'TPS/FPS',
        'Multiplayer/Online',
        'Indie',
        'Narrativo',
        'RPG',
        'Action',
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->categories as $category){
            Category::create([
                'title' => $category
            ]);
        }
    }
}
