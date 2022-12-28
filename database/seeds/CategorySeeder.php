<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'animal',
            ],
            [
                'name' => 'finance',
            ],
            [
                'name' => 'economy',
            ],
            [
                'name' => 'sport',
            ],
            [
                'name' => 'adventure',
            ],
            [
                'name' => 'book',
            ],
            [
                'name' => 'travel',
            ],
            [
                'name' => 'blog',
            ],
            [
                'name' => 'fitness',
            ],
            [
                'name' => 'youtube',
            ],
            [
                'name' => 'house',
            ],
            [
                'name' => 'school',
            ],
            [
                'name' => 'foot',
            ],
            [
                'name' => 'tv',
            ],
            [
                'name' => 'series',
            ],
            [
                'name' => 'car',
            ],
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->save();
        }
    }
}
