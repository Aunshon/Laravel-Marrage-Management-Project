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


<h1 class="text-center mt-5" >Edit Category</h1>



<div class="container">

  <h2>{{ Session::get('msg') }}</h2>
<hr>
{{-- {!! Form::open(['url'=>'/update-product', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal', 'name'=>'editForm']) !!} --}}

<form action="{{ url("/update_product") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
  <label class="control-label col-sm-2" for="productName">Product Name:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="productName" placeholder="Enter ProductName" name="productName" value="{{ $product->productName }}">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="productCategory">Product Category:</label>
  <div class="col-sm-10">
    <select class="form-control" id="productCategory" name="productCategory">
      <option>Select product category</option>
              @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
              @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="productPrice">Product Price:</label>
  <div class="col-sm-10">
    <input type="number" class="form-control" id="productPrice"  name="productPrice" value="{{ $product->productPrice }}">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="productQuantity">Product Quantity:</label>
  <div class="col-sm-10">
    <input type="number" class="form-control" id="productQuantity"  name="productQuantity" value="{{ $product->productQuantity }}">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="productDescription">Product Description:</label>
  <div class="col-sm-10">
    <textarea class="form-control" id="productDescription"  placeholder="Enter product Description" name="productDescription">{{ $product->productDescription }}</textarea>
  </div>
</div>


<input type="hidden" name="productId" value="{{ $product->id }}">


<div class="form-group">
  <label class="control-label col-sm-2" for="productPicture">Product Picture:</label>
  <div class="col-sm-10">
    <input type="file"  id="productPicture"  name="productPicture">
    <img src="{{ asset('uploads/product_photo/') }}/{{ $product->productPicture }}" width="100">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="publicationStatus">Publication Status:</label>
  <div class="col-sm-10">
    <select  class="form-control" id="publicationStatus"  name="publicationStatus">
      <option>Select publication status</option>
      <option value="1">Published</option>
      <option value="0">Unpublished</option>
    </select>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-success btn-block">Submit</button>
  </div>
</div>
</form>

{{-- {!! Form::close() !!} --}}

<script>
  document.forms['editForm'].elements['productCategory'].value={{$product->categoryId}}
  document.forms['editForm'].elements['publicationStatus'].value={{$product->publicationStatus}}
</script>

</div>



<div style="margin-top:100px;"></div>

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
