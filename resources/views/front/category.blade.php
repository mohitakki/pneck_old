    @extends('front.layout.auth')

    @section('content')  
    <style>
    
    .cities div {
       width: 100% !important;
    }
    </style>
    <!-- hero-section -->
    
    <!-- /.hero-section -->
    <div class="space-medium">
         <div class="container">
            <div class="row">
               <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                  <div class="section-title text-center">
                     <!-- section title start-->
                     <h2 class="mb10">Our Best Vendors List</h2>
                     <p>View Our Most Searchable Vendors Listing</p>
                  </div>
                  <!-- /.section title start-->
               </div>
            </div>

            <div class="row">

            <?php
               foreach($VendorsList as $vendor) {
            ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card-category">
                        <div class="category-image zoomimg"><a href="{{ url('/vendors/') }}/<?php echo $vendor->id;?>">

                        @if($vendor->profile_image!= '')
                                <a href="{{ url('/vendors/') }}/<?php echo $vendor->id;?>"><img src="{{ $vendor->profile_image }}" style="height:227px; width:340px;"></a>
                                @else
                               <img src="{{url('/admin_theme/app-assets/images/default_vendor_shop.png') }}">
                                @endif 
                    
                    </a></div>

                        <div class="card-category">
                             <a href="{{ url('/vendors/') }}/<?php echo $vendor->id;?>">  </a> 
                           <div class="inline_form" style="display: flex;">
                            <?php
                                   if($vendor->shop_title!='')
                                   { ?>
                                     <h3 class="cateogry-title"><span class="cateogry-title">{{ $vendor->shop_title }}</span></h3>
                                 <?php }else{ ?>
                                  
                                    <h3 class="cateogry-title"><span class="cateogry-title">Shop Name</span></h3>
                                    <?php } ?>

                       
                                    <span class="rating-count vendor-text" style="float: right;margin-left: 150px !important;font-size: medium;">
                                    @if($vendor->rating){{ 'Rating: '.$vendor->rating }} @else {{ 'Rating: 5' }} @endif</span>
                           </div>
                        </div>
                    </div>
                </div>

               <?php } ?>
              
            </div>
           <!-- <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                  <a href="{{ url('/vendors') }}" class="btn btn-outline-default btn-lg">View All Category</a>
               </div>
            </div> -->
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