<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=20220503.1">
    @yield('style')
    @yield('script')
    <title>My Laravel - @yield('title')</title>
</head>

<body>
    <div class="nav">
        <div class="login_right">
            <p>登入</p>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="footer">
        <h1>Footer</h1>
    </div>
    @yield('inline')
</body>

</html>
