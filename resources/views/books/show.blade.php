@extends('layout')
@extends('header')

@section('page-title') {{ $book->name }} Book @endsection

@section('css-files')
    <link rel="stylesheet" href="{{ asset("css/main.css") }}"/>
@endsection

@section('main')

    <div class="row">
        <div class="col-md-5 mb-4 order-md-2">
            <img class="img-max w-100" src="{{ $book->img?asset("uploads/{$book->img}"):asset("images/default-book.jfif") }}" alt="{{ $book->name }}}">
        </div>
        <div class="col-md-7 mb-4 order-md-1">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <h1>{{ $book->name }}</h1>
                <h4 class="text-primary"><a href="{{ url("/cats/show/{$book->cat->id}") }}" class="text-decoration-none">({{ $book->cat->name }})</a></h4>
            </div>
            <p>By <strong>{{ $book->author }}</strong></p>
            <p><?= nl2br(htmlspecialchars($book->desc)) ?></p>
            <p>Created at: <small>{{ $book->created_at }}</small></p>
            <p>Updated at: <small>{{ $book->updated_at }}</small></p>
            @auth
            <div class="d-flex mb-3">
                <a href="{{ url("/books/edit/{$book->id}") }}"><button class="btn btn-info">Edit</button></a>
                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'manager')
                    <form action="{{ url("/books/delete/{$book->id}") }}" method="POST" class="mb-0 ms-2">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
            @endauth
            <a href="{{ url("/books") }}"><button class="btn btn-primary">Back</button></a>
        </div>
    </div>

@endsection