@section('js-files')
  <script src="{{ asset("js/script1.js") }}"></script>
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-warning" href="{{ url("/books") }}">Bookstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle @yield("active-books-link")" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Books
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item @yield("active-all-books-link")" href="{{ url("/books") }}">All</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item @yield("active-create-book-link")" href="{{ url("/books/create") }}">Create</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle @yield("active-cats-link")" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item @yield("active-all-cats-link")" href="{{ url("/cats") }}">All</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item @yield("active-create-cat-link")" href="{{ url("/cats/create") }}">Create</a></li>
                      </ul>
                    </li>
                </ul>
                <div id="search-form" class="d-flex mb-0">
                    <input class="form-control me-2" placeholder="Search Books..." aria-label="Search">
                    <button class="btn btn-outline-warning">Search</button>
                </div>
            </div>
        </div>
  </nav>
@endsection