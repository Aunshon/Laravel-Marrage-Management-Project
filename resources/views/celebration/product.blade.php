



@extends('def_master')
@extends('layouts.def_app')

@section('mainContent')











@auth





{{-- <h1>{{ $product_data-> }}</h1> --}}
@forelse ($product_data as $item)
<!-- Start Main Content-->
<div class="row mb-5">
  <div class="col-md-9 mt-2">
    <div class="card" style="width: 18rem;">
       <img class="card-img-top" src="{{ asset('uploads/product_photo/') }}/{{ $item->productPicture }}" width="170" height="160" alt="Card image cap">
       <div class="card-body">
         <h5 class="card-title text-center">{{ $item->productName }}</h5>
         <p class="card-text text-center">Price: {{ $item->productPrice }} Tk.</p>
         <a href="/addToCart/{{ $item->id }}" class="btn btn-primary btn-block">Add To Cart</a>
         <a href="#" class="btn btn-primary btn-block">Details</a>
       </div>
     </div>
  </div>
</div>
<!-- End Main Content -->
@empty

@endforelse







@else

<div class="alert alert-danger" role="alert">
  To Use Celebration Service You Must
  <a class="btn btn-warning" href="{{ __('login') }}">Login</a> !
</div>
@endauth















    </div>


@endsection

