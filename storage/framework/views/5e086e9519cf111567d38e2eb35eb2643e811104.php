<?php $__env->startSection('content'); ?> 
<style>
    
    .cities div {
       width: 100% !important;
    }
    </style>
    
    <!--list-half-map -->
    <div class="container-fluid">

    <div id="output"></div>

   

        <div class="row">
            
            <!-- Modal Start-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog col-md-8" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Vendor Details updated riz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <div class="row">
                <div class="col-md-4">
                
                <!-- Vendor Data display start -->
                <div class="vendor-thumbnail">
                               
            <div class="vendor-img zoomimg">          
          
                
          <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" class="img-fluid">
               
            </div>
                              
                <div class="vendor-content">
                                  
                <h2 class="vendor-title">
                <input type="text" style="border:none;" id="shoptitle" class="title" readonly/>
                 </h2>
                <input type="text" style="border:none;" id="shopaddress" class="vendor-address" readonly/>
                               </div>
                              
                               <div class="vendor-meta">
                                    
                                   <div class="vendor-meta-item vendor-meta-item-bordered">
                                       <span class="rating-star">
                                   <i class="fa fa-star rated"></i>
                                   <i class="fa fa-star rated"></i>
                                   <i class="fa fa-star rated"></i>
                                   <i class="fa fa-star rated"></i>
                                   <i class="fa fa-star rate-mute"></i> 
                                   </span>
                                   
    <input type="text" style="border:none;" id="shoprating" class="rating-count vendor-text" readonly/>
                                    </div>
                               </div>
                           </div> 
                <!-- Vendor Data dispaly End -->

                </div>
                <div class="col-md-8" style="height:300px;" id="popup_map">
                welcome-8
                </div>
                </div>
                    
                </div>

                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->

                </div>
            </div>
            </div>
            <!-- Model End -->
            
            
           <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 nopl nopr">
                <!-- filter-bg -->
                <div class="filter-form">
                    <form class="form-row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 class="widget-title">filter</h3>
                        </div>
                        <!-- venue type -->
                        
                        <!-- /.venue type -->
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide" name="state_id" required id="state">
                              <option value="">Select State</option>
                              <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                  <option value="<?php echo e($rows->id); ?>">
                                  <?php echo e(ucfirst($rows->name)); ?>

                                  </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 cities">
                            <!-- City -->
                            <select class="form-control" name="city_id" required id="city">
                          <option value="">Select City</option>
                          </select>
                            <!-- /.City -->
                        </div>
                        
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                             <input type="text" placeholder="vendor type" class="form-control" name="shop_title"/>
                            <!-- <select class="wide" name="vendor_type" required>
                                <option value="">Vendor Type</option>
                                <option value="static">Static</option>
                                <option value="dynamic">Dynamic</option>
                            </select> -->
                        </div>
                        
                         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <input class="btn btn-default btn-block btn-lg" type="submit" name="search" value="Search"/>
                        </div>
                        
                        
                    </form>
                </div>
                <!-- /.filter-bg -->
                <div class="scroll-content">
                    <div class="row">

                    <?php
                    foreach($VendorsList as $value)
                    { 
                        ?>
                        

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 RealWed" id="realwed_0">
                        
            <input type="hidden" name="v_id" class="v_id" id="v_id" value="<?php echo $value['vendor_id']; ?>" /> 
            
             <!--<a type="button" data-toggle="modal" href="#" class="vpopup" data-target="#exampleModal">-->

             
             
             <a href="<?php echo e(url('/')); ?>/vendor_search?id=<?php echo $value['vendor_id'];?>">
             
                           
                        <div class="vendor-thumbnail">
                               
                                <div class="vendor-img zoomimg">
                                   
                                  <?php if($value['image']!= ''): ?>
                                  
             
            <img src="<?php echo e($value['image']); ?>" alt="" class="img-fluid"> </a>
            <?php else: ?>
           
      <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" class="img-fluid">
      
      <?php endif; ?> 
                                    
    <!-- <div class="wishlist-sign"><a href="#" class="btn-wishlist"><i class="fa fa-heart"></i></a></div> -->
    </div>
    
    
                               
                                <div class="vendor-content">
                                   
                                   <?php
                                   if($value['shop_title']!='')
                                   { ?>
                                     <h2 class="vendor-title"><span class="title"><?php echo e($value['shop_title']); ?></span></h2>
                                 <?php }else{ ?>
                                  
                                    <h2 class="vendor-title"><span class="title">Shop Name</span></h2>
                                    <?php } ?>
                                    <p class="vendor-address"><?php echo e($value['address']); ?></p>
                                </div>
                               
                                <div class="vendor-meta">
                                     <!--  <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price"> $150 </span>
                                        <span class="vendor-text">Start From </span> 
                                    </div>

                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-guest"> 120+ </span>
                                        <span class="vendor-text">Guest </span>
                                    </div> -->
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="rating-star">
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rate-mute"></i> 
                                    </span>
                                        <span class="rating-count vendor-text"><?php echo e($value['rating']); ?></span></div>
                                </div>
                            </div>
                            
                            </a>
                            
                        </div>

                    <?php }  ?>
                 
                        
                        <!-- vendor-paginations -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="pagination justify-content-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                    <?php echo e($VendorList->render()); ?>


                                       
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- /.vendor-paginations -->
                    </div> 
                </div>
                
            </div>

            <!-- vendor-locations -->
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 nopl nopr">
                <div id="map_wrapper">
                    <div id="map" style="height: 900px; width: 100%;" class="mapping"></div>
                </div>
            </div>
            <!-- /.vendor-locations -->
        </div>
    </div>
    <!--/.list-half-map -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
   
   
   <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDxFg3_Vj-uEzcFNs2tgHZcz8KnvB1Q-m4" 
          type="text/javascript"></script> 

          <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <script>
        var x  = document.getElementById('output');

        function getLocation(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(
                    showPosition);
                
            }else{
                x.innerHTML = "Browser not Supporting";
            }
        }

        function showPosition(position){
            x.innerHTML = "latitude = "+position.coords.latitude;
            x.innerHTML += "<br/>"
            x.innerHTML = "Lognitude = "+position.coords.lognitude;
        }
    </script>

    <script>
    function geocode(){
        axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
            params:{

            }
        });
    }
    </script>
    <script>

     var locations = [

        <?php
            $row = '';
            foreach($VendorsList as $value)
            {
               
               echo $row.= '["'.$value['address'].'",'.$value['curr_latitude'].','.$value['curr_longitude'].'],';
            ?>
        <?php } ?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: new google.maps.LatLng(20.5937, 78.9629),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    var image = 'https://pneck.in/public/admin_image/pneckV_location.png';

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: image
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
   <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5aMjQnfwosX9hJbLXRE3qC7_xVY7iZDI&callback=initMap">
    </script> -->

    <?php $__env->startSection('script'); ?>
    
<script>
// $('.vpopup').click(function(e){
//     var id =  $(this).closest('div').parent().parent().find('.v_id').val();
//   alert(id);
// });

$(document).on("click", ".vpopup", function(){
  var vid =  $(this).closest('div').find('.v_id').val();
  if(vid){
  $.ajax({
     type:"get",
     url:"<?php echo e(url('/vendor_search/')); ?>/"+vid, //Please see the note at the end of the post**
     success:function(res)
     {       
          if(res)
          {
              console.log(res);
              $("#shoptitle").val(res.shop_title);
              $("#shopaddress").val(res.address);
              $("#shoprating").val(res.rating);

              var Vlocations = [
                [res.address,res.vendor_latitude,res.vendor_longitude],
                ];

                var myOptions = 
                {
                    center: new google.maps.LatLng(20.5937, 78.9629),
                    zoom: 4,
                    mapTypeControl: false,
                    draggable: true,
                    scaleControl: false,
                    scrollwheel: false,
                    navigationControl: false,
                    streetViewControl: false,
                    //disableDefaultUI: true,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }

                var map = new google.maps.Map(document.getElementById('popup_map'), myOptions);
                var infowindow = new google.maps.InfoWindow();
                var marker, i;

                var image = 'https://pneck.in/public/admin_image/pneckV_location.png';

                for (i = 0; i < Vlocations.length; i++) 
                {  
                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(Vlocations[i][1], Vlocations[i][2]),
                    map: map,
                    icon: image
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {   
                        // infoWindow.setPosition(position);
                        infowindow.setContent(Vlocations[i][0]);
                        infowindow.open(map, marker);
                    }
                    })(marker, i));
                }
              
            }
      }

  });
  }
});
</script>
    
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

<?php echo $__env->make('front.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/front/vendor_us.blade.php ENDPATH**/ ?>