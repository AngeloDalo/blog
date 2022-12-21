<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at'
    ];

    /**
     * Relationship with posts
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    //BEL CASO AVESSI AVUTO LO SLUG AVREI RICHIAMATO LA FUNZIONE DI CREAZIONE SLUG IN
    //STORE E UPDATE DEL CONTROLLER
    // if ($data['name'] != $category->name) {
    //     $category->name = $data['name'];
    //     $category->slug = $category->createSlug($data['name']);
    // }

    //funzioni per la creazione dello slug
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    // public function createSlug($title)
    // {
    //     $slug = Str::slug($title, '-');

    //     $oldPost = Post::where('slug', $slug)->first();

    //     $counter = 0;
    //     while ($oldPost) {
    //         $newSlug = $slug . '-' . $counter;
    //         $oldPost = Post::where('slug', $newSlug)->first();
    //         $counter++;
    //     }

    //     return (empty($newSlug)) ? $slug : $newSlug;
    // }
}
