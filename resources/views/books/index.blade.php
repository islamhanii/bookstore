@extends('layout')
@extends('header')

@section('page-title') All Books @endsection
@section('active-books-link') active @endsection
@section('active-all-books-link') dropdown-active @endsection

@section('css-files')
    <link rel="stylesheet" href="{{ asset("css/main.css") }}"/>
@endsection

@section('main')
    <h1 class="mb-4 text-center">All Books</h1>

    <div class="items-table row">
        @foreach($books as $book)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card text-white bg-dark mb-3">
                <a href="{{ url("/books/show/{$book->id}") }}" class="overflow-hidden">
                    <img src="{{ $book->img?asset("uploads/{$book->img}"):asset("images/default-book.jfif") }}" class="card-img-top " alt="image{{ $book->name }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ url("/books/show/{$book->id}") }}" class="link-warning"> {{ $book->name }} </a></h5>
                    <p class="card-text">{{ $book->desc }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $book->author }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{ $books->links() }}

@endsection