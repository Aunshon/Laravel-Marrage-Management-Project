@php
    $maleData = App\Category::where('productType',1)->get();
    $femaleData = App\Category::where('productType',2)->get();
@endphp
<div class="row mb-5">
      <div class="col-md-3 mt-2">



        <ul class="list-group mt-2">
            <li class="list-group-item list-group-item-action list-group-item-primary text-center">Our Services</li>

        </ul>
        <ul class="list-group">
            <!-- Start Bride part--->
               <div class="card">
                  <div class="card-header text-center" role="tab">
                     <h5 class="mb-0">
                      <a class="lead" data-toggle="collapse" href="#section-2">Bride Products</a>
                     </h5>
                 </div>
                 <div class="collapse" id="section-2" data-parent="#accordion">
                     <div class="card-body">
                         @foreach ($maleData as $item)
                         <a class="dropdown-item" href="{{ url('/product') }}/{{ $item->id }}">{{ $item->categoryName  }}</a>
                        @endforeach
                      </div>
                  </div>
               </div>
               <!-- Start Bride part--->

            <!-- Start Groom part--->
               <div class="card">
                  <div class="card-header text-center" role="tab">
                     <h5 class="mb-0">
                      <a class="lead" data-toggle="collapse" href="#section-3">Groom Products</a>
                     </h5>
                 </div>
                 <div class="collapse" id="section-3" data-parent="#accordion">
                     <div class="card-body">
                        {{-- <a class="dropdown-item" href="{{ url('/jewellary') }}">Jwellery</a>
                        <a class="dropdown-item" href="{{ url('/cloth') }}">Female Fashion</a>
                        <a class="dropdown-item" href="{{ url('/femaleParlour') }}">Female Parlour</a> --}}
                        @foreach ($femaleData as $item)
                            <a class="dropdown-item" href="{{ url('/product') }}/{{ $item->id }}">{{ $item->categoryName  }}</a>
                        @endforeach
                      </div>
                  </div>
               </div>
               <!-- Start Groom part--->

            <!-- Start Celebration part--->
               <div class="card">
                  <div class="card-header text-center" role="tab">
                     <h5 class="mb-0">
                      <a class="lead"  href="{{ __('celebration') }}">Celebration</a>
                     </h5>
                 </div>

               </div>
               <!-- Start Celebration part--->
        </ul>

        <br><br>
      </div>
