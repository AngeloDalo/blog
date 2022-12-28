<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags= [
            [
                'name' => 'wow',
            ],
            [
                'name' => 'fanstastic',
            ],
            [
                'name' => 'cheap',
            ],
            [
                'name' => 'expensive',
            ],
            [
                'name' => 'small',
            ],
            [
                'name' => 'tall',
            ],
            [
                'name' => 'fast',
            ],
            [
                'name' => 'good',
            ],
            [
                'name' => 'bad',
            ],
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag['name'];
            $newTag->save();
        }
    }
}
