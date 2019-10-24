



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











            	<!-- Page -->
	<div class="page-area cart-page spad">
		<div class="container">
            <form class="checkout-form" action="/place/order" method="POST">
                @csrf
				<div class="row">
					<div class="col-lg-6">
						<h4 class="checkout-title">Billing Address / Shiping Address</h4>
						<div class="row">
							<div class="col-md-12">
								<input name="customer_name" type="text" placeholder="Name *" value="{{ Auth::user()->name }}">
							</div>
							<div class="col-md-12">
								<input name="company" type="text" placeholder="Company" value="{{ $cusInfo->company }}">
                                <input name="address" type="text" placeholder="Address *" value="{{ $cusInfo->address }}">
                                <input name="zip_code" type="text" placeholder="Zipcode *" value="{{ $cusInfo->zip_code }}">



								<select id="country" name="country_id">
                                    <option>Country *</option>
                                    @foreach ($allcountry as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
								</select>
								<select id="city" name="city_id">
									<option>City/Town *</option>
								</select>
								<input name="customer_phone" type="text" placeholder="Phone no *" value="{{ $cusInfo->phone }}">
                                <input name="customer_email" type="email" placeholder="Email Address *" value="{{ Auth::user()->email }}">

								{{-- <div class="checkbox-items">
									<div class="ci-item">
										<input type="checkbox" name="a" id="tandc">
										<label for="tandc">Terms and conditions</label>
									</div>
									<div class="ci-item">
										<input type="checkbox" name="c" id="newsletter">
										<label for="newsletter">Subscribe to our newsletter</label>
									</div>
								</div> --}}
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="order-card">
							<div class="order-details">
								<div class="od-warp">
									<h4 class="checkout-title">Your order</h4>
									<table class="order-table">
										<thead>
											<tr>
												<th>Product</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												{{-- <td>Discount</td>
                                                <td>${{ $dis }}</td>
                                                <input type="hidden" name="discount" value="{{ $dis }}">
											</tr>
											<tr>
												<td>SubTotal</td>
                                                <td>${{ $sub }}</td>
                                                <input type="hidden" name="subtotal" value="{{ $sub }}">
											</tr>
											<tr class="cart-subtotal">
												<td>Shipping</td>
                                                <td>${{ $ship }}</td>
                                                <input type="hidden" name="shipping" value="{{ $ship }}">
											</tr> --}}
										</tbody>
										<tfoot>
											<tr class="order-total">
												<th>Total</th>
                                                <th>${{ $totalAmount }}</th>
                                                <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="payment-method">
									<div class="pm-item">
										<input type="radio" name="payment_type" id="one" value="1">
										<label for="one">Cash on delievery</label>
									</div>
									<div class="pm-item">
										<input type="radio" name="payment_type" id="two" value="2">
										<label for="two">Credit card</label>
									</div>
								</div>
							</div>
							<button type="submit" class="site-btn btn-full">Place Order</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- Page -->








 @section('footer_script')
    <script>
        $(document).ready(function () {
            $('#country').change(function () {
                var country_id=$(this).val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });



                $.ajax({
                type:'POST',
                url:'/get/city/name',
                data: {country_id: country_id},
                    success: function (data) {
                        // $( "#company_upazilla" ).html(data);
                        // alert(data);
                        $('#city').html(data);
                    }
                });



            });
        });
    </script>
@endsection








@endsection
