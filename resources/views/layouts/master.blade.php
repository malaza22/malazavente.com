<!doctype html>
<html lang="en">

<head>
  <meta charset="utf8mb4" engine='InnoDB'>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.0.1">
  @yield('extra-meta')
  <link rel="icon" href="{{asset('img/logo.PNG')}}" sizes="32x32">
  <title>Malazavente</title>
  @yield('extra-script')
  <!-- FontAwesome 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/ecommerce.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>

<body style="background-color:aliceblue">
  <div class="container">
    <header class="blog-header ">
        {{-- <nav class="navbar  navbar-light navbar-default bootsnav "> --}}
        <nav class="row navbar d-flex justify-content-between navbar-light p-2">
          <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
              <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('img/logo.PNG')}}" alt="image" width="120" height="40"></a>
            </div>
            <div class="row">
                    <li class="nav-item"><a class="btn btn-sm btn-outline-info" href="{{url('/')}}">Accueil</a></li>
                    <li class="nav-item">@include('partials.auth')</li>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <li class="nav-item" data-in="fadeInDown" data-out="fadeOutUp">@include('partials.search')</li>
                
            </div>
          </div>
        </nav>

    </header>
    @include('partials.message')
      <div class="row">
        @yield('nav-index')
        @yield('content')
      </div>
    <footer class="text-center">
      <p>Blog template built for <a href="{{route('products.index')}}">Boutique</a> by <a
          href="https://facebook.com/malazavente">@malazavente</a>.</p>
      <p><a href="#">Back to top</a></p>
    </footer>
  </div>

  @yield('extra-js')

  <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>

</html>
