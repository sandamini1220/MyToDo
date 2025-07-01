<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'To Do App')</title>

    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    
    @yield('style')
  </head>
  <body class="d-flex flex-column h-100">

    
    @include('include.header')

    
    <main class="flex-shrink-0" style="padding-top: 70px;">
      <div class="container">
        @yield('content')
      </div>
    </main>

    
    @include('include.footer')

    
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
