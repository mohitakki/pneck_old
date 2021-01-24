<?php $__env->startSection('content'); ?> 

    <!-- page-header -->
    <div class="list-single-carousel">
        <div class="owl-carousel owl-theme owl-second">
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(url('/admin_theme/app-assets/images/default_vendor_shop.png')); ?>" alt="">
            </div>
        </div>
    </div>

    <div class="list-single-second">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="vendor-head text-left">
                            <h2 class="mb10"><?php echo e($VendorsList[0]['shop_title']); ?></h2>
                            <p class="vendor-address"><?php echo $VendorsList[0]['address'];?> <a href="#location_map" class="btn-secondary-link ml-2">View Map</a> </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="vendor-head text-xl-right">
                            <a href="#" class="btn-default-wishlist"><i class="fa fa-heart"></i> <span class="pl-1">Add To Wishlist</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vendor-meta bg-white border m-0 ">
                <div class="vendor-meta-item vendor-meta-item-bordered">
                    <span class="vendor-price">
                                    $150
                                </span>
                    <span class="vendor-text">Start From</span></div>
                <div class="vendor-meta-item vendor-meta-item-bordered">
                    <span class="vendor-guest">
                                    120+
                                </span>
                    <span class="vendor-text">Guest</span>
                </div>
                <div class="vendor-meta-item vendor-meta-item-bordered">
                    <span class="rating-star">
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rate-mute"></i> 
                                    </span>
                    <span class="rating-count vendor-text">(20)</span>
                </div>
            </div>
        </div>
    </div>

