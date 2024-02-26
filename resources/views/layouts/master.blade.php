<!doctype html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="description" content="Ateneu l'Aliança de lliça d'Amunt">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    @yield('meta')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="/css/main.min.css">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="20">
    @include('partials.navbar')
    <main id="main" class="warpper @yield('bodyClass')">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.js"></script>
<script src="/js/main.js"></script>
@stack('scripts')
@yield('js')

</html>
