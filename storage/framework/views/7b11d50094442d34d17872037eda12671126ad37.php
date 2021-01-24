    

    <?php $__env->startSection('content'); ?>  
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
                            <h1 class="search-head-title text-white">Find Local<img src="https://maps.google.com/mapfiles/kml/paddle/V.png"/>Vendors</h1>
                            <p class="d-none d-xl-block d-lg-block d-sm-block text-white">Just Select State And City In Your Area Or Type Your Shop Name — For Any Kind Of Services Search More & More.</p>
                        </div>
                        <!-- /.search-block -->
                        <!-- search-form -->
                        <div class="search-form">
                        <form action="<?php echo e(route('vendors-search')); ?>" class="form-row" method="post">
                    <?php echo e(csrf_field()); ?> 

                    <div class="col-xl-3 col-lg-2 col-md-2 col-sm-6 col-6">
                                    
                <input type="text" class="form-control" placeholder="vendor type" name="shop_title"/>
                            <!-- <select class="wide" name="vendor_type" required>
                                <option value="">Vendor Type</option>
                                <option value="static">Static</option>
                                <option value="dynamic">Dynamic</option>
                            </select> -->
                                </div> 
                               
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
                                    
                                    <select class="wide" name="state_id" required id="state">
                              <option value="">Select State</option>
                              <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                  <option value="<?php echo e($rows->id); ?>">
                                  <?php echo e(ucfirst($rows->name)); ?>

                                  </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1"><?php echo e($vendorsCount); ?>+</h3>
                                <p class="text-white">Vendors Listing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                            <i class="fas fa-smile"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1"><?php echo e($customerCount); ?>+</h3>
                                <p class="text-white">Our Respected Customers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                            <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1"><?php echo e($citiesCount); ?>+</h3>
                                <p class="text-white">List Cities</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                            <i class="fas fa-heart"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-2"><?php echo e($employeeCount); ?>+</h3>
                                <p class="text-white">Our New Employee</p>
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

            <?php
               foreach($VendorCategoryList as $category) {
            ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card-category">
                        <div class="category-image zoomimg"><a href="<?php echo e(url('/category/')); ?>/<?php echo $category->id;?>"><img src="<?php echo $category->category_images;?>" alt=""></a></div>
                        <div class="category-content">
                            <h3 class="cateogry-title"> <a href="<?php echo e(url('/category/')); ?>/<?php echo $category->id;?>"><?php echo $category->title;?></a> <span class="category-count">(<?php echo $category->count_vendors_count;?>)</span></h3>
                        </div>
                    </div>
                </div>

               <?php } ?>
              
            </div>
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                  <a href="<?php echo e(url('/vendors')); ?>" class="btn btn-outline-default btn-lg">View All Category</a>
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

      <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt80 mb60">
                  <hr>
               </div>
            </div>
         </div>
      <section style="background-color: #fff;">
        <div class="container">
            <div class="row">
               <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 mt80 mb60">
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
                     <div class="feature-icon icon-circle circle-xxxl bg-light-default text-default mr-auto ml-auto shape-circle rounded-0 mb40 ">
                       <a href="#"><img src="<?php echo e(url('/front_theme/images/pneck_user.jpg')); ?>" alt=""></a>
                        <div class="process-number-second">
                           <div class="feature-icon icon-circle circle-lg bg-default text-white p-0 ">
                              1
                           </div>
                        </div>
                     </div>
                     <div class="feature-content p-4">
                        <h3>Pneck User's App</h3>
                        <p>In Customer's App Click On Book Now Options Pneck Systems Search The Closest Pneck Employee. </p>
                     </div>
                     <!-- <div class="process-arrow d-none d-xl-block d-lg-block"><img src="images/arrow.png" alt=""></div> -->
                  </div>
               </div>
               <!-- feature-1 -->
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center">
                  <div class="feature">
                     <div class="feature-icon icon-circle  circle-xxxl bg-light-default text-default mr-auto ml-auto shape-circle rounded-0 mb40  ">
                        <a href="#"><img src="<?php echo e(url('/front_theme/images/pneck_employee.jpg')); ?>" alt=""></a>
                        <div class="process-number-second">
                           <div class="feature-icon icon-circle circle-lg bg-default text-white p-0 ">
                              2
                           </div>
                        </div>
                     </div>
                     <div class="feature-content p-4">
                        <h3>Pneck Employee App</h3>
                        <p>In Pneck Employee App Employee Login Goted The Customers Booking Request With Notificaiton for Coming a Booking Request.</p>
                     </div>
                     <!-- <div class="process-arrow d-none d-xl-block d-lg-block"><img src="images/arrow.png" alt=""></div> -->
                  </div>
               </div>
               <!-- feature-1 -->
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center">
                  <div class="feature">
                     <div class="feature-icon icon-circle circle-xxxl mb40 bg-light-default text-default mr-auto ml-auto shape-circle rounded-0 ">
                        <a href="#"><img src="<?php echo e(url('/front_theme/images/pneck_vendor.jpg')); ?>" alt=""></a>
                        <div class="process-number-second">
                           <div class="feature-icon icon-circle circle-lg bg-default text-white p-0 ">
                              3
                           </div>
                        </div>
                     </div>
                     <div class="feature-content p-4">
                        <h3>Pneck Vendor App</h3>
                        <p>After OTP Confirm Customer Tracks The Pneck Delivery Boy After Reached The Employee On Customer's Current Locations Then Pay the Payment By Cash On Delivery</p>
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
                        <p class="mb40">Pneck App available in 3 types of categories which is Pneck User App for Customers,Pneck Vendors App for Vendor's, Pneck Employee App for our Pneck Employee Delivery Boy.</p>
                        <!-- <a href="#"><img src="<?php echo e(url('/front_theme/images/app-store-icon.png')); ?>" alt="" class="img-fluid"></a> -->
                        <a href="https://play.google.com/store/apps/details?id=com.callpneck"><img src="<?php echo e(url('/front_theme/images/play-store-icon.png')); ?>" alt="" class="img-fluid"></a>
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

    
    <?php $__env->startSection('script'); ?>
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
     //data: {"_token": "<?php echo e(csrf_token()); ?>"},
     url:"<?php echo e(url('/getCities')); ?>/"+sid, //Please see the note at the end of the post**
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
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pneck_backend\resources\views/front/index.blade.php ENDPATH**/ ?>