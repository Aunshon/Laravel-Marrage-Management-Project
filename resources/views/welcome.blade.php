{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MarrageMarket</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('js/bootstrap.min.js') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('user_register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
{{-- all user content starts here --}}

                {{-- @extends('def_master') --}}

{{-- user content ends here --}}
            {{-- </div>
        </div>
    </body>
</html>
 --}}





















































@extends('def_master')
@extends('layouts.def_app')

@section('mainContent')









<div class="col-md-9 mt-2">
    <!--########################START HERE#########################-->

    <!-- SLIDER -->
    <div id="slider1" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        <li class="active" data-target="#slider1" data-slide-to="0"></li>
        <li data-target="#slider1" data-slide-to="1"></li>
        <li data-target="#slider1" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
          <img src="{{ asset("img/3.jpg") }}" class="d-block img-fluid" alt="First Slider">
          <div class="carousel-caption">
            <h3>Hello world</h3>
            <p>Lorensum Ipsum dolor sit amet.</p>
          </div>

        </div>


        <div class="carousel-item">
          <img src="{{ asset('img/2.jpg') }}" class="d-block img-fluid" alt="Second Slider">
          <div class="carousel-caption">
            <h3>Better program</h3>
            <p>Lorensum ipsum dolor sit amet.</p>
          </div>

        </div>


        <div class="carousel-item">
          <img src="{{ asset('img/1.jpg') }}" class="d-block img-fluid" alt="Third Slider">
          <div class="carousel-caption">
            <h3>Best program</h3>
            <p>Lorensum ipsum dolor sit amet.</p>
          </div>

        </div>


      </div>


      <a href="#slider1" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a href="#slider1" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>


</div>


    </div>


@endsection
