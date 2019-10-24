@extends('admin.master')
@extends('layouts.app')

@section('mainContent')









<div class="col-md-9 mt-2">



    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Current Name</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      {{-- <th scope="col">Review</th> --}}
    </tr>
  </thead>
  <tbody>
      @forelse ($allProducts as $key =>$item)

      <tr>
        <td><img src="{{ asset('uploads/product_photo/') }}/{{ App\Product::find($item->product_id)->productPicture }}" alt="No Image" width="50"></td>
        <td>{{ App\Product::find($item->product_id)->productName }}</td>
        <td>{{ $item->product_name}}</td>
        <td>{{ $item->product_price }}</td>
        <td>{{ $item->product_quentity}}</td>
        <td>{{ $item->total_price }}</td>
        {{-- @if ($item->review_status==0)
        <td><a class="btn btn-warning" href="{{ url('/product/review') }}/{{ $item->id }}">Submit Review</a></td>
        @else
        <td>Submited</td>
        @endif --}}
      </tr>
      @empty

      @endforelse
  </tbody>
</table>


</div>


    </div>


@endsection
