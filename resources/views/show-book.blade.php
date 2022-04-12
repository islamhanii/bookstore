@extends('layout')
@extends('header')

@section('page-title') {{ $book->name }} @endsection

@section('main')

    <div class="row">
        <div class="col-md-7">
            <h1>{{ $book->name }}</h2>
            <p>By <strong>{{ $book->author }}</strong></p>
            <p>{{ $book->desc }}</p>
            <p>Created at: <small>{{ $book->created_at }}</small></p>
            <p>Updated at: <small>{{ $book->updated_at }}</small></p>
            <div class="d-flex">
                <a href="{{ url("/books/edit/{$book->id}") }}"><button class="btn btn-info me-2">Edit</button></a>
                <form action="{{ url("/books/delete/{$book->id}") }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <a href="{{ url("/books") }}"><button class="btn btn-primary">Back</button></a>
        </div>
        <div class="col-md-5">
            <img class="w-100" src="{{ asset("images/default.jfif") }}" alt="{{ $book->name }}}">
        </div>
    </div>

@endsection