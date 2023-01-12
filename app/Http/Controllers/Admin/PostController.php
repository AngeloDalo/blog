<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use App\Tag;
use App\Category;
use App\UserInfo;
use Prophecy\Call\Call;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('admin.posts.index', ['posts' => $posts, 'role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', ['tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'eyelet' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'tags.*' => 'nullable|exists:App\Tag,id',
        ]);
        if (!empty($data['image'])) {
            $img_path = Storage::put('uploads', $data['image']);
            $data['image'] = $img_path;
        } else {
            $data['image'] = 'uploads/default.jpg';
        }
        $post = new Post();
        $post->fill($data);
        $post->category_id = $data["categories"][0];
        $post->slug = $post->createSlug($data['title']);
        $post->save();
        if (!empty($data['tags'])) {
            $post->tags()->attach($data['tags']);
        }
        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (Auth::user()->id != $post->user_id) {
            return redirect()->route('admin.posts.index');
        }
        $category = Category::where('id', $post->category_id)->get();
        return view('admin.posts.show', ['post' => $post, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->id != $post->user_id) {
            return redirect()->route('admin.posts.index');
        }
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.edit', ['post' => $post, 'tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        if (Auth::user()->id != $post->user_id) {
            return redirect()->route('admin.posts.index');
        }
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'eyelet' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'tags.*' => 'nullable|exists:App\Tag,id',
        ]);
        if ($data['title'] != $post->title) {
            $post->title = $data['title'];
            $post->slug = $post->createSlug($data['title']);
        }

        if ($data['eyelet'] != $post->eyelet) {
            $post->eyelet = $data['eyelet'];
        }
        if ($data['content'] != $post->content) {
            $post->content = $data['content'];
        }
        if ($data['categories'][0] != $post->category_id) {
            $post->category_id = $data['categories'][0];
        }
        if (!empty($data['image'])) {
            Storage::delete($post->image);

            $img_path = Storage::put('uploads', $data['image']);
            $post->image = $img_path;
        }
        $post->update();
        if (!empty($data['tags'])) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }
        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //non posso cancellare file che non sono miei
        if (Auth::user()->id !== $post->user_id) {
            abort('403');
        }

        $post->tags()->detach();
        $post->delete();
        //il with serve per il messaggio
        return redirect()->route('admin.posts.index')->with('status', "Post id $post->id deleted");
    }
}
