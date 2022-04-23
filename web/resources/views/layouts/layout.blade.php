<html>

<head>
  <title>My Laravel - @yield('title')</title>
</head>

<body>
  @include('layouts.nav')
  <div class="container">
    @yield('content')
  </div>
  @include('layouts.footer')
</body>

</html>