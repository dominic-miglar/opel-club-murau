<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/ico/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <!-- Bootstrap Blog CSS -->
    <link href="/css/blog.css" rel="stylesheet">
    <!-- OCM main CSS -->
    <link rel="stylesheet" type="text/css" href="/css/ocm/main.css" />
    <title>
        @yield('title')
    </title>
    @yield('head')
</head>
<body>
    <div id="header">
        <h1>Club</h1>
        <img src="/img/opellogo.png" alt="opellogo" height="120px" />
        <h1>Murau</h1>
    </div>
    <div id="navigation">
        @include('layout.nav')
    </div>
    <div id="maincontent">
        @yield('content')
    </div>
    <div class="blog-footer">
        <p>OCM Entwurf #1</p>
        <p>
            <a href="/imprint/">Impressum</a> | <a href="/sponsors/">Sponsoren</a>
            @unless (Auth::check()) | <a href="/auth/login/">Anmelden</a> @endunless
        </p>
    </div>

    <div>
        @if(Auth::check())
            <a href="/auth/logout/"><span class="btn btn-danger navbar-fixed-bottom">Hallo {{ Auth::user()->member->firstName }}! Klicke hier, um dich abzumelden!</span></a>
        @endif
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/docs.min.js"></script>
</body>
</html>