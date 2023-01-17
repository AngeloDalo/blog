<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return response()->json([
            'response' => true,
            'results' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json([
            'response' => true,
            'count' => $post ? 1 : 0,
            'results' =>  [
                'posts' => $post
            ],
        ]);
    }
}