<div class="vendor-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <!--vendor-details -->
                   
                    <div class="">

                   
                        <div class="card border card-shadow-none">
                            <h3 class="card-header bg-white">About US</h3>
                            <div class="card-body">
                                <!--/.vendor-details -->
                                <!--vendor-description -->
                                <!-- <p class="lead">Duis vulputate ultrices odio, vitae tristique lectus dapibus sit amet. Vivamus iaculis sagittis libero, at mollis ante semper eu. </p>
                                <p>Duis vulputate ultrices odio, vitae tristique lectus dapibus sit amet. Vivamus iaculis sagittis lisus libero, a aliquet odio pretium non. Curabitur at porta ex, eu pretium felis. Fusce mattis efficitur nisi, non pretium nulla luctus sit amet. </p>
                                <p>Etiam varius ultricies augue, in ornare lorem congue eu. Aliquam magna metus, rhoncus a pellentesque tincidunt, accumsan ut urna. Sed congue turpis sit amet urna interdum, ut consequat dolor rhoncus</p> -->
                               
                                <!-- <h4>Sub heading </h4>
                                <p>Etiam placerat dictum dolor ac volutpat. Cras egestas laoreet risus id elementum. Etiam ultrices vitae dui ut finibus. In ac rhoncus mauris, aliquet efficitur erat. Sed laoreet luctus tellus vel porttitor. Aliquam non tellus in eros congue fermentum. Nulla tincidunt volutpat ligula, non rutrum lectus luctus quis.</p>
                                <p>Donec accumsan consequat massa non gravida.<span class="text-default">Morbi pharetra mollis tortor ac maximus.</span> Nunc dapibus bibendum urna, in egestas dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p> -->
                               
                                <div class="venue-highlights">
                                    <div class=" table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Venue Highlights</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Opening Time</td>
                                                    <td class="venue-highlight-meta"><?php echo e($VendorsList[0]['opening_time']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Closing Time</td>
                                                    <td class="venue-highlight-meta"><?php echo e($VendorsList[0]['closing_time']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Opening Days</td>
                                                    <td class="venue-highlight-meta"><?php echo e($VendorsList[0]['days']); ?></td>
                                                </tr>
                                                <!-- <tr>
                                                    <td>Vendor Service</td>
                                                    <td class="venue-highlight-meta"><?php echo e($VendorsList[0]['professional_service']); ?></td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.venue-highlights -->
                            </div>
                        </div>
                        
                        <!-- <div class="card border card-shadow-none">
                            <h3 class="card-header bg-white">Accommodations / Amenities Included</h3>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="animities-list">
                                            <ul class="list-unstyled arrow">
                                                <li>Air conditioning</li>
                                                <li>Bathroom</li>
                                                <li>Hair Dryer</li>
                                                <li>Kitchen</li>
                                                <li>Linen supplied</li>
                                                <li>Non-smoking</li>
                                                <li>Open fireplace </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="animities-list">
                                            <ul class="list-unstyled arrow">
                                                <li> Parking</li>
                                                <li>Pet-friendly </li>
                                                <li>Towels supplied </li>
                                                <li>TV</li>
                                                <li>Washing machine</li>
                                                <li>Wheelchair</li>
                                                <li>Access Wifi</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        
                        <div id="reviews">
                            <div class="card border card-shadow-none ">
                                <div class="card-header bg-white">
                                    <h3 class="mb0 d-inline-block">Reviews</h3>
                                    <a href="#" class="btn btn-default btn-sm float-right d-inline-block">write a review</a>
                                </div>
                                <div class="card-body">
                                    <div class="review-block">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                               
                                                <div class="review-sidebar">                                                    
                                                        <div class="review-total"><?php echo $VendorsList[0]['rating'];?></div>
                                                        <div class="review-text">Reviews</div>
                                                        <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa  fa-star"></i> <i class="fa fa-star"></i> </span>
                                                        <!-- <p>4.4 average based on 1 ratings.</p> -->                                                 
                                                </div>
                                               
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                
                                            <!-- <div class="review-box">

                                                <div class="review-list">
                                                    <div class="review-for">Quality Service</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far  fa-star"></i> </span></div>
                                                    <div class="review-number">3.0</div>
                                                </div>
                                               
                                                <div class="review-list">
                                                    <div class="review-for">Facilities</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> </span></div>
                                                    <div class="review-number">4.0</div>
                                                </div>
                                                
                                                <div class="review-list">
                                                    <div class="review-for">Staff</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </span></div>
                                                    <div class="review-number">3.0</div>
                                                </div>
                                                
                                                <div class="review-list">
                                                    <div class="review-for">Flexibility</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </span></div>
                                                    <div class="review-number">3.0</div>
                                                </div>
                                               
                                                <div class="review-list">
                                                    <div class="review-for">Value of money</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> </span></div>
                                                    <div class="review-number">4.0</div>
                                                </div>
                                               
                                            </div> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card border card-shadow-none ">

                          <?php $__currentLoopData = $rating_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="card-header bg-white mb0">
                                <div class="review-user">
                                    <!-- <div class="user-img">                                    
                                    <img src="images/review-pic-1.jpg" alt="star rating jquery" class="rounded-circle">
                                    </div> -->

                                    <div class="user-meta">
                                        <h5 class="user-name mb-0"><?php echo e($info->first_name); ?> <?php echo e($info->last_name); ?><span class="user-review-date"><?php echo e(\Carbon\Carbon::parse($info->created_at)->format('d-M-Y')); ?></span></h5>
                                        <div class="given-review">
                                            <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far  fa-star"></i> <i class="far  fa-star"></i></span></div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="card-body">
                              
                                <div class="review-descriptions">
                                    <p><?php echo e($info->message); ?></p>
                                </div>
                               
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        
                    </div>
                    
                    <div class="card border card-shadow-none leave-review">
                        <div class="card-header bg-white mb0">
                            <h3 class="mb0">Write Your Reviews</h3>
                        </div>
                        <div class="card-body">
                            <div class="review-rating-select">
                                <div class="mb10">
                                    <span class="text-dark">Quality Service</span>
                                    <span id="rateYo1"></span>
                                </div>
                                <div class="mb10">
                                    <span class="text-dark">Facilities</span>
                                    <span id="rateYo2"></span>
                                </div>
                                <div class="mb10">
                                    <span class="text-dark">Staff</span>
                                    <span id="rateYo3"></span>
                                </div>
                                <div class="mb10">
                                    <span class="text-dark">Flexibility</span>
                                    <span id="rateYo4"></span>
                                </div>
                                <div class="mb10">
                                    <span class="text-dark">Value of money</span>
                                    <span id="rateYo5"></span>
                                </div>
                            </div>
                            <form>
                                <div class="row">
                                    <!-- Textarea -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt30">
                                        <div class="form-group">
                                            <label class="control-label" for="review">Write Your Review</label>
                                            <textarea class="form-control" id="review" name="review" rows="5" placeholder="Write Review"></textarea>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Name</label>
                                            <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email</label>
                                            <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="">
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <button id="submit" name="submit" class="btn btn-default">Submit review</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.review-form -->
                    <!-- location -->
                    <div class="card border card-shadow-none" id="location_map">
                        <div class="card-header bg-white mb0">
                            <h3 class="mb0">Location - Map</h3>
                        </div>
                        <div class="card-body">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
                <!-- /.location -->
                <!-- list-sidebar -->

               

                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                    <div class="sidebar-venue">

                   

                    <!-- venue-admin -->
                    <div class="vendor-owner-profile mb30">
                            <div class="vendor-owner-profile-head">
                                <!-- <div class="vendor-owner-profile-img">
                                <img src="images/admin-pic.jpg" class="rounded-circle" alt="">
                                </div> -->
                                <h4 class="vendor-owner-name mb0"><?php echo $VendorsList[0]['shop_title'];?></h4>
                            </div>
                            <div class="vendor-owner-profile-content">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="mr-2 text-default"><i class="fas fa-fw fa-map-marker-alt"></i></span><?php echo $VendorsList[0]['address'];?></li>
                                    <li class="list-group-item"><span class="mr-2  text-default"><i class="fas fa-fw fa-phone"></i></span><?php echo $VendorsList[0]['phone'];?></li>
                                    <!-- <li class="list-group-item"><span class="mr-2 text-default"><i class="fas fa-fw fa-envelope"></i></span>www.yourdomain.com</li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- /.venue-admin -->

                        <!--<div class="card">-->
                        <!--    <div class="card-body">-->
                        <!--        <form>-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--                    <h3 class="mb20">Request Quote</h3>-->
                        <!--                </div>-->
                                        <!-- Text input-->
                        <!--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <label class="control-label sr-only" for="name1">Name</label>-->
                        <!--                        <input id="name1" name="name1" type="text" placeholder="Name" class="form-control input-md" required="">-->
                        <!--                    </div>-->
                        <!--                </div>-->
                                        <!-- Text input-->
                        <!--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <label class=" control-label sr-only" for="email2">Email</label>-->
                        <!--                        <input id="email2" name="email2" type="text" placeholder="Email" class="form-control input-md" required="">-->
                        <!--                    </div>-->
                        <!--                </div>-->
                                        <!-- Text input-->
                        <!--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <label class=" control-label sr-only" for="phone">Phone</label>-->
                        <!--                        <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" required="">-->
                        <!--                    </div>-->
                        <!--                </div>-->
                                        <!-- Text input-->
                        <!--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <label class="control-label sr-only" for="weddingdate">Wedding Date</label>-->
                        <!--                        <input id="weddingdate" name="weddingdate" type="text" placeholder="Wedding Date" class="form-control input-md" required="">-->
                        <!--                        <div class="venue-form-calendar"><i class="far fa-calendar-alt"></i></div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                                        <!-- Textarea -->
                        <!--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <label class="control-label sr-only" for="comments">Comment</label>-->
                        <!--                        <textarea class="form-control" id="comments" name="comments" rows="5" placeholder="Write Comment"></textarea>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <button type="submit" class="btn btn-default btn-block">Submit Quote</button>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </form>-->
                        <!--    </div>-->
                        <!--</div>-->
                        

                        <!-- social-media -->

                        <!-- <div class="mb30">
                            <h4 class="widget-title">Share this </h4>
                            <div class="social-icons">
                                <a href="#" class="icon-square-outline facebook-outline"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="icon-square-outline twitter-outline"><i class="fab fa-twitter"></i> </a>
                                <a href="#" class="icon-square-outline googleplus-outline"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="icon-square-outline instagram-outline"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="icon-square-outline linkedin-outline"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="icon-square-outline pinterest-outline"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div> -->

                        <!-- /.social-media -->
                    </div>
                </div>
            </div>
            <!-- /.list-sidebar -->
        </div>
    </div>

    <!-- vendor-thumbnail section -->
    <!-- <div class="space-small">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h2>Similar Vendor</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="vendor-thumbnail">
                       
                        <div class="vendor-img zoomimg">
                          
                            <a href="#"><img src="images/vendor-img-1.jpg" alt="" class="img-fluid"></a>
                            <div class="wishlist-sign"><a href="#" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                        </div>
                       
                        <div class="vendor-content">
                           
                            <h2 class="vendor-title"><a href="#" class="title">Wedding Venue Title Name</a></h2>
                            <p class="vendor-address">Ahmedabad, Gujarat.</p>
                        </div>
                        <div class="vendor-meta">
                            <div class="vendor-meta-item vendor-meta-item-bordered">
                                <span class="vendor-price">
                                    $150
                                </span>
                                <span class="vendor-text">Start From</span></div>
                            <div class="vendor-meta-item vendor-meta-item-bordered">
                                <span class="vendor-guest">
                                    120+
                                </span>
                                <span class="vendor-text">Guest</span>
                            </div>
                            <div class="vendor-meta-item vendor-meta-item-bordered">
                                <span class="rating-star">
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rated"></i>
                                    <i class="fa fa-star rate-mute"></i> 
                                    </span>
                                <span class="rating-count vendor-text">(20)</span></div>
                        </div>
                       
                    </div>                   
                </div>
            </div>
        </div>
    </div> -->
    <!-- /.vendor-thumbnail section -->
    <br/> <br/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="https://pneck.in/front_theme/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://pneck.in/front_theme/js/bootstrap.min.js"></script>
   
    <script src="https://pneck.in/front_theme/js/jquery.nice-select.min.js"></script>
    <script src="https://pneck.in/front_theme/js/fastclick.js"></script>
    <script src="https://pneck.in/front_theme/js/owl.carousel.min.js"></script>
    <script src="https://pneck.in/front_theme/js/custom-script.js"></script>
    <!-- popup gallery -->
    <script src="https://pneck.in/front_theme/js/jquery.magnific-popup.min.js"></script>
    <script src="https://pneck.in/front_theme/js/jquery-ui.js"></script>
   
   <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCa6F4F-g-v5PbK1hBmXg_bZOyRKOaBvpQ" 
          type="text/javascript"></script> 

          <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->

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

   // var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
      //  icon: image
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

    </script>

    
    
    <script>
    $(function() {

        $("#rateYo1, #rateYo2, #rateYo3, #rateYo4, #rateYo5 ").rateYo({
            rating: 3.6
        });

    });
    </script>
    

    <?php $__env->stopSection(); ?>
    
<?php echo $__env->make('front.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/front/details.blade.php ENDPATH**/ ?>