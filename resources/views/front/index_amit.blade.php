    @extends('front.layout.auth')

    @section('content')  
    <style>
    
    .cities div {
       width: 100% !important;
    }
    </style>
    <!-- hero-section -->
    <div class="hero-section-third">
        <div class="container">
            <div class="row">
                <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 col-md-10 col-sm-10 col-10">
                    <!-- search-block -->
                    <div class="">
                        <div class="text-center search-head">
                            <h1 class="search-head-title text-white">Search Vendors <img src="https://maps.google.com/mapfiles/kml/paddle/V.png"/> your Local Area</h1>
                            <p class="d-none d-xl-block d-lg-block d-sm-block text-white">Just Select State And City In Your Area Or Type Your Shop Name — For Any Kind Of Services Search More & More.</p>
                        </div>
                        <!-- /.search-block -->
                        <!-- search-form -->
                        <div class="search-form">
                        <form action="{{ route('vendors-search')}}" class="form-row" method="post">
                    {{csrf_field()}}  
                    
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
                                    
                                    <input type="text" class="form-control" placeholder="input shop name" name="shop_title"/>
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
                                  <option value="{{ $rows->id }}">
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
                     <input type="submit" class="btn btn-default btn-block" name="search" value="Search"/>
                                </div>
                            </form>
                        </div>
                        <!-- /.search-form -->
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1">{{ $vendorsCount }}+</h3>
                                <p class="text-white">Vendors Listing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1">{{ $customerCount }}+</h3>
                                <p class="text-white">Our Customers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1">{{ $citiesCount }}+</h3>
                                <p class="text-white">List Cities</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-2">{{ $employeeCount }}+</h3>
                                <p class="text-white">Our Employee</p>
                            </div>
                        </div>
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
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb60">
                  <div class="d-xl-flex">
                     <div class="flex-fill vendor-thumbnail-second-icon ">
                        <div class="vendor-thumbnail-second-icon-circle ">
                           <i class="flaticon-046-wedding copy 2"></i>
                        </div>
                        <div class="vendor-icon-text">
                           <h4 class="mb-1">Wedding Venue</h4>
                           <p><small>12 Listing</small></p>
                        </div>
                     </div>
                     <div class="flex-fill  vendor-thumbnail-second-icon">
                        <div class="vendor-thumbnail-second-icon-circle ">
                           <i class="flaticon-033-bouquet copy 2"></i>
                        </div>
                        <div class="vendor-icon-text">
                           <h4 class="mb-1">Florist</h4>
                           <p><small>2 Listing</small></p>
                        </div>
                     </div>
                     <div class="flex-fill  vendor-thumbnail-second-icon">
                        <div class="vendor-thumbnail-second-icon-circle ">
                           <i class="flaticon-008-wedding-dress copy"></i>
                        </div>
                        <div class="vendor-icon-text">
                           <h4 class="mb-1">Dresses</h4>
                           <p><small>8 Listing</small></p>
                        </div>
                     </div>
                     <div class="flex-fill vendor-thumbnail-second-icon">
                        <div class="vendor-thumbnail-second-icon-circle ">
                           <i class="flaticon-007-ring copy"></i>
                        </div>
                        <div class="vendor-icon-text">
                           <h4 class="mb-1">Jewellery</h4>
                           <p><small>10 Listing</small></p>
                        </div>
                     </div>
                  </div>
                  <div class="d-xl-flex">
                     <div class="flex-fill vendor-thumbnail-second-icon">
                        <div class="vendor-thumbnail-second-icon-circle ">
                           <i class="flaticon-025-wedding-cake copy 2"></i>
                        </div>
                        <div class="vendor-icon-text">
                           <h4 class="mb-1">Wedding Cake</h4>
                           <p><small>15 Listing</small></p>
                        </div>
                     </div>
                     <div class="flex-fill  vendor-thumbnail-second-icon">
                        <div class="vendor-thumbnail-second-icon-circle ">
                           <i class="flaticon-038-camera copy 2"></i>
                        </div>
                        <div class="vendor-icon-text">
                           <h4 class="mb-1">Photographer</h4>
                           <p><small>10 Listing</small></p>
                        </div>
                     </div>
                     <div class="flex-fill  vendor-thumbnail-second-icon">
                        <div class="vendor-thumbnail-second-icon-circle ">
                           <i class="flaticon-005-gramophone"></i>
                        </div>
                        <div class="vendor-icon-text">
                           <h4 class="mb-1">Wedding Dj</h4>
                           <p><small>16 Listing</small></p>
                        </div>
                     </div>
                     <div class="flex-fill vendor-thumbnail-second-icon">
                        <div class="vendor-thumbnail-second-icon-circle ">
                           <i class="flaticon-045-bride"></i>
                        </div>
                        <div class="vendor-icon-text">
                           <h4 class="mb-1">Beauty Salon</h4>
                           <p><small>10 Listing</small></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                  <a href="{{ url('/vendors') }}" class="btn btn-outline-default btn-lg">View All Category</a>
               </div>
            </div>
         </div>
      </div>

       <!-- /.venue-categoris-section-->
      <div class="dzsparallaxer auto-init out-of-bootstrap" data-options='{ direction: "normal"}' style="height: 553px;">
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
      </div>

      <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt80 mb60">
                  <hr>
               </div>
            </div>
         </div>
      <div class="container">
            <div class="row">
               <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                  <div class="section-title text-center">
                     <!-- section title start-->
                     <h2 class="mb10">Pneck How it works ?</h2>
                     <p>Every People Wanted To Know How It Works Pneck In A Simple Way.</p>
                  </div>
                  <!-- /.section title start-->
               </div>
            </div>
            <div class="row">
               <!-- feature-1 -->
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center">
                  <div class="feature">
                     <div class="feature-icon icon-circle circle-xxxl pinside80  bg-light-default text-default mr-auto ml-auto shape-circle rounded-0 mb40 ">
                     <img src="{{ url('/front_theme/images/logo-pneck.png') }}">
                        <div class="process-number-second">
                           <div class="feature-icon icon-circle circle-lg bg-default text-white p-0 ">
                              1
                           </div>
                        </div>
                     </div>
                     <div class="feature-content p-4">
                        <h3>Pneck Customer's App</h3>
                        <p>In Customer's App Click On Book Now Options Pneck Systems Search The Closest Pneck Employee. </p>
                     </div>
                     <div class="process-arrow d-none d-xl-block d-lg-block"><img src="{{ url('/front_theme/images/arrow.png') }}" alt=""></div>
                  </div>
               </div>
               <!-- feature-1 -->
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center">
                  <div class="feature">
                     <div class="feature-icon icon-circle  circle-xxxl pinside80  bg-light-default text-default mr-auto ml-auto shape-circle rounded-0 mb40  ">
                     <img src="{{ url('/front_theme/images/pneck_employee.png') }}">
                        <div class="process-number-second">
                           <div class="feature-icon icon-circle circle-lg bg-default text-white p-0 ">
                              2
                           </div>
                        </div>
                     </div>
                     <div class="feature-content p-4">
                        <h3>Pneck Employee App</h3>
                        <p>In Pneck Employee App Employee Login Goted The Customers Booking Request With Notificaiton for Comming a Booing Request.</p>
                     </div>
                     <div class="process-arrow d-none d-xl-block d-lg-block"><img src="{{ url('/front_theme/images/arrow.png') }}" alt=""></div>
                  </div>
               </div>
               <!-- feature-1 -->
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center">
                  <div class="feature">
                     <div class="feature-icon icon-circle circle-xxxl pinside80 mb40 bg-light-default text-default mr-auto ml-auto shape-circle rounded-0 ">
                     <img src="{{ url('/front_theme/images/logo-pneck.png') }}">  
                     <!-- <i class="flaticon-009-calendar-1 icon-5x"></i> -->
                        <div class="process-number-second">
                           <div class="feature-icon icon-circle circle-lg bg-default text-white p-0 ">
                              3
                           </div>
                        </div>
                     </div>
                     <div class="feature-content p-4">
                        <h3>Pneck Customer's App</h3>
                        <p>After OTP Confirm Customer's Track The Pneck Delivery Boy After Reached The Employee On Customer's Current Locations Then Pay the Payment By Cash On Delivery</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
 

          <div class="cta-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12">
                    <div class="cta-section" id="cta-section">
                        <h1 class="text-white">HURRY UP! Download<br/>The Pneck App </h1>
                        <p class="mb40">Pneck App avalable in 3 types of categories which is Pneck User App for Customers,Pneck Vendors App for Vendor's, Pneck Employee App for our Pneck Employee Delivery Boy.
                        </p>
                        <a href="#"><img src="{{ url('/front_theme/images/app-store-icon.png') }}" alt="" class="img-fluid"></a>
                        <a href="#"><img src="{{ url('/front_theme/images/play-store-icon.png') }}" alt="" class="img-fluid"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="space-medium bg-white">
         <div class="container">
            <div class="row">
               <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                  <div class="section-title text-center">
                     <h2 class="mb10">Real Testimonials</h2>
                     <p>You can click also read the our pneck real testimonials.....</p>
                  </div>
                  <!-- /.section title start-->
               </div>
            </div>
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="op-section op-eight-section section" id="section5">
                     <div class="ocean-2">
                        <div class="wave-2"></div>
                        <div class="wave-2"></div>
                     </div>
                     <div class="section-eight">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-3 col-sm-3">
                                 <div class="container-pe-quote left">
                                    <div class="pp-quote li-quote-1">
                                    <img class="" src="{{ url('/front_theme/images/pneck_vendor.png') }}" alt="">  
                                    </div>
                                    <div class="pp-quote li-quote-2">
                                    <img class="" src="{{ url('/front_theme/images/pneck_vendor.png') }}" alt=""> 
                                    </div>
                                    <div class="pp-quote li-quote-3">
                                    <img class="" src="{{ url('/front_theme/images/pneck_vendor.png') }}" alt=""> 
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="sec-eight-text-area">
                                    <!-- <img class="" src="assets/images/website/Nana-4.png" alt="">
                                       <h1>MADGE JENNINGS</h1> -->
                                    <div class="container-dp-name">
                                       <div class="box-dpname dp-name-1 hide-dp-top">
                                       <img class="" src="{{ url('/front_theme/images/logo_header.png') }}" alt="">
                                       <h1>OSS Said</h1>
                                       </div>
                                       <div class="box-dpname dp-name-2 hide-dp-top">
                                       <img class="" src="{{ url('/front_theme/images/logo_header.png') }}" alt="">
                                       <h1>OSS Said</h1>
                                       </div>
                                       <div class="box-dpname dp-name-3 hide-dp-top">
                                       <img class="" src="{{ url('/front_theme/images/logo_header.png') }}" alt="">
                                       <h1>OSS Said</h1>
                                       </div>
                                       <div class="box-dpname dp-name-4 hide-dp-bottom">
                                       <img class="" src="{{ url('/front_theme/images/logo_header.png') }}" alt="">
                                       <h1>OSS Said</h1>
                                       </div>
                                       <div class="box-dpname dp-name-5 hide-dp-top">
                                       <img class="" src="{{ url('/front_theme/images/logo_header.png') }}" alt="">
                                       <h1>OSS Said</h1>
                                       </div>
                                       <div class="box-dpname dp-name-6 hide-dp-top">
                                       <img class="" src="{{ url('/front_theme/images/logo_header.png') }}" alt="">
                                       <h1>OSS Said</h1>
                                       </div>
                                       <div class="box-dpname dp-name-7 look">
                                          <img class="" src="{{ url('/front_theme/images/logo_header.png') }}" alt="">
                                          <h1>OSS Said</h1>
                                       </div>
                                    </div>
                                    <!-- <img class="" src="assets/images/website/quote.png" alt="">                                        
                                       <p>Whether you enjoy city breaks or extended holidays in the sun, you
                                           can always improve your travel experiences by staying in a small,
                                           charming hotel, where the atmosphere is welcoming and friendly and
                                       </p> -->
                                    <div class="container-quote">
                                       <div class="quote quote-text-1 hide-top">
                                          <i class="fas fa-quote-left fa-2x"></i>                                   
                                          <p>It is a Amazing Automated Live Tracking Delivery Systems. Everyone Can Install By Google Play Store.              
                                          </p>
                                       </div>
                                       <div class="quote quote-text-2 hide-top">
                                          <i class="fas fa-quote-left fa-2x"></i>                                             
                                          <p>It is a Amazing Automated Live Tracking Delivery Systems. Everyone Can Install By Google Play Store.              
                                          </p>
                                       </div>
                                       <div class="quote quote-text-3 hide-top">
                                          <i class="fas fa-quote-left fa-2x"></i>                                             
                                          <p>It is a Amazing Automated Live Tracking Delivery Systems. Everyone Can Install By Google Play Store.              
                                          </p>
                                       </div>
                                       <div class="quote quote-text-4 hide-bottom">
                                          <i class="fas fa-quote-left fa-2x"></i>                                       
                                          <p>It is a Amazing Automated Live Tracking Delivery Systems. Everyone Can Install By Google Play Store.              
                                          </p>
                                       </div>
                                       <div class="quote quote-text-5 hide-top">
                                          <i class="fas fa-quote-left fa-2x"></i>                                       
                                          <p>It is a Amazing Automated Live Tracking Delivery Systems. Everyone Can Install By Google Play Store.              
                                          </p>
                                       </div>
                                       <div class="quote quote-text-6 hide-top">
                                          <i class="fas fa-quote-left fa-2x"></i>                                           
                                          <p>It is a Amazing Automated Live Tracking Delivery Systems. Everyone Can Install By Google Play Store.              
                                          </p>
                                       </div>
                                       <div class="quote quote-text-7 show">
                                          <i class="fas fa-quote-left fa-2x"></i>                                           
                                          <p>It is a Amazing Automated Live Tracking Delivery Systems. Everyone Can Install By Google Play Store.              
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                 <div class="container-pe-quote right">
                                    <div class="pp-quote li-quote-4">
                                    <img class="" src="{{ url('/front_theme/images/pneck_employee.png') }}" alt=""> 
                                    </div>
                                    <div class="pp-quote li-quote-5">
                                    <img class="" src="{{ url('/front_theme/images/pneck_employee.png') }}" alt="">
                                    </div>
                                    <div class="pp-quote li-quote-6">
                                    <img class="" src="{{ url('/front_theme/images/pneck_employee.png') }}" alt="">  
                                    </div>
                                    <div class="pp-quote li-quote-7 active">
                                    <img class="" src="{{ url('/front_theme/images/pneck_employee.png') }}" alt="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer-section -->
    <!-- /.blog-post-section -->
    <div class="space-small bg-default text-white">
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
    </div>

    
    @section('script')
    <script>
$('#country').change(function(){
  var cid = $(this).val();
  if(cid){
  $.ajax({
     type:"get",
     url:" url('/state') /"+cid, //Please see the note at the end of the post**
     success:function(res)
     {       
          if(res)
          {
              $("#state").empty();
              $("#city").empty();
              $("#state").append('<option>Select State</option>');
              $.each(res,function(key,value){
                  $("#state").append('<option value="'+key+'">'+value+'</option>');
              });
          }
     }

  });
  }
});

$('.cities').find("div").css('width','100%');

$('#state').change(function(){
  var sid = $(this).val();
  if(sid){
  $.ajax({
     type:"get",
     //data: {"_token": "{{ csrf_token() }}"},
     url:"{{ url('/getCities')}}/"+sid, //Please see the note at the end of the post**
     success:function(res)
     {      
          if(res)
          {
               $('.cities').find("div").hide();
               $("#city").css('display','block');
               
              //$('#city').append('<option>Select City</option>');
              $.each(res,function(key,value){
                  $("#city").append('<option value="'+key+'">'+value+'</option>');
              });
          }
     }

  });
  }
}); 
</script> 
@endsection
@endsection