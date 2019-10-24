<div class="row mb-5">
      <div class="col-md-3 mt-2">

        <li class="list-group-item list-group-item-action list-group-item-primary text-center">Celebration Category and data</li>

        <!-- Start Collapse -->

        <div id="accordion">

  <div class="card text-center">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed text-center" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Category Information
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
              <a href="{{ url('/add_celebration_category') }}">Add celebration Category</a> <br>
              <a href="{{ url('/manage_celebration_category') }}">Manage celebration Category</a>

      </div>
    </div>
  </div>
  <div class="card text-center">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed text-center" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Product Information
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <a href="{{ url('/add_celebration_product') }}">Add Celebration Product</a><br>
        <a href="{{ url('/manage_celebration_product') }}">Manage Celebration Product</a>
      </div>
    </div>
  </div>
</div>


<br><br>
</div>
</div>


















<div class="row mb-5">
      <div class="col-md-3 mt-2">

        <li class="list-group-item list-group-item-action list-group-item-primary text-center">Product category and data</li>

        <!-- Start Collapse -->

        <div id="accordion">

  <div class="card text-center">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed text-center" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Category Information
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
              <a href="{{ url('/add_category') }}">Add Category</a> <br>
              <a href="{{ url('/manage_category') }}">Manage Category</a>

      </div>
    </div>
  </div>
  <div class="card text-center">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed text-center" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Product Information
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <a href="{{ url('/add_product') }}">Add Product</a><br>
        <a href="{{ url('/manage_product') }}">Manage Product</a>
      </div>
    </div>
  </div>
</div>


<br><br>
</div>
