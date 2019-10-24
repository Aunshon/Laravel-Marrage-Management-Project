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

	<nav class="navbar navbar-fixed-top navbar-light mid-top-20 navbar-expand-md mt-2">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}"> MarrageMarket.com</a>
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


<h1 class="text-center mt-5" >Manage Category</h1>

   <div class="container mt-5">
   {{ Session::get('msg') }}
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>Category Name</th>
        <th>Category Description</th>
        <th>Publication Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	  $i = 0;
    	?>
    	@foreach($categories as $category)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $category->categoryName }}</td>
        <td>{{ $category->categoryDescription }}</td>
        <td>{{ $category->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td>
        <td><a href="{{ url('/edit_category/'.$category->id) }}"> Edit </a>|<a href="{{ url('/delete_category/'.$category->id) }}"> Delete </a></td>
      </tr>
     @endforeach
    </tbody>
  </table

</div>
{{ $categories->links() }}




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
