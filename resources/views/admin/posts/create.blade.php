@extends('layouts.admin')

@section('content')
    <div class="container border border-danger rounded-3 p-3 mb-4">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data" id="MyForm">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="title" class="form-label text-uppercase fw-bold">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                <p id="demo1"></p>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="eyelet" class="form-label text-uppercase fw-bold">eyelet</label>
                    <input type="text" class="form-control" id="eyelet" name="eyelet" value="{{ old('eyelet') }}">
                </div>
                <p id="demo2"></p>
                @error('eyelet')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="content" class="form-label text-uppercase fw-bold">content</label>
                    <input type="text" class="form-control" id="content" name="content" value="{{ old('content') }}">
                </div>
                <p id="demo3"></p>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="image" class="form-label text-uppercase fw-bold">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                @error('image')
                    <div class="alert alert-danger mt-3"> {{ $message }}</div>
                @enderror

                @error('tags.*')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <fieldset class="mb-3">
                    <legend>Tags</legend>
                    <div class="container">
                        <div class="d-flex row">
                            @foreach ($tags as $tag)
                                <div class="form-check col-3">
                                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                        name="tags[]"
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </fieldset>

                @error('categories.*')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <fieldset class="mb-3">
                    <legend>categories</legend>
                    <div class="container">
                        <div class="d-flex row">
                            @foreach ($categories as $category)
                                <div class="form-check col-3">
                                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                        name="categories[]"
                                        {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </fieldset>

                <button type="submit" class="btn btn-primary">Save</button>
                {{-- <button type="button" class="btn btn-danger text-white" onclick="validationForm()" value="Submit form">Save</button> --}}
            </form>
        </div>
    </div>

    <script>
        // function validationForm() {
        //     let title = document.getElementById('title').value;
        //     let error1 = document.getElementById('demo1');
        //     let price = document.getElementById('eyelet').value;
        //     let error2 = document.getElementById('demo2');
        //     let rooms = document.getElementById('content').value;
        //     let error3 = document.getElementById('demo3');
        //     let message = "";
        //     let error = 0;
        //     if (!title || !title.trim()) {
        //         message = 'title not valid';
        //         error = 1;
        //         error1.innerHTML = message;
        //         error1.classList.add("alert");
        //         error1.classList.add("alert-danger");
        //     } else {
        //         error1.innerHTML = "";
        //         error1.classList.remove("alert");
        //         error1.classList.remove("alert-danger");
        //     }
        //     if (!eyelet || !eyelet.trim()) {
        //         message = 'eyelet not valid';
        //         error = 1;
        //         error1.innerHTML = message;
        //         error1.classList.add("alert");
        //         error1.classList.add("alert-danger");
        //     } else {
        //         error1.innerHTML = "";
        //         error1.classList.remove("alert");
        //         error1.classList.remove("alert-danger");
        //     }
        //     if (!content || !content.trim()) {
        //         message = 'content not valid';
        //         error = 1;
        //         error1.innerHTML = message;
        //         error1.classList.add("alert");
        //         error1.classList.add("alert-danger");
        //     } else {
        //         error1.innerHTML = "";
        //         error1.classList.remove("alert");
        //         error1.classList.remove("alert-danger");
        //     }
        //     if (error == 0) {
        //         message = "";
        //         document.getElementById('MyForm').submit();
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }
    </script>
@endsection
