@extends('layout')
@extends('header')

@section('page-title') All Users @endsection
@section('active-users') active @endsection

@section('css-files')
    <link rel="stylesheet" href="{{ asset("css/main.css") }}"/>
@endsection

@section('main')
    <h1 class="mb-4 text-center">All Users</h1>

    <div class="row justify-content-center">
        @foreach($users as $user)
            <div class="col-11 d-flex justify-content-between bg-dark text-white rounded-3 p-0 mb-4">
                <div class="d-flex align-items-center flex-grow-1 rounded-start-3">
                    <div class="p-3 bg-warning rounded-start h-100 text-black fw-bold">{{ $loop->iteration }}</div>
                    <div class="d-flex flex-column flex-grow-1 px-2">
                        <a href="{{ url("/cats/show/{$user->id}") }}" class="text-white text-decoration-none">{{ $user->name }} <span class="text-warning"> ({{ ucfirst($user->role) }})</span></a>
                        <span class="text-muted d-none d-md-block">{{ $user->email }}</span>
                    </div>
                    <div class="text-muted d-none d-md-block fst-italic pe-3">Joined from 

                        @if(($time = (time() - strtotime($user->created_at))) < 60)
                            {{ floor($time)." seconds" }}
                        @elseif(($time = $time/60) < 60)
                            {{ floor($time)." minutes" }}
                        @elseif(($time = $time/60) < 24)
                            {{ floor($time)." hours" }}
                        @elseif(($time = $time/24) < 365)
                            {{ floor($time)." days" }}
                        @elseif($time = $time/365)
                            {{ floor($time)." years" }}
                        @endif
                        
                    </div>
                </div>
                @auth
                <div class="d-flex align-items-center pe-3">
                    <a href="{{ url("/users/role/edit/{$user->id}") }}"><button class="btn btn-info">Edit</button></a>
                    <a href="{{ url("/users/role/delete/{$user->id}") }}"><button class="btn btn-danger ms-2">Delete</button></a>
                </div>
                @endauth
            </div>
        @endforeach
    </div>

    {{ $users->links() }}

@endsection