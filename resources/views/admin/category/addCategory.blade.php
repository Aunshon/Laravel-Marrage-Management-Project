<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/js/bootstrap.min.js">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
  <title>Carousel Slider | Bootstrap 4</title>
</head>
<body>
	<!-- Start Navbar -->

	<nav class="navbar navbar-fixed-top navbar-light navbar-expand-md mt-2 mid-top-20">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}"> MarrageMarket.com</a>
              <ul class="navbar-nav">
                  <li class="nav-item mr-1">
                     <a href="https://www.facebook.com"><img src="{{ asset('img/facebook.png') }}"></a>
                  </li>
                  <li class="nav-item">
                      <a href="https://www.youtube.com"><img src="{{ asset('img/youtube.png') }}"></a>
                  </li>
                  <li class="nav-item">
                      <a href="https://www.twitter.com"><img src="{{ asset('img/twitter.png') }}"></a>
                  </li>
                  <li class="nav-item">
                      <a href="https://www.instagram.com"><img src="{{ asset('img/instagram.png') }}"></a>
                  </li>
              </ul>
          </div>
    </nav>

	<!-- End Navbar -->


<h1 class="text-center mt-5" >Add Category</h1>



<div class="container">
	{{ Session::get('msg') }}
{{-- {!! Form::open(['url'=> '/save-category', 'method'=>'POST','class'=>'form-horizontal']) !!} --}}
<form action="/save_category" method="post">
    @csrf
      <div class="form-group">
    <label for="categoryName"><h6>Category Name</h6></label>
    <input type="text" class="form-control" id="categoryName" placeholder="Enter Name" name="categoryName">
  </div>


  <div class="form-group">
    <label for="categoryDescription"><h6>Category Description</h6></label>
    <textarea id="categoryDescription" class="form-control" name="categoryDescription"></textarea>
  </div>

<div class="form-group">
  <label class="control-label col-sm-2" for="productDescription">Product Type</label>
  <div class="col-sm-10">
    <select  class="form-control" id="productType"  name="productType">
        <option>Select Male Or Female</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
    </select>
  </div>
</div>

   <div class="form-group">
    <label for="publicationStatus"><h6>PublicationStatus</h6></label>
    <select id="publicationStatus" class="form-control" name="publicationStatus">
    	<option>Select Publication Status</option>
    	<option value="1">Published</option>
    	<option value="0">Unpublished</option>
    </select>
  </div>


  <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>


{{-- {!! Form::close() !!} --}}
</div>





	<script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script>
    $('.carousel').carousel({
      interval:2000,
      pause: 'hover',
      wrap: false,
      keyboard: true
    });
  </script>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
