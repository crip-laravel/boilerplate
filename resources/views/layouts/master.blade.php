<!DOCTYPE html>
<html lang="{!! App::getLocale() !!}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crip Laravel</title>

    <meta name="language" id="meta-language" content="{!! App::getLocale() !!}">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/app.min.css" rel="stylesheet">

    @yield('styles')

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        var lang_tag = document.getElementById('meta-language');
        window.LANG = lang_tag.getAttribute('content');
    </script>
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">

    @include('layouts.partials.nav')

</nav>

<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    @yield('content')

</div>
<!-- /container -->
@yield('before-scripts')

<script src="assets/js/core.js"></script>
<script src="assets/js/app.js"></script>

@yield('scripts')

</body>
</html>