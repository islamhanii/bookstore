@extends('layout')
@extends('header')

@section('page-title') Edit {{ $user->name }} Role @endsection

@section('css-files')
    <link rel="stylesheet" href="{{ asset("css/main.css") }}"/>
@endsection

@section('main')
    <div >
        <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 150px);">
            <div class="col-lg-5 col-10">
                <h1 class="mb-4 text-center">Edit <small class="text-muted fs-4">{{ $user->name }}</small> Role</h1>

                <form class="g-3 border border-3 border-primary rounded-3 p-4" action="{{ url("/users/update/{$user->id}") }}" method="POST">
                    @if ($errors->any())
                    
                    <div class="col-12 mb-4 alert-danger rounded-3 p-2">
                        @foreach ($errors->all() as $error)
                        <p class="mb-0 lh-base">{{ $error }}</p>
                        @endforeach
                    </div>

                    @endif

                    @csrf
                    <div class="form-group mb-3">
                        <label for="inputSelector" class="form-label">User Role*</label>
                        <select class="form-select" id="inputSelector" aria-label="Default select example" name="role">
                            <option selected disabled>Select Role</option>
                            <option value="user" @if($user->role == 'user') selected @endif>User</option>
                            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Edit Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection