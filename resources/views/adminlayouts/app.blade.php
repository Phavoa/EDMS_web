<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EDMS</title>

    <link rel="stylesheet" href="{{ asset('iconfont/material-icons.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  @include('incAdmin.spinner')
  <main>
    <div id="app">
      @include('incAdmin.navbar')
      @yield('content')
      <!-- Floating Button -->
      @if(Auth::guest())
      @else
      
      @endif
    </div>
  </main>
  @include('incAdmin.footer')

  <!-- Scripts -->
  @include('incAdmin.scripts')
  <!-- Right click context-menu -->
  <script src="{{ asset('js/context-menu.js') }}"></script>
  <!-- MESSAGES -->
  @include('incAdmin.messages')
</body>
</html>
