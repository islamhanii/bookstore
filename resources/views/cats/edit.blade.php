@extends('layout')
@extends('header')

@section('page-title') Edit {{ $cat->name }} Category @endsection

@section('main')
    <div >
        <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 150px);">
            <div class="col-lg-5 col-10">
                <h1 class="mb-4 text-center">Edit <small class="text-muted fs-3">{{ $cat->name }}</small> Category</h1>

                <form class="g-3 border border-3 border-primary rounded-3 p-4" action="{{ url("/cats/update/{$cat->id}") }}" method="POST">
                    @if ($errors->any())
                    
                    <div class="col-12 mb-4 alert-danger rounded-3 p-2">
                        @foreach ($errors->all() as $error)
                        <p class="mb-0 lh-base">{{ $error }}</p>
                        @endforeach
                    </div>

                    @endif

                    @csrf
                    <div class="col-12 mb-3">
                        <label for="inputName" class="form-label">Category Name*</label>
                        <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name')?old('name'):$cat->name }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Edit Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection