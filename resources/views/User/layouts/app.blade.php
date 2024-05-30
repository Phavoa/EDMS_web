<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EDMS</title>

    <link rel="stylesheet" href="{{ asset('iconfont/material-icons.css') }}">
    <!-- Materialize css -->
    <link rel="stylesheet" href="{{ asset('materialize-css/css/materialize.min.css') }}">
    <!-- datatables -->
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/storage/images/favicon.ico">
    <style>
      body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
      }
      main {
        flex: 1 0 auto;
      }
      .preloader-background {
      	display: flex;
      	align-items: center;
      	justify-content: center;
      	background-color: #eee;

      	position: fixed;
      	z-index: 100;
      	top: 0;
      	left: 0;
      	right: 0;
      	bottom: 0;
      }
    </style>
</head>
<body>
  @include('User.incUser.spinner')
  <main>
    <div id="app">
      @include('User.incUser.navbar')
      @yield('content')
      <!-- Floating Button -->
      @if(Auth::guest())
      @else
      
      @endif
    </div>
  </main>
  @include('User.incUser.footer')

  <!-- Scripts -->
  @include('User.incUser.scripts')
  <!-- Right click context-menu -->
  <script src="{{ asset('js/context-menu.js') }}"></script>
  <!-- MESSAGES -->
  @include('User.incUser.messages')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
