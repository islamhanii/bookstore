@extends('layout')
@extends('header')

@section('page-title') Create Book @endsection
@section('active-books-link') active @endsection
@section('active-create-book-link') dropdown-active @endsection

@section('css-files')
    <link rel="stylesheet" href="{{ asset("css/main.css") }}"/>
@endsection

@section('main')
    <div >
        <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 150px);">
            <div class="col-lg-5 col-10">
                <h1 class="mb-4 text-center">Create Book</h1>
                <form class="g-3 border border-3 border-primary rounded-3 p-4 mb-5" action="{{ url("/books/store") }}" method="POST" enctype="multipart/form-data">
                    @if ($errors->any())
                    
                    <div class="col-12 mb-4 alert-danger rounded-3 p-2">
                        @foreach ($errors->all() as $error)
                        <p class="mb-0 lh-base">{{ $error }}</p>
                        @endforeach
                    </div>

                    @endif

                    @csrf
                    <div class="col-12 mb-3">
                        <label for="inputName" class="form-label">Book Name*</label>
                        <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name') }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="inputAuthor" class="form-label">Book Author*</label>
                        <input type="text" name="author" class="form-control" id="inputAuthor" value="{{ old('author') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea" class="form-label">Book Description*</label>
                        <textarea name="desc" class="form-control" id="exampleFormControlTextarea" rows="3">{{ old('desc') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputSelector" class="form-label">Book Category*</label>
                        <select class="form-select" id="inputSelector" aria-label="Default select example" name="cat_id">
                            <option selected disabled>Select Category</option>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}"  @selected(old('cat_id') == $cat->id)>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Book Image*</label>
                        <input class="form-control" type="file" name="img" id="formFile">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection