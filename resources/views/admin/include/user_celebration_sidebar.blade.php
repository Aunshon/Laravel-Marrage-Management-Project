<div class="row mb-5">
      <div class="col-md-3 mt-2">



        <ul class="list-group mt-2">
            <li class="list-group-item list-group-item-action list-group-item-primary text-center">Celebration Services</li>


        </ul>
        <ul class="list-group">
            @auth

            <!-- Start Bride part--->
            <div class="card">
                <div class="card-header text-center" role="tab">
                    <h5 class="mb-0">
                        <a class="lead" data-toggle="collapse" href="#section-2">গায়ে হলুদ</a>
                    </h5>
                </div>
                 <div class="collapse" id="section-2" data-parent="#accordion">
                     <div class="card-body">
                         <a class="dropdown-item" href="{{ url('/hulud_car') }}">Car Decoration</a>
                         <a class="dropdown-item" href="{{ url('/huud_photo_video') }}">Photo/Video Graply</a>
                         <a class="dropdown-item" href="{{ url('/hulud_sound_light') }}">Sound & Light</a>
                         <a class="dropdown-item" href="{{ url('/hulud_stage') }}">Stage</a>
                         <a class="dropdown-item" href="{{ url('/hulud_dj') }}">DJ</a>
                         <a class="dropdown-item" href="{{ url('/hulud_dancer') }}">Dancer</a>
                         <a class="dropdown-item" href="{{ url('/hulud_singer') }}">Singer</a>
                         <a class="dropdown-item" href="{{ url('/hulud_food') }}">food</a>
                         <a class="dropdown-item" href="{{ url('/hulud_snacks') }}">Snacks</a>
                        </div>
                    </div>
                </div>
                <!-- Start Bride part--->

                <!-- Start Groom part--->
                <div class="card">
                    <div class="card-header text-center" role="tab">
                     <h5 class="mb-0">
                         <a class="lead" data-toggle="collapse" href="#section-3">Reception</a>
                        </h5>
                    </div>
                    <div class="collapse" id="section-3" data-parent="#accordion">
                     <div class="card-body">
                         <a class="dropdown-item" href="{{ url('/rec_car') }}">Car Decoration</a>
                         <a class="dropdown-item" href="{{ url('/rec_photo_video') }}">Photo/Video Graply</a>
                         <a class="dropdown-item" href="{{ url('/rec_sound_light') }}">Sound & Light</a>
                         <a class="dropdown-item" href="{{ url('/rec_food') }}">food</a>
                         <a class="dropdown-item" href="{{ url('/rec_snacks') }}">Snacks</a>
                      </div>
                    </div>
                </div>
                <!-- Start Groom part--->
                @endauth

                <!-- Start Celebration part--->
                <div class="card">
                    <div class="card-header text-center" role="tab">
                        <h5 class="mb-0">
                            <a class="lead"  href="{{ __('/') }}">Go Back</a>
                        </h5>
                 </div>

               </div>


        </ul>

        <br><br>
      </div>
