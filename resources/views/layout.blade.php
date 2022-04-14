<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="description" content=""/>
        
        <title>Bookstore |@yield("page-title")</title>
        <link rel="icon" type="image/x-icon" href="{{asset("images/bookstore-icon.png")}}">
        
        <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}"/>
        @yield("css-files")
    </head>

    <body>
        @yield('header')
        
        <div class="container mt-5">
            @yield('main')
        </div>

        <script src="{{ asset("js/popper.min.js") }}"></script>
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        @yield("js-files")
    </body>
</html>