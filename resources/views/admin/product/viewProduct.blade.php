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
                     <a href="https://www.facebook.com"><img src="public/img/facebook.png"></a>
                  </li>
                  <li class="nav-item">
                      <a href="https://www.youtube.com"><img src="public/img/youtube.png"></a>
                  </li>
                  <li class="nav-item">
                      <a href="https://www.twitter.com"><img src="public/img/twitter.png"></a>
                  </li>
                  <li class="nav-item">
                      <a href="https://www.instagram.com"><img src="public/img/instagram.png"></a>
                  </li>
              </ul>
          </div>
    </nav>

	<!-- End Navbar -->


<h1 class="text-center mt-5" >Manage Product</h1>



<div class="container">

  {{ Session::get('msg') }}

	<h1>View Product Details</h1>
<hr>
<img src="{{ asset('/uploads/product_photo/') }}/{{ $product->productPicture }}" width="300"><br>
<table>
  <tr>
    <td>Product Name</td><td>:</td><td>{{ $product->productName }}</td>
  </tr>
  <tr>
    <td>Category Name</td><td>:</td><td>{{ $product->categoryName }}</td>
  </tr>
  <tr>
    <td>Price</td><td>:</td><td>{{ $product->productPrice }}</td>
  </tr>
  <tr>
    <td>Quantity</td><td>:</td><td>{{ $product->productQuantity }}</td>
  </tr>
  <tr>
    <td>Description</td><td>:</td><td>{{ $product->productDescription }}</td>
  </tr>
  <tr>
    <td>PublicationStatus</td><td>:</td><td>{{ $product->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td>
  </tr>
</table>
<a href="{{ url('/manage-product') }}">Back to manage product</a>
<br><br><br>


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
