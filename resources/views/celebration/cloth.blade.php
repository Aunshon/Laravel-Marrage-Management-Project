



@extends('def_master')
@extends('layouts.def_app')

@section('mainContent')











@auth






    <!-- Start Main Content-->
    <div class="row mb-5">
      <div class="col-md-9 mt-2">
        <div class="card" style="width: 18rem;">
           <img class="card-img-top" src="public/img/wedding2.jpg" width="170" height="160" alt="Card image cap">
           <div class="card-body">
             <h5 class="card-title text-center">Marrage</h5>
             <p class="card-text text-center">Price: 500 Tk.</p>
             <a href="#" class="btn btn-primary btn-block">Buy Now</a>
             <a href="#" class="btn btn-primary btn-block">Details</a>
           </div>
         </div>
      </div>
    </div>
    <!-- End Main Content -->







@else

<div class="alert alert-danger" role="alert">
  To Use Celebration Service You Must
  <a class="btn btn-warning" href="{{ __('login') }}">Login</a> !
</div>
@endauth















    </div>


@endsection

