@extends('layouts.admin')

@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="container border border-danger rounded-3 p-3 mb-4">
        <div class="row">
            <div class="col">
                <h2 class="text-uppercase"><span class="text-danger">Edit Post:</span> {{ $post->title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.posts.update', $post->slug) }}" method="post"
                    enctype="multipart/form-data" id="MyForm">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3">
                        <div class="mb-3">
                            <label for="title" class="form-label text-uppercase fw-bold">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $post->title }}">
                        </div>
                        {{-- <p id="demo1"></p>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}

                        @if (!empty($post->image))
                            <div class="mb-3">
                                <img class="img-fluid w-50 rounded-3" src="{{ asset('storage/' . $post->image) }}"
                                    alt="{{ $post->title }}">
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                            @error('image')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mb-3">
                                <label for="eyelet" class="form-label text-uppercase fw-bold">eyelet</label>
                                <input type="text" class="form-control" id="eyelet" name="eyelet"
                                    value="{{ $post->eyelet }}">
                            </div>
                            {{-- <p id="demo2"></p>
                            @error('eyelet')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}

                            <div class="mb-3">
                                <label for="content" class="form-label text-uppercase fw-bold">content</label>
                                <input type="text" class="form-control" id="content" name="content"
                                    value="{{ $post->content }}">
                            </div>
                            {{-- <p id="demo2"></p>
                            @error('eyelet')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}

                            @error('tags.*')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            <fieldset class="mb-3">
                                <legend>Tags</legend>
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="d-flex row">
                                            @foreach ($tags as $tag)
                                                <div class="form-check col-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $tag->id }}" name="tags[]"
                                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ $tag->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="container">
                                        <div class="d-flex row">
                                            @foreach ($tags as $tag)
                                                <div class="form-check col-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $tag->id }}" name="tags[]"
                                                        {{ $post->tags()->get()->contains($tag->id)? 'checked': '' }}>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ $tag->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </fieldset>

                            @error('categories.*')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                            <fieldset class="mb-3">
                                <legend>categories</legend>
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="d-flex row">
                                            @foreach ($categories as $category)
                                                <div class="form-check col-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $category->id }}" name="categories[]"
                                                        {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ $category->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="container">
                                        <div class="d-flex row">
                                            @foreach ($categories as $category)
                                                <div class="form-check col-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $category->id }}" name="categories[]"
                                                        {{$post->get()->contains($category->id)? 'checked': '' }}>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ $category->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        {{-- <button type="button" class="btn btn-danger text-white" onclick="validationForm()"
                            value="Submit form">Save</button> --}}
                </form>
            </div>
        </div>
    </div>

    {{-- <script>
        function validationForm() {
            let title = document.getElementById('title').value;
            let error1 = document.getElementById('demo1');
            let price = document.getElementById('price').value;
            let error2 = document.getElementById('demo2');
            let rooms = document.getElementById('rooms').value;
            let error3 = document.getElementById('demo3');
            let beds = document.getElementById('beds').value;
            let error4 = document.getElementById('demo4');
            let bathrooms = document.getElementById('bathrooms').value;
            let error5 = document.getElementById('demo5');
            let square = document.getElementById('square').value;
            let error6 = document.getElementById('demo6');
            let address = document.getElementById('address').value;
            let error7 = document.getElementById('demo7');
            let latitude = document.getElementById('latitude').value;
            let error8 = document.getElementById('demo8');
            let longitude = document.getElementById('longitude').value;
            let error9 = document.getElementById('demo9');
            let message = "";
            let error = 0;
            if (!title || !title.trim()) {
                message = 'title not valid';
                error = 1;
                error1.innerHTML = message;
                error1.classList.add("alert");
                error1.classList.add("alert-danger");
            } else {
                error1.innerHTML = "";
                error1.classList.remove("alert");
                error1.classList.remove("alert-danger");
            }
            if (price < 0 || !price || isNaN(price)) {
                message = 'price not valid';
                error = 1;
                error2.innerHTML = message;
                error2.classList.add("alert");
                error2.classList.add("alert-danger");
            } else {
                error2.innerHTML = "";
                error2.classList.remove("alert");
                error2.classList.remove("alert-danger");
            }
            if (rooms < 0 || !rooms || isNaN(rooms)) {
                message = 'Rooms must be at least one';
                error = 1;
                error3.innerHTML = message;
                error3.classList.add("alert");
                error3.classList.add("alert-danger");
            } else {
                error3.innerHTML = "";
                error3.classList.remove("alert");
                error3.classList.remove("alert-danger");
            }
            if (beds < 0 || !beds || isNaN(beds)) {
                message = 'Beds must be at least one';
                error = 1;
                error4.innerHTML = message;
                error4.classList.add("alert");
                error4.classList.add("alert-danger");
            } else {
                error4.innerHTML = "";
                error4.classList.remove("alert");
                error4.classList.remove("alert-danger");
            }
            if (bathrooms < 0 || !bathrooms || isNaN(bathrooms)) {
                message = 'Bathrooms must be at least one';
                error = 1;
                error5.innerHTML = message;
                error5.classList.add("alert");
                error5.classList.add("alert-danger");
            } else {
                error5.innerHTML = "";
                error5.classList.remove("alert");
                error5.classList.remove("alert-danger");
            }
            if (square < 0 || !square || isNaN(square)) {
                message = 'Square not valid';
                error = 1;
                error6.innerHTML = message;
                error6.classList.add("alert");
                error6.classList.add("alert-danger");
            } else {
                error6.innerHTML = "";
                error6.classList.remove("alert");
                error6.classList.remove("alert-danger");
            }
            if (!address || !address.trim()) {
                message = 'Address not valid';
                error = 1;
                error7.innerHTML = message;
                error7.classList.add("alert");
                error7.classList.add("alert-danger");
            } else {
                error7.innerHTML = "";
                error7.classList.remove("alert");
                error7.classList.remove("alert-danger");
            }
            if (latitude < -90 || latitude > 90 || !latitude) {
                message = 'Latitude not valid';
                error = 1;
                error8.innerHTML = message;
                error8.classList.add("alert");
                error8.classList.add("alert-danger");
            } else {
                error8.innerHTML = "";
                error8.classList.remove("alert");
                error8.classList.remove("alert-danger");
            }
            if (longitude < -180 || longitude > 180 || !longitude) {
                message = 'Longitude not valid';
                error = 1;
                error9.innerHTML = message;
                error9.classList.add("alert");
                error9.classList.add("alert-danger");
            } else {
                error9.innerHTML = "";
                error9.classList.remove("alert");
                error9.classList.remove("alert-danger");
            }
            if (error == 0) {
                message = "";
                document.getElementById('MyForm').submit();
                return true;
            } else {
                return false;
            }
        }
    </script> --}}
@endsection
