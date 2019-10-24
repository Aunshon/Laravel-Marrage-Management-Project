@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
  <thead class="thead-light">
    <tr>
        {{-- <th scope="col">Sub Total</th> --}}
        {{-- <th scope="col">Discount</th> --}}
        {{-- <th scope="col">Shipping</th> --}}
        <th scope="col"><b>Total</b></th>
      <th scope="col">Payment</th>
      <th scope="col">Payment Status</th>
      <th scope="col">View D.</th>
    </tr>
  </thead>
  <tbody>

      @forelse ($ordrers as $item)
        <tr>
            {{-- <td>$ {{ $item->subtotal }}</td> --}}
            {{-- <td>$ {{ $item->discount }}</td> --}}
            {{-- <td>$ {{ $item->shipping }}</td> --}}
            <th scope="row">$ {{ $item->total_amount }}</th>
            <td>{{ $item->payment_type==1 ? 'Cash on delivery' : 'Cradit Card' }}</td>
            <td>{{ $item->payment_status ==1 ? 'Pending' : 'Paid' }}</td>
            <td><a class="btn btn-outline-dark" href="{{ url('/order/details') }}/{{ $item->id }}">Details</a></td>
        </tr>
        @empty

        @endforelse
  </tbody>
</table>
{{ $ordrers->links() }}
                    {{-- {{ Auth::user()->role }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
