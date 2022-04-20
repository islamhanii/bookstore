@extends('layout')
@extends('header')

@section('page-title') Registeration @endsection
@section('active-register') active @endsection

@section('css-files')
    <link rel="stylesheet" href="{{ asset("css/main.css") }}"/>
@endsection

@section('main')
    <div >
        <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 150px);">
            <div class="col-lg-5 col-10">
                <h1 class="text-center mb-5">New Account</h1>
                <form class="g-3 border border-3 border-primary rounded-3 p-4 mb-5 row" action="{{ url("/register") }}" method="POST">
                    @if ($errors->any())
                    
                    <div class="col-12 mb-2 alert-danger rounded-3 p-2">
                        @foreach ($errors->all() as $error)
                        <p class="mb-0 lh-base">{{ $error }}</p>
                        @endforeach
                    </div>

                    @endif

                    @csrf
                    <div class="col-12 mb-3">
                        <label for="inputName" class="form-label">Name*</label>
                        <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name') }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="inputEmail4" class="form-label">Email*</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword1" class="form-label">Password*</label>
                        <input type="password" name="password" class="form-control" id="inputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword2" class="form-label">Password Confirmation*</label>
                        <input type="password" name="password_confirmation" class="form-control" id="inputPassword2">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign UP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection