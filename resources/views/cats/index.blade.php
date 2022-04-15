@extends('layout')
@extends('header')

@section('page-title') All Categories @endsection
@section('active-cats-link') active @endsection
@section('active-all-cats-link') dropdown-active @endsection

@section('css-files')
    <link rel="stylesheet" href="{{ asset("css/main.css") }}"/>
@endsection

@section('main')
    <h1 class="mb-4 text-center">All Categories</h1>

    <div class="row justify-content-center">
        @foreach($cats as $key => $cat)
            <div class="col-11 d-flex justify-content-between bg-dark text-white rounded-3 p-0 mb-4">
                <div class="d-flex align-items-center flex-grow-1 rounded-start-3">
                    <div class="p-3 bg-warning rounded-start h-100 text-black fw-bold">{{ $loop->iteration }}</div>
                    <div class="flex-grow-1 px-2">{{ $cat->name }}</div>
                    <div class="text-muted d-none d-md-block fst-italic">Last update from 

                        @if(($time = (time() - strtotime($cat->updated_at))) <= 60)
                            {{ floor($time)." seconds" }}
                        @elseif(($time = $time/60) <= 60)
                            {{ floor($time)." minutes" }}
                        @elseif(($time = $time/60) <= 60)
                            {{ floor($time)." hours" }}
                        @elseif(($time = $time/24)<=24)
                            {{ floor($time)." days" }}
                        @elseif($time = $time/365)
                            {{ floor($time)." years" }}
                        @endif
                        
                    </div>
                </div>
                <div class="d-flex align-items-center px-3">
                    <a href="{{ url("/cats/edit/{$cat->id}") }}"><button class="btn btn-info me-2">Edit</button></a>
                    <form action="{{ url("/cats/delete/{$cat->id}") }}" method="POST" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{ $cats->links() }}

@endsection