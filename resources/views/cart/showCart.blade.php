



{{-- @extends('def_master') --}}
@extends('layouts.def_app')

@section('content')

<div class="container">
        <h2>Your Carts</h2>
    <div class="row">
        <div class="col-lg-12">
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                {{ session('msg')  }}
                </div>
            @endif
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Total Price</th>
      <th scope="col">Decscreption</th>
      <th scope="col">Picture</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <form action="cartUpdate" method="POST" enctype="multipart/form-data">
        @csrf
      @forelse ($allCart as $item)
      <tr>
        <th scope="row">{{ App\Product::find($item->productId)->productName }}</th>
        <td>
            <div class="btn-group mr-2" role="group" aria-label="First group"">
                    <input type="hidden" name="cart_id[]" value="{{ $item->id }}">
                    <input name="quantity[]" type="number" class="form-control" value="{{ $item->productQuantity }}">
                </div>
        </td>
        <td>{{ App\Product::find($item->productId)->productPrice }}</td>
        <td>{{ ($item->productQuantity)*(App\Product::find($item->productId)->productPrice) }}</td>
        <td><textarea disabled class="form-control" cols="15" rows="2">{{ App\Product::find($item->productId)->productDescription }}</textarea></td>
        <td>
            <img src="{{ asset('uploads/product_photo/') }}/{{ App\Product::find($item->productId)->productPicture }}" alt="sorry no image" width="50">
        </td>
        <td>
              <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="/delereCart/{{ $item->id }}" class="btn btn-danger">Delete</a>
              </div>
        </td>
      </tr>
      @empty

      @endforelse

  </tbody>
</table>

{{-- {{ $allCart->links() }} --}}



</div>
</div>
<div class="container text-right">
          <button type="submit" class="btn btn-info">update cart</button>
      </form>
    <a href="{{ __('goToCheckOut') }}" class="btn btn-dark">Go To Check Out</a>
</div>
</div>




@endsection
