<html>

<head>
    <title>My Laravel - @yield('title')</title>
    <style>
        .login_right {
            position: absolute;
            right: 0px;
            width: 300px;
            border: 3px solid #73AD21;
            padding: 10px;
        }
    </style>
    @yield('style')
    @yield('script')
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
