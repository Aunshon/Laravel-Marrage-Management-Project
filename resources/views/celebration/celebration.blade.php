



@extends('def_master_auth')
@extends('layouts.def_app')

@section('mainContent')











@auth
<form>
    <h2>Basic Informarion</h2>
  <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Phone Number">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Address">
    </div>
  </div>
<br>
  <div class="form-row">
    <div class="col">
        <p><b>Holud date</b></p>
      <input type="date" class="form-control" name="holud_date">
    </div>
    <div class="col">
        <p><b>Reception date</b></p>
      <input type="date" class="form-control" name="rec_date">
    </div>
  </div>
  <br>
  <div class="form-row">
      <div class="col">
          <button type="submit" class="btn btn-success form-control">Save</button>
      </div>
  </div>
</form>
@else

<div class="alert alert-danger" role="alert">
  To Use Celebration Service You Must
  <a class="btn btn-warning" href="{{ __('login') }}">Login</a> !
</div>
@endauth















    </div>


@endsection
