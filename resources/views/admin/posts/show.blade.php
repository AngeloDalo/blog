@extends('layouts.admin')

@section('content')
    <div class="container show ps-5 pb-5">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>


        <div class="row border border-danger rounded-3 p-3">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <img class="w-100 h-100 rounded-3" src="{{ asset('storage/' . $post->image) }}"
                    alt="{{ $post->title }}">
            </div>
            <div class="col-sm- 12 col-md-12 col-lg-6">
                <div class="d-flex flex-column">
                    <h3 class="card-title text-danger">{{ $post->title }}</h3>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Eyelet: </span> {{ $post->eyelet }}</span>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Content: </span> {{ $post->content }}</span>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Categories: </span> {{ $category[0]->name }}</span>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Tags: </span>
                    @foreach ($post->tags()->get() as $tag)
                        <span class="badge rounded-pill bg-danger">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </span>
                </div>
            </div>
        </div>
        <a class="btn btn-danger mt-5 text-white" href="{{ route('admin.posts.index') }}">My Posts</a>
    </div>
@endsection
