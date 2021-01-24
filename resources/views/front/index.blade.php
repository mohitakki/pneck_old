@extends('front.layout.auth')

@section('content')
    <style>

        .cities div {
            width: 100% !important;
        }
        .header-transparent {
            position: absolute;
            width: 100%;
            z-index: 1030;
            background: transparent;
            border: 0px !important;
        }
        .header-transparent.header-collapse {
            position: relative !important;
        }
        .navbar-transparent .navbar-nav .nav-item .nav-link {
            font-size: 16px;
            color:white;
        }
    </style>
    <!-- hero-section -->
    <div class="hero-section-third" style="padding-top: 157px">
        <div class="container pb-5">
            <div class="row">
                <div class="mx-auto col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
                    <!-- search-block -->
                    <div class="">
                        <div class="text-center search-head" style="margin-bottom: 47px;">
                            <h1 class="search-head-title text-white">Find Local<img
                                    src="https://maps.google.com/mapfiles/kml/paddle/V.png"/>Vendors</h1>
                            <p class="d-none d-xl-block d-lg-block d-sm-block text-white">Just Select State And City In
                                Your Area Or Type Your Shop Name — For Any Kind Of Services Search More & More.</p>
                        </div>
                        <!-- /.search-block -->
                        <!-- search-form -->
                        <div class="col-12 col-lg-7 mx-auto">
                            <div class="search-form bg-transparent">
                                                    <form action="vendors/cate" class="form-row" method="post">
                                    {{csrf_field()}}

                                    <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 col-12 p-0" style="border-radius: 5px!important;">

                                        <select class="wide" name="id" >
                                            <option value="">What are you looking.</option>
                                            @foreach ($VendorCategoryList as $rows)
                                                <option value="{{ $rows->id }}">
                                                    {{ $rows->title }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <!-- button -->
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-3 mt-lg-0 mt-sm-0 mx-auto col-10" style="border-radius: 5px!important;overflow: hidden;padding-left: 20px;">
                                        <input type="submit" class="btn btn-default btn-block text-white" name="search"
                                           value="Search" />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="search-form d-none">
                            <form action="vendors/{{ $rows->title }}" class="form-row" method="post">
                                {{csrf_field()}}

                                <div class="col-xl-3 col-lg-2 col-md-2 col-sm-6 col-6">

                                    <input type="text" class="form-control" placeholder="vendor type"
                                           name="shop_title"/>
                                    <!-- <select class="wide" name="vendor_type" required>
                                        <option value="">Vendor Type</option>
                                        <option value="static">Static</option>
                                        <option value="dynamic">Dynamic</option>
                                    </select> -->
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">

                                    <select class="wide" name="state_id" required id="state">
                                        <option value="">Select State</option>
                                        @foreach ($state as $rows)
                                            <option value="{{ $rows->name }}">
                                                {{ ucfirst($rows->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 cities">

                                    <select class="form-control" name="city_id" required id="city">
                                        <option value="">Select City</option>
                                    </select>
                                </div>

                                <!-- button -->
                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                    <input type="submit" class="btn btn-default btn-block" name="search"
                                           value="Search"/>
                                </div>
                            </form>
                        </div>
                        <!-- /.search-form -->
                    </div>
                </div>
            </div>
            <div class="feature-section border-0" style="background: transparent;margin-top: 75px">
                <div class="container">
                    <div class="row d-none text-center mx-auto">
                        <a class="feature-left-ajk text-center" style="background: rgba(0, 0, 0, 0.4);">
                            <i class="fas fa-clipboard-list text-white"></i>
                            <span class=" feature-content-ajk text-white">Vendors</span>
                        </a>
                        <a class="feature-left-ajk text-center" style="background: rgba(0, 0, 0, 0.4);">
                            <i class="fas fa-clipboard-list text-white"></i>
                            <span class=" feature-content-ajk text-white">Vendors</span>
                        </a>
                        <a class="feature-left-ajk text-center" style="background: rgba(0, 0, 0, 0.4);">
                            <i class="fas fa-clipboard-list text-white"></i>
                            <span class=" feature-content-ajk text-white">Vendors</span>
                        </a>
                        <a class="feature-left-ajk text-center" style="background: rgba(0, 0, 0, 0.4);">
                            <i class="fas fa-clipboard-list text-white"></i>
                            <span class=" feature-content-ajk text-white">Vendors</span>
                        </a>
                    </div>
                    <div class="row">
                        @foreach ($VendorCategoryList_small as $rows)
                        <div class="col-md-2 col-lg-2 " style="padding: 1px;border-radius: 9px;overflow: hidden;">      
                            <div class="feature-left" style="background: rgba(0, 0, 0, 0.4);">
                            <a href="vendors/{{ $rows->title }}" >
                                <div class="feature-icon-ajk text-center">
                                    <i class="fas fa-clipboard-list text-white"></i>
                                </div>
                                <div class="feature-content-ajk text-center">
                                    <p class="text-white">{{ ucfirst($rows->title) }}</p>
                                </div>
                            </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.hero-section -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center">
                        <!-- section title start-->
                        <h2 class="mb10">Our Best Category</h2>
                        <p>View Our Most Searchable Category And Vendors Listing</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>

            <div class="row">

                <?php
                foreach($VendorCategoryList_small as $category) {
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="col-12 p-0" >
                        <div class="categories--widget card-category text-center pb-5">
                            <div class="category-icon mt-5 mb-5 text-white">
                                {{-- <svg width="26" height="24" viewBox="0 0 26 24" xmlns="http://www.w3.org/2000/svg">
                                    <g transform="translate(-11 -12)" fill="none" fill-rule="evenodd">
                                        <circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle>
                                        <g fill="currentColor">
                                            <path d="M28 36h-7v-5h-3v5h-7V12h17v24zm-6-1h5V13H12v22h5v-5h5v5z"></path>
                                            <path
                                                d="M18.5 27.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM25.5 27.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM34.5 27.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM34.5 33.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM18.5 20.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM25.5 20.5h-5v-5h5v5zm-4-1h3v-3h-3v3z"></path>
                                            <path d="M37 36H27V20h10v16zm-9-1h8V21h-8v14z"></path>
                                        </g>
                                    </g>
                                </svg> --}}
                                
                                <img src="{{ $category->category_images }}" width="50px" height="50px" />
                                <span class="text-center category-count text-white"><?php echo $category->count_vendors_count;?></span>
                            </div>
                            <a href="vendors/{{ $category->title }}" class="category-text pt-5 "><?php echo $category->title;?></span></a>
                        </div>
                    </div>
                </div>

                <?php } ?>

            </div>


            <div class="row" id="show">

                @foreach ($VendorCategoryList as $category)
                    
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="col-12 p-0" >
                        <div class="categories--widget card-category text-center pb-5">
                            <div class="category-icon mt-5 mb-5 text-white">
                                {{-- <svg width="26" height="24" viewBox="0 0 26 24" xmlns="http://www.w3.org/2000/svg">
                                    <g transform="translate(-11 -12)" fill="none" fill-rule="evenodd">
                                        <circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle>
                                        <g fill="currentColor">
                                            <path d="M28 36h-7v-5h-3v5h-7V12h17v24zm-6-1h5V13H12v22h5v-5h5v5z"></path>
                                            <path
                                                d="M18.5 27.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM25.5 27.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM34.5 27.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM34.5 33.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM18.5 20.5h-5v-5h5v5zm-4-1h3v-3h-3v3zM25.5 20.5h-5v-5h5v5zm-4-1h3v-3h-3v3z"></path>
                                            <path d="M37 36H27V20h10v16zm-9-1h8V21h-8v14z"></path>
                                        </g>
                                    </g>
                                </svg> --}}
                                
                                <img src="{{ $category->category_images }}" width="50px" height="50px" />
                                <span class="text-center category-count text-white"><?php echo $category->count_vendors_count;?></span>
                            </div>
                            <a href="vendors/{{ $category->title }}" class="category-text pt-5 "><?php echo $category->title;?></span></a>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <p id="action" class="btn btn-outline-default btn-lg">View All Category</a>
                </div>
                
            </div>
            
        </div>
    </div>

    <!-- /.venue-categoris-section-->
    <!--  <div class="dzsparallaxer auto-init out-of-bootstrap" data-options='{ direction: "normal"}' style="height: 553px;">
         <div class="divimage dzsparallaxer--target" style="width: 100%; height: 900px; background-image: url(images/parallax-img-1.jpg)">
         </div>
         <div class="parallax-section">
            <div class="container">
               <div class="row">
                  <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                     <h1 class="text-white mb20">Download Our Vendors App And <span>Grow Your Business</span></h1>
                     <p class="lead text-white">Create Your Self Vendors Services with Pneck Vendors App.</p>
                     <p class="lead text-white">Vendors App Makes It Easy For Couples To Find What They Need <br/>
                        For Your Business</p>
                     <a href="#cta-section" class="btn btn-default btn-lg mt20">Download Now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>  -->

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt80 mb60">--}}
{{--                <hr>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <section style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 mt80 mb60">
                    <div class="section-title text-center">
                        <!-- section title start-->
                        <h2 class="mb10 text-bold-700" style="font-weight: bolder !important;">Pneck How it works ?</h2>
                        <p>Every People Wanted To Know How It Works Pneck In A Simple Way.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row" style="padding-bottom: 90px">
                <!-- feature-1 -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center pt-3">
                    <div class="card shadow">
                        <div class="col-12 pl-0 pr-0 mb-3 border-bottom" style="height: 453px;">
                            <img style="height: 100%; width: 100%" class="card-img-top" src="{{ url('/front_theme/images/pneck_user.jpg') }}" alt="Card image cap">
                            <div class="process-number-second mx-auto">
                                <div class="mx-auto feature-icon icon-circle circle-lg bg-default text-center text-white p-0 ">
                                    <span>1</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pneck User's App</h5>
                            <p class="card-text">In Customer's App Click On Book Now Options Pneck Systems Search The Closest Pneck
                                Employee.</p>
                        </div>
                    </div>
                    <div class="feature d-none">
                        <div
                            class="feature-icon icon-circle circle-xxxl bg-light-default text-default mr-auto ml-auto shape-circle rounded-0 mb40 ">
                            <a href="#"><img src="{{ url('/front_theme/images/pneck_user.jpg') }}" alt=""></a>
                            <div class="process-number-second mx-auto">
                                <div class="mx-auto feature-icon icon-circle circle-lg bg-default text-center text-white p-0 ">
                                    <span>1</span>
                                </div>
                            </div>
                        </div>
                        <div class="feature-content p-4">
                            <h3>Pneck User's App</h3>
                            <p>In Customer's App Click On Book Now Options Pneck Systems Search The Closest Pneck
                                Employee. </p>
                        </div>
                        <!-- <div class="process-arrow d-none d-xl-block d-lg-block"><img src="images/arrow.png" alt=""></div> -->
                    </div>
                </div>
                <!-- feature-1 -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center pt-3">
                    <div class="card shadow">
                        <div class="col-12 pl-0 pr-0 mb-3 border-bottom" style="height: 453px;">
                            <img style="height: 100%; width: 100%" class="card-img-top" src="{{ url('/front_theme/images/pneck_employee.jpg') }}" alt="Card image cap">
                            <div class="process-number-second mx-auto">
                                <div class="mx-auto feature-icon icon-circle circle-lg bg-default text-center text-white p-0 ">
                                    <span>2</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pneck Employee App</h5>
                            <p class="card-text">In Pneck Employee App Employee Login Goted The Customers Booking Request With
                                Notificaiton for Coming a Booking Request.</p>
                        </div>
                    </div>
                    <div class="feature d-none">
                        <div
                            class="feature-icon icon-circle  circle-xxxl bg-light-default text-default mr-auto ml-auto shape-circle rounded-0 mb40  ">
                            <a href="#"><img src="{{ url('/front_theme/images/pneck_employee.jpg') }}" alt=""></a>
                            <div class="process-number-second">
                                <div class=" mx-auto feature-icon icon-circle circle-lg bg-default text-white p-0 ">
                                    2
                                </div>
                            </div>
                        </div>
                        <div class="feature-content p-4">
                            <h3>Pneck Employee App</h3>
                            <p>In Pneck Employee App Employee Login Goted The Customers Booking Request With
                                Notificaiton for Coming a Booking Request.</p>
                        </div>
                        <!-- <div class="process-arrow d-none d-xl-block d-lg-block"><img src="images/arrow.png" alt=""></div> -->
                    </div>
                </div>
                <!-- feature-1 -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center pt-3">
                    <div class="card shadow">
                        <div class="col-12 pl-0 pr-0 mb-3 border-bottom" style="height: 453px;">
                            <img style="height: 100%; width: 100%" class="card-img-top" src="{{ url('/front_theme/images/pneck_vendor.jpg') }}" alt="Card image cap">
                            <div class="process-number-second mx-auto">
                                <div class="mx-auto feature-icon icon-circle circle-lg bg-default text-center text-white p-0 ">
                                    <span>3</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pneck Vendor App</h5>
                            <p class="card-text">After OTP Confirm Customer Tracks The Pneck Delivery Boy After Reached The Employee On
                                Customer's Current Locations Then Pay the Payment By Cash On Delivery.</p>
                        </div>
                    </div>
                    <div class="feature d-none">
                        <div
                            class="feature-icon icon-circle circle-xxxl mb40 bg-light-default text-default mr-auto ml-auto shape-circle rounded-0 ">
                            <a href="#"><img src="{{ url('/front_theme/images/pneck_vendor.jpg') }}" alt=""></a>
                            <div class="process-number-second">
                                <div class="mx-auto feature-icon icon-circle circle-lg bg-default text-white p-0 ">
                                    3
                                </div>
                            </div>
                        </div>
                        <div class="feature-content p-4">
                            <h3>Pneck Vendor App</h3>
                            <p>After OTP Confirm Customer Tracks The Pneck Delivery Boy After Reached The Employee On
                                Customer's Current Locations Then Pay the Payment By Cash On Delivery</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="cta-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12">
                    <div class="cta-section" id="cta-section">
                        <h1 class="text-white">HURRY UP!<br/> Download Pneck App </h1>
                        <p class="mb40">Pneck App available in 3 types of categories which is Pneck User App for
                            Customers,Pneck Vendors App for Vendor's, Pneck Employee App for our Pneck Employee Delivery
                            Boy.</p>
                    <!-- <a href="#"><img src="{{ url('/front_theme/images/app-store-icon.png') }}" alt="" class="img-fluid"></a> -->
                        <a href="https://play.google.com/store/apps/details?id=com.callpneck"><img
                                src="{{ url('/front_theme/images/play-store-icon.png') }}" alt="" class="img-fluid"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer-section -->
    <!-- /.blog-post-section -->
    <!-- <div class="space-small bg-default text-white">
         <div class="container">
             <div class="row">
                 <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                     <h2 class="text-white mb10">Create your Vendor Services Listing Right Now!</h2>
                     <p>Create With Us | Earn With Us.</p>
                 </div>
                 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-center mt-3">
                     <a href="#cta-section" class="btn btn-primary btn-lg">Download Vendor's App</a>
                 </div>
             </div>
         </div>
     </div> -->


@section('script')
    <script>
        $('#country').change(function () {
            var cid = $(this).val();
            if (cid) {
                $.ajax({
                    type: "get",
                    url: " url('/state') /" + cid, //Please see the note at the end of the post**
                    success: function (res) {
                        if (res) {
                            $("#state").empty();
                            $("#city").empty();
                            $("#state").append('<option>Select State</option>');
                            $.each(res, function (key, value) {
                                $("#state").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }

                });
            }
        });

        $('.cities').find("div").css('width', '100%');

        $('#state').change(function () {
            var sid = $(this).val();
            if (sid) {
                $.ajax({
                    type: "get",
                    //data: {"_token": "{{ csrf_token() }}"},
                    url: "{{ url('/getCities')}}/" + sid, //Please see the note at the end of the post**
                    success: function (res) {
                        if (res) {
                            $('.cities').find("div").hide();
                            $("#city").css('display', 'block');

                            //$('#city').append('<option>Select City</option>');
                            $.each(res, function (key, value) {
                                $("#city").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }

                });
            }
        });

        $("#action").click(function(){
                $("#show").toggle();
              });
    </script>
@endsection
@endsection
