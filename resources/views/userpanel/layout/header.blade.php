<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blissberry</title>
    <link rel="shortcut icon" href="{{asset('home/images/icon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('home/CSS/style.css')}}">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css')}}"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <i class="fa-duotone fa-cupcake" style="--fa-primary-color: #d32727; --fa-secondary-color: #d32727;"></i>
            <a class="navbar-brand header font-weight-bold text-dark text-uppercase" href="#">Blissberry</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link px-lg-4 font-weight-bold text-uppercase" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark px-lg-4 font-weight-bold text-uppercase" href="{{url('/about_us')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark px-lg-4 font-weight-bold text-uppercase" href="{{url('/all_product')}}">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-4 text-dark" href="#"><i class="fa-regular fa-heart"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-4 text-dark" href="{{url('show_cart')}}"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-dark px-lg-4 font-weight-bold text-uppercase" href="{{url('show_order')}}">Order</a>
                    </li>
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                    <x-app-layout>

                    </x-app-layout>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-dark px-lg-4 font-weight-bold text-uppercase" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark px-lg-4 font-weight-bold text-uppercase" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    @endif
                    
            </div>
        </nav>
    </div>
    <!-- navbar -->


</body>

</html>
