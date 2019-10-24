@extends('admin.master')
@extends('layouts.app')

@section('mainContent')









<div class="col-md-9 mt-2">
                    <table class="table">
  <thead class="thead-light">
    <tr>
        <th scope="col">customer name</th>
        <th scope="col">customer phone</th>
        {{-- <th scope="col">Shipping</th> --}}
        <th scope="col"><b>Total</b></th>
      <th scope="col">Payment By</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Address</th>
      <th scope="col">Zip</th>
      <th scope="col">Company</th>
      <th scope="col">View D.</th>
    </tr>
  </thead>
  <tbody>

      @forelse ($allBills as $key=>$item)
        <tr>
            <td>{{ $item->customer_name}}</td>
            <td>{{ $item->customer_phone }}</td>
            {{-- <td>$ {{ $item->shipping }}</td> --}}
            <th scope="row">{{ App\Order::find($item->order_id)->total_amount }}</th>
            <td>{{ App\Order::find($item->order_id)->payment_type==1 ? 'Cash on delivery' : 'Cradit Card' }}</td>
            @if (App\Order::find($item->order_id)->payment_status ==1)
                <td><a href="{{ __("pending") }}/{{ $item->order_id }}" class="btn btn-warning">Pendig</a></td>
            @else
            <td><button disabled="disabled" class="btn btn-success">Paid</button></td>
            @endif
            <td><textarea cols="10" rows="2" class="form-control" disabled>{{ $item->address  }}</textarea></td>
            <td>{{ $item->zip_code }}</td>
            <td>{{ $item->company }}</td>
            <td><a class="btn btn-outline-dark" href="{{ url('/cusorderdetails') }}/{{ $item->order_id }}">Products</a></td>
        </tr>
        @empty

        @endforelse
  </tbody>
</table>


</div>


    </div>


@endsection
