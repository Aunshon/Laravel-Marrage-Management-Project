@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if (App\userProfile::where('customer_id',Auth::user()->id)->exists())

        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">Your Profile</div>

                <div class="card-body">
                    @if ($errors->all())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </div>
                    @endif
                    @if (session('up'))
                        <div class="alert alert-success" role="alert">
                                <li>{{ session('up') }}</li>
                        </div>
                    @endif
                    @if (session('pass_ch'))
                        <div class="alert alert-success" role="alert">
                                <li>{{ session('pass_ch') }}</li>
                        </div>
                    @endif
                    {{-- {{ print_r($cus_data->all()) }} --}}
                    {{-- {{ $cus_data->zip_code }} --}}
                    <label class="form-control"><b>Name : {{ Auth::user()->name }}</b></label>
                    <label class="form-control"><b>Email : {{ Auth::user()->email }}</b></label>
                      <form action="{{url('/update/customer/profile')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="company"><b>Company</b></label>
                          <input type="text" class="form-control" name="company" placeholder="Enter Company Name" value="{{ $cus_data[0]->company }}">
                          <br>
                          <label for="address"><b>Address</b></label>
                          <Textarea class="form-control" rows="3" name="address">{{ $cus_data[0]->address }}</Textarea>
                          <br>
                          <label for="zip_code"><b>zip Code</b></label>
                          <input type="text" class="form-control" name="zip_code" placeholder="Enter zip Code" value="{{ $cus_data[0]->zip_code }}">
                          <br>
                          <label for="phone"><b>Phone Number</b></label>
                          <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{ $cus_data[0]->phone }}">
                        </div>
                        <button type="submit" class="btn btn-info">Update Profile</button>
                      </form>





                </div>
            </div>
        </div>
        @else
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">Please Complete Your Profile</div>

                <div class="card-body">
                    @if ($errors->all())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </div>
                    @endif
                    @if (session('pass_ch'))
                        <div class="alert alert-success" role="alert">
                                <li>{{ session('pass_ch') }}</li>
                        </div>
                    @endif
                    {{-- {{ print_r($errors->all()) }} --}}
                      <form action="{{url('/set/profile')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="company">Company</label>
                          <input type="text" class="form-control" name="company" placeholder="Enter Company Name">
                          <br>
                          <label for="address">Address</label>
                          <Textarea class="form-control" rows="3" name="address"></Textarea>
                          <br>
                          <label for="zip_code">zip Code</label>
                          <input type="text" class="form-control" name="zip_code" placeholder="Enter zip Code">
                          <br>
                          <label for="phone">Phone Number</label>
                          <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number">
                        </div>
                        <button type="submit" class="btn btn-success">Done</button>
                      </form>





                </div>
            </div>
        </div>
        @endif
    </div>
</div>




@endsection
