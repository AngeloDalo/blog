@extends('layouts.admin')

@section('content')
    <div class="container position-relative pt-5 bd-5">
        <div class="mt-5 pt-5 position-absolute top-50 start-50 translate-middle">
            <div class="row row-title-index">
                <h1 class="fw-bold">Miei Post:</h1>
            </div>
            <!--message delate-->
            {{-- <div class="row">
                <div class="col">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div> --}}
            <div class="row">
                <div class="col">
                    <table class="table border border-danger text-center">
                        <thead>
                            <tr class="table-danger">
                                <th>n°</th>
                                <th>Titolo</th>
                                <th>Vedi</th>
                                <th>Modifica</th>
                                <th>Elimina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td><a class="btn btn-danger text-white"
                                            href="{{ route('admin.posts.show', $post->id) }}">V</a></td>
                                    <td>
                                        {{-- @if (Auth::user()->id === $post->user_id) --}}
                                        <a class="btn btn-danger text-white"
                                            href="{{ route('admin.posts.edit', $post->id) }}">-</a>
                                        {{-- @endif --}}
                                    </td>
                                    <td>
                                        {{-- @if (Auth::user()->id === $post->user_id) --}}
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger" type="submit" value="Delete">
                                        </form>
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
