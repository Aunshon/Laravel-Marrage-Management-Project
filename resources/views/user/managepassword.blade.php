@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->password == 'social_user')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">Set password</div>

                <div class="card-body">
                    @if ($errors->all())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </div>
                    @endif
                    <span class="form-control"><b> Now Your Default Password  is : </b>{{ Auth::user()->password }}</span>
                    <br>
                    <form action="{{url('/set/user/new/password')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_title">New Password</label>
                            <input type="password" class="form-control" name="new_password" placeholder="Enter New Password">
                            <br>
                            <label for="category_title">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-success">Set</button>
                    </form>





                </div>
            </div>
        </div>
        @else
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">Change password</div>

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
                    <form action="{{url('/change/user/new/password')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_title">Old Password</label>
                            <input type="password" class="form-control" name="old_password" placeholder="Enter old Password">
                            <br>
                            <label for="category_title">New Password</label>
                            <input type="password" class="form-control" name="new_password" placeholder="Enter New Password">
                            <br>
                            <label for="category_title">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-success">Change</button>
                    </form>





                </div>
            </div>
        </div>
        @endif
    </div>
</div>


@endsection
