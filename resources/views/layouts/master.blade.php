<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="stylesheet" href="/fonts/icomoon/icon-font.css">
    <link rel="stylesheet" href="{{ asset("css/styles.css") }}">
    <title>Metro City</title>
    <meta name="robots" content="noindex">
    @yield('maps')
</head>
<body>
<main class="main">
    <div class="container">
        <div class="page-top">
            @yield('page-top')
        </div>

        <div class="page-section">
            @yield('content')
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="{{ asset("js/script.js") }}"></script>
</body>
</html>
