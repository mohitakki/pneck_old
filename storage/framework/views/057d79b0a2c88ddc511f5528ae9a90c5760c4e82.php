<!DOCTYPE HTML>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title><?php echo e($Vendor_skils['shop_title']); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content=""/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <link type="text/css" rel="stylesheet" href="<?php echo e(asset('public/asset/css/plugins.css')); ?>">
        <link type="text/css" rel="stylesheet" href="<?php echo e(asset('public/asset/css/style.css')); ?>">
        <link type="text/css" rel="stylesheet" href="<?php echo e(asset('public/asset/css/main.css')); ?>">
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
            <div class="pulse"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
            <header class="main-header dark-header fs-header sticky">
                <div class="header-inner">
                    <div class="logo-holder">
                        <a href="#"><img src="<?php echo e(url('/front_theme/images/logo-white.png')); ?>" alt=""></a>
                    </div>
                   
                    <a href="https://play.google.com/store/apps/details?id=com.callpneck" class="add-list" style="color:black">Get App Now </a>
                    <div class="nav-button-wrap color-bg">
                        <div class="nav-button">
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                    <!-- nav-button-wrap end-->
                    <!--  navigation -->
                    <div class="nav-holder main-menu">
                        <nav>
                            <ul>
                                <li>
                                    <a href="<?php echo e(url('/')); ?>" style="font-size: 16px; color: #000;">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/about')); ?>" style="font-size: 16px; color: #000;">About Us</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/vendors')); ?>" style="font-size: 16px; color: #000;">Vendors</a>
                                </li>
								<li>
                                    <a href="<?php echo e(url('/contact')); ?>" style="font-size: 16px; color: #000;">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- navigation  end -->
                </div>
            </header>
            <!--  header end -->
            <!-- wrapper -->
            <div id="wrapper">
                <!--  content-->
                <div class="content">
                    <!--  carousel-->
                    <div class="list-single-carousel-wrap fl-wrap" id="sec1">
                        <div class="fw-carousel fl-wrap full-height lightgallery">
                            <!-- slick-slide-item -->
                            <?php
                            $photo = App\vendor_service_images::where('vendor_id',$Vendor_skils['vendor_id'])->get();
                            ?>  
                            <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="slick-slide-item">
                                <div class="box-item">
                                    <img src="<?php echo e($item->service_image); ?>" alt="">
                                    <a href="<?php echo e($item->service_image); ?>" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                        <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                    </div>
                    <!--  section   -->
                    <section class="gray-section no-top-padding pt-0">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- list-single-main-wrapper -->
                                    <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                        <div class="costrs">
											<div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Listings</a><span>
                                                <?php
                                                $cate = App\Vendor_subcat::where('id',$Vendor_skils['subcat_id'])->first();
                                                echo $cate['title'];
                                                ?>      
                                            </span></div>
											<div class="contsr-trs">
												<h1> <?php echo e($Vendor_skils['shop_title']); ?> </h1>
												<p> <?php echo e($Vendor_skils['address1']); ?> </p>
												<div class="box-strs">
													<div class="listing-rating card-popup-rainingvis" data-starrating2="5">
														<span>
                                                            <?php
                                                        $rat = App\Vendor_rating::where('vendor_id',$Vendor_skils['vendor_id'])->first();
                                                        if (!empty($rat)) {
                                                            echo $rat['rating'];
                                                        } else {
                                                            echo 0;
                                                        }
                                                    
                                                        ?>    
                                                        </span>
                                                    </div>
                                                    <?php
                                                    $vendor = App\Vendor::where('id',$Vendor_skils['vendor_id'])->first();
                                                    ?>    
													<span class="icon-strf"> <i class="fa fa-phone"></i> <?php echo e($vendor['mobile']); ?> </span>
                                                    <span class="icon-strf"> <i class="fa fa-twitter"></i> <?php echo e($vendor['email']); ?> </span>
                                                    <?php if(!empty($Vendor_skils['website'])): ?>
                                                    <span class="icon-strf"> <i class="fa fa-link"></i> <?php echo e($Vendor_skils['website']); ?> </span>
                                                    <?php else: ?>
                                                    <span class="icon-strf"> <i class="fa fa-link"></i> www.pneck.in </span>
                                                    <?php endif; ?>
												</div>	
											</div>
										</div>
                                        <div class="sctos-tra">
											<a href="#" class="rate-bst"> <i class="fa fa-star"></i> Write a review </a> 
											<a href="#" class="rate-bst modal-open"> <i class="fa fa-heart"></i> Add to favorites </a> 
											<div class="icon-stcr">	
												<a href="javascript:void(0)" class="rate-bst shoe-strsr"> <i class="fa fa-share"></i> Share </a>
												<ul class="show-popsd" style="display:none">
													<li> <a href="#"> <i class="fa fa-twitter"></i> Twitter </a> </li>
													<li> <a href="#"> <i class="fa fa-facebook"></i> Facebook </a> </li>
												</ul>
											</div>
										</div>
                                        <div class="list-single-main-item fl-wrap">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>About Us </h3>
                                            </div>
                                            <p><?php echo e($Vendor_skils['description']); ?></p>
                                            
                                            
                                        </div>
                                        <!-- list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="sec4">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>All Reviews -  <span> 3 </span></h3>
                                            </div>
                                            <div class="reviews-comments-wrap">
                                                <!-- reviews-comments-item -->
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="<?php echo e(asset('asset/images/avatar/1.jpg ')); ?>" alt="">
                                                    </div>
                                                    <div class="reviews-comments-item-text">
                                                        <h4><a href="#">Jessie Manrty</a></h4>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                                        <div class="clearfix"></div>
                                                        <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                                                        <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>27 May 2020</span>
                                                    </div>
                                                </div>
                                                <!--reviews-comments-item end-->

                                            </div>
                                        </div>
                                        <!-- list-single-main-item end -->
                                        <!-- list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="sec5">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Rate and Write a Review</h3>
                                            </div>
                                            <!-- Add Review Box -->
                                            <div id="add-review" class="add-review-box">
                                                <div class="leave-rating-wrap">
                                                    <span class="leave-rating-title">Your rating  for this listing : </span>
                                                    <div class="leave-rating">
                                                        <input type="radio" name="rating" id="rating-1" value="1"/>
                                                        <label for="rating-1" class="fa fa-star-o"></label>
                                                        <input type="radio" name="rating" id="rating-2" value="2"/>
                                                        <label for="rating-2" class="fa fa-star-o"></label>
                                                        <input type="radio" name="rating" id="rating-3" value="3"/>
                                                        <label for="rating-3" class="fa fa-star-o"></label>
                                                        <input type="radio" name="rating" id="rating-4" value="4"/>
                                                        <label for="rating-4" class="fa fa-star-o"></label>
                                                        <input type="radio" name="rating" id="rating-5" value="5"/>
                                                        <label for="rating-5" class="fa fa-star-o"></label>
                                                    </div>
                                                </div>
                                                <!-- Review Comment -->
                                                <form   class="add-comment custom-form">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label><i class="fa fa-file-text-o"></i></label>
                                                                <input type="text" placeholder="Title of your review" value=""/>
                                                            </div>
															<div class="col-md-6">
                                                                <label><i class="fa fa-user-o"></i></label>
                                                                <input type="text" placeholder="Your Name *" value=""/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label><i class="fa fa-envelope-o"></i>  </label>
                                                                <input type="text" placeholder="Email Address*" value=""/>
                                                            </div>
                                                        </div>
                                                        <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                                    </fieldset>
                                                    <button class="btn  big-btn  color-bg flat-btn">Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                            <!-- Add Review Box / End -->
                                        </div>
                                        <!-- list-single-main-item end -->
                                    </div>
                                </div>
                                <!--box-widget-wrap -->
                                <div class="col-md-4">
                                    <div class="box-widget-wrap pl-15">
									
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap mt-40">
                                            
                                            <div class="box-widget">
                                                <div class="box-widget-content">
												<div class="map-container">
                                                    <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location"></div>
                                                </div>
                                              
                                                    <div class="list-author-widget-contacts list-item-widget-contacts">
                                                        <ul>
                                                            <li><span><i class="fa fa-map-marker"></i> Address :</span> <a href="#"><?php echo e(Str::limit($Vendor_skils['address1'], 18)); ?></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="list-widget-social">
                                                        <ul>
                                                            <li class="rictr"><a href="#" target="_blank" ><i class="fa fa-thumb-tack"></i> Get Direction</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                          <div class="box-widget opening-hours">
                                                <div class="box-widget-content">
                                                    <ul class="iclyt">
                                                        <?php
                                                        $cate = App\Vendor_subcat::where('id',$Vendor_skils['subcat_id'])->first();
                                                        ?>  
														<li> <a href="#"> <span> <img src="<?php echo e(asset('public/asset/images/icon2.png')); ?>"></span> <?php echo e($cate['title']); ?></a> </li>
													</ul>
                                                    <ul>
                                                        <?php
                                                            $str = $Vendor_skils['vendor_data'];
                                                            foreach (explode(",",$str) as $key => $value) {
                                                           
                                                        ?>
                                                        <li><span class="opening-hours-day"> <?php echo $value ?> </span><span class="opening-hours-time"><?php echo e($Vendor_skils['opening_time']); ?> - <?php echo e($Vendor_skils['closing_time']); ?></span></li>
                                                       
                                                   <?php } ?>
                                                        </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget-item-header">
                                                <h3>Photo gallery <a href="#" class="right-sly">All Photos (4) </a></h3>
                                            </div>
                                            <div class="box-widget widget-posts">
                                                <div class="box-widget-content">
                                                <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery imsgr-str">
                                                <!-- 1 -->
                                                <?php
                                                $photo = App\vendor_service_images::where('vendor_id',$Vendor_skils['vendor_id'])->get();
                                                ?>  
                                                <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="gallery-item">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="<?php echo e($item->service_image); ?>"   alt="">
                                                            <a href="<?php echo e($item->service_image); ?>" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <!-- 1 end -->                                               
												</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->
										<div class="conts-trs">
											<p> Is this your business? <a href="#"><i class="fa fa-flag"></i> Claim it now. </a></p>
											<span> Make sure your information are up to date. </span>
										</div>
                                    </div>
                                </div>
                                <!--box-widget-wrap end -->
                            </div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!--  content  end-->
            </div>
            <!-- wrapper end -->
           
            <!--register form -->
            <div class="main-register-wrap modal">
                <div class="main-overlay"></div>
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg"><i class="fa fa-times"></i></div>
                        <div class="soc-log fl-wrap">
                            <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Connect with Facebook</a>
                            <a href="#" class="twitter-log"><i class="fa fa-google"></i> Connect with Google</a>
                        
							<div class="log-separator fl-wrap"><span>or</span></div>
							<div class="custom-form">
								<form method="post"  name="registerform">
									<label>Username or Email Address * </label>
									<input name="email" type="text"   onClick="this.select()" value="">
									<label >Password * </label>
									<input name="password" type="password"   onClick="this.select()" value="" >
									<button type="submit"  class="log-submit-btn"><span>Log In</span></button>
									<div class="clearfix"></div>
									<div class="filter-tags">
										<input id="check-a" type="checkbox" name="check">
										<label for="check-a">Remember me</label>
									</div>
								</form>
								<div class="lost_password">
									<a href="#">Lost Your Password?</a>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <!--register form end -->
            <a class="to-top"><i class="fa fa-angle-up"></i></a>
         <div class="clearfix"></div>
		<footer class="main-footer dark-footer  footr-maits">
		
			<div class="copyts">
				<div class="top-str">
					<p>Copyright © 2019 Company Inc</p>	<ul id="menu-footer-menu" class="footer-menus">
					</ul>	
				</div>
				<div class="theme-info">
					<a href="https://dapperdeveloper.in">Proudly powered by DapperDeveloper</a>

				</div>
			</div>
		</footer>   
        </div>
        <!-- Main end -->
		
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="<?php echo e(asset('public/asset/js/jquery.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('public/asset/js/plugins.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('public/asset/js/scripts.js')); ?>"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7rRpQJyQJZYzxrvStRGFkbB0MxXWGrO0&amp;libraries=places&amp;callback=initAutocomplete"></script>
        <script type="text/javascript" src="<?php echo e(asset('public/asset/js/map_infobox.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('public/asset/js/markerclusterer.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('public/asset/js/maps.js')); ?>"></script>
		<script>
			$(".shoe-strsr").click(function(){
			  $(".show-popsd").slideToggle(400);
			});
			
		</script>
		
    </body>
</html>
<?php /**PATH E:\xampp\htdocs\pneck_backend\resources\views/front/details.blade.php ENDPATH**/ ?>