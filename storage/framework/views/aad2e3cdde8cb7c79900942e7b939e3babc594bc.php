<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Home - Pneck </title>
    <!-- Bootstrap -->
    <link href="<?php echo e(url('/front_theme/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="<?php echo e(url('/front_theme/fontawesome/css/fontawesome-all.css')); ?>" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="<?php echo e(url('/front_theme/fontello/css/fontello.css')); ?>" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="<?php echo e(url('/front_theme/wedding-icon-font/flaticon.css')); ?>">

    <!-- OwlCarosuel CSS -->
    <link href="<?php echo e(url('/front_theme/css/owl.carousel.css')); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo e(url('/front_theme/css/owl.theme.default.css')); ?>" type="text/css" rel="stylesheet">
    <!-- Favicon icon -->

    <!-- Style CSS -->
   <link href="<?php echo e(url('/front_theme/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('/front_theme/css/style1.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/front_theme/css/dzsparallaxer.css')); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('/front_theme/css/jquery.rateyo.css')); ?>">

     </head>

     <body>
     <!-- header -->
      <!-- header-top -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-sm-6 col-6 d-none d-xl-block d-lg-block d-md-block">
                        <div class="header-text">
                            <p class="wlecome-text"><i class="fas fa-fw fa-phone-volume text-default pr-3 pt-1"></i>+91-7500066331</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-sm-12 col-12">
                        <div class="header-text text-right">
                           <!-- <p>Are You <a href="<?php echo e(route('register')); ?>" class="text-white">Register</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.header-top -->
    <div class="header-transparent">

        <!-- navigation start -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <nav class="navbar navbar-expand-lg navbar-transparent">
                        <a class="navbar-brand" href="<?php echo e(url('/')); ?>"> <img src="<?php echo e(url('/front_theme/images/logo-white.png')); ?>" alt=""></a>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-transparent" aria-controls="navbar-transparent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar top-bar mt-0"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar-transparent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(url('/')); ?>">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(url('/about')); ?>">
                                        About Us
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(url('/vendors')); ?>">
                                        Vendors
                                    </a>
                                </li>
                               <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Blog
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(url('/contact')); ?>">
                                        Contact Us
                                    </a>
                                </li>

                            </ul>
                          <a href="https://play.google.com/store/apps/details?id=com.callpneck" class="btn btn-default btn-sm">Get App Now</a>
                          &nbsp; &nbsp; &nbsp; &nbsp;
                           <!--<a href="https://product.onlinesoftservices.com/plan/shop/pneck.in" class="btn btn-default btn-sm">Create Shop Now</a>-->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- navigation close -->
    </div>
    <!-- /.header -->
    <?php echo $__env->yieldContent('content'); ?>

   <div class="social-media-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-6 col-sm-6 col-12">
                    <h3 class="text-white mb0 mt10">Would you like to connect via social media</h3>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 col-12 text-right">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/pneckteam/" class="icon-square"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/Pneck3?s=01" class="icon-square"><i class="fab fa-twitter"></i> </a>
                        <a href="https://www.linkedin.com/in/pneck-in-62b88b1a3" class="icon-square"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.youtube.com/channel/UCeIXgNHI5ttPtsaVkCSQ4DA" class="icon-square"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.social-media-section -->
    <!-- footer-section -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <!-- footer-widget -->
                    <div class="footer-widget">
                        <a href="#"><img src="<?php echo e(url('/front_theme/images/logo-white.png')); ?>" alt="" class="mb20"></a>
                        <p class="mb10">Pneck Pvt Ltd is established to provide Manpower and Temporary Employee for one time. Pneck’s motive is to provide you better than the best service to you from anywhere and at anytime.it is not only a company,it is a thought to get rid of those problems which we face in our daily busy life about the servant service. To overcome these problems.</p>
                    </div>
                </div>
                <!-- /.footer-widget -->
                <!-- footer-widget -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title">
                            Contact Address
                        </h3>
                        <p class="d-flex"><i class="fas fa-fw fa-map-marker-alt text-default pr-3 pt-1"></i>Call Pneck Service Pvt. Ltd.,
                            <br>102,Kiratpur Bijnor, Uttar Pradesh,India</p>
                        <p class="mb0 d-flex"><i class="fas fa-fw fa-phone-volume text-default pr-3 pt-1"></i>+91-7500066331</p>
                        <p class="mb0 d-flex"><i class="fas fa-fw fa-envelope text-default pr-3 pt-1 "></i>callpneck@gmail.com</p>
                    </div>
                </div>
                <!-- /.footer-widget -->
                <!-- footer-widget -->
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title">
                            About Company
                        </h3>
                        <ul class="listnone">
                            <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                            <li><a href="<?php echo e(url('/about')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(url('/vendors')); ?>">Vendors</a></li>
                            <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                            <li><a href="<?php echo e(url('/termsandconditions')); ?>">Terms & Conditions</a></li>
                             <li><a href="<?php echo e(url('/application')); ?>">Application Form</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.footer-widget -->
                <!-- /.footer-widget -->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-12">
                    <div class="footer-widget newsletter-block">
                        <h3 class="widget-title">
                           Subscribe to newsletter
                        </h3>
                        <form>
                            <div class="form-group">
                                <label for="email" class="sr-only"></label>
                                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter Email Address">
                            </div>
                        </form>
                        <a href="#" class="btn btn-default">Subscribe</a>
                    </div>
                </div>
                <!-- /.footer-widget -->
            </div>
        </div>
    </div>
    <!-- tiny-footer-section -->
    <div class="tiny-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right">
                    <p>© <?php echo e(date('Y')); ?> Pneck. All Rights Reserved By Pneck. Designed By
                    <a href="http://onlinesoftservices.com" target="_blank" class="text-white">OSS</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo e(url('/front_theme/js/jquery.min.js')); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo e(url('/front_theme/js/bootstrap.min.js')); ?>"></script>

    <!-- owl-carousel js -->
    <script src="<?php echo e(url('/front_theme/js/owl.carousel.min.js')); ?>"></script>
    <!-- nice-select js -->
    <script src="<?php echo e(url('/front_theme/js/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(url('/front_theme/js/fastclick.js')); ?>"></script>
    <script src="<?php echo e(url('/front_theme/js/custom-script.js')); ?>"></script>
    <script src="<?php echo e(url('/front_theme/js/dzsparallaxer.js')); ?>"></script>
    <script src="<?php echo e(url('/front_theme/js/return-to-top.js')); ?>"></script>
    <script src="<?php echo e(url('/front_theme/js/jquery.rateyo.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>

    <script>
    //jQuery to collapse the navbar on scroll
    $(window).scroll(function() {
        if ($(".header-transparent").offset().top > 200) {
            $(".fixed-top").addClass("top-nav-collapse");
        } else {
            $(".fixed-top").removeClass("top-nav-collapse");
        }
    });
    </script>
      <script>// for animation
         $(document).ready(function(){
           $('.pp-quote').click(function(){
             $('.pp-quote').removeClass("active");
             $(this).addClass("active");
         });
         });

         $(document).ready(function(){

                // hide-top

                 $('.li-quote-1').click(function(e){
                     e.stopPropagation();
                     $(".show").addClass('hide-top');
                     $(".hide-top").removeClass('show');
                     $('.quote-text-1').addClass('show');
                     $('.quote-text-1').removeClass('hide-bottom');
                 });

                 $('.li-quote-2').click(function(e){
                     e.stopPropagation();
                     $(".show").addClass('hide-top');
                     $(".hide-top").removeClass('show');
                     $('.quote-text-2').addClass('show');
                     $('.quote-text-2').removeClass('hide-bottom');
                 });

                 $('.li-quote-3').click(function(e){
                     e.stopPropagation();
                     $(".show").addClass('hide-top');
                     $(".hide-top").removeClass('show');
                     $('.quote-text-3').addClass('show');
                     $('.quote-text-3').removeClass('hide-bottom');
                 });
                 $('.li-quote-4').click(function(e){
                     e.stopPropagation();
                     $(".show").addClass('hide-top');
                     $(".hide-top").removeClass('show');
                     $('.quote-text-4').addClass('show');
                     $('.quote-text-4').removeClass('hide-bottom');
                 });
                 $('.li-quote-5').click(function(e){
                     e.stopPropagation();
                     $(".show").addClass('hide-top');
                     $(".hide-top").removeClass('show');
                     $('.quote-text-5').addClass('show');
                     $('.quote-text-5').removeClass('hide-bottom');
                 });
                 $('.li-quote-6').click(function(e){
                     e.stopPropagation();
                     $(".show").addClass('hide-top');
                     $(".hide-top").removeClass('show');
                     $('.quote-text-6').addClass('show');
                     $('.quote-text-6').removeClass('hide-bottom');
                 });
                 $('.li-quote-7').click(function(e){
                     e.stopPropagation();
                     $(".show").addClass('hide-top');
                     $(".hide-top").removeClass('show');
                     $('.quote-text-7').addClass('show');
                     $('.quote-text-7').removeClass('hide-bottom');
                 });
                 $('.li-quote-8').click(function(e){
                     e.stopPropagation();
                     $(".show").addClass('hide-top');
                     $(".hide-top").removeClass('show');
                     $('.quote-text-8').addClass('show');
                     $('.quote-text-8').removeClass('hide-bottom');
                 });


         });


         $(document).ready(function(){

                // hide-top

                 $('.li-quote-1').click(function(e){
                     e.stopPropagation();
                     $(".look").addClass('hide-dp-top');
                     $(".hide-dp-top").removeClass('look');
                     $('.dp-name-1').addClass('look');
                     $('.dp-name-1').removeClass('hide-dp-bottom');
                 });

                 $('.li-quote-2').click(function(e){
                     e.stopPropagation();
                     $(".look").addClass('hide-dp-top');
                     $(".hide-dp-top").removeClass('look');
                     $('.dp-name-2').addClass('look');
                     $('.dp-name-2').removeClass('hide-dp-bottom');
                 });

                 $('.li-quote-3').click(function(e){
                     e.stopPropagation();
                     $(".look").addClass('hide-dp-top');
                     $(".hide-dp-top").removeClass('look');
                     $('.dp-name-3').addClass('look');
                     $('.dp-name-3').removeClass('hide-dp-bottom');
                 });
                 $('.li-quote-4').click(function(e){
                     e.stopPropagation();
                     $(".look").addClass('hide-dp-top');
                     $(".hide-dp-top").removeClass('look');
                     $('.dp-name-4').addClass('look');
                     $('.dp-name-4').removeClass('hide-dp-bottom');
                 });

                 $('.li-quote-5').click(function(e){
                     e.stopPropagation();
                     $(".look").addClass('hide-dp-top');
                     $(".hide-dp-top").removeClass('look');
                     $('.dp-name-5').addClass('look');
                     $('.dp-name-5').removeClass('hide-dp-bottom');
                 });

                 $('.li-quote-6').click(function(e){
                     e.stopPropagation();
                     $(".look").addClass('hide-dp-top');
                     $(".hide-dp-top").removeClass('look');
                     $('.dp-name-6').addClass('look');
                     $('.dp-name-6').removeClass('hide-dp-bottom');
                 });
                 $('.li-quote-7').click(function(e){
                     e.stopPropagation();
                     $(".look").addClass('hide-dp-top');
                     $(".hide-dp-top").removeClass('look');
                     $('.dp-name-7').addClass('look');
                     $('.dp-name-7').removeClass('hide-dp-bottom');
                 });
                 $('.li-quote-8').click(function(e){
                     e.stopPropagation();
                     $(".look").addClass('hide-dp-top');
                     $(".hide-dp-top").removeClass('look');
                     $('.dp-name-8').addClass('look');
                     $('.dp-name-8').removeClass('hide-dp-bottom');
                 });


         });
		 
		 window.onload = function() {
		
		  var startPos;
		  var geoOptions = {
			enableHighAccuracy: true
		  }

		  var geoSuccess = function(position) {
			startPos = position;
			var lat = startPos.coords.latitude,
			    longi = startPos.coords.longitude;
			
			    document.cookie = "user_longitude ="+longi;
				document.cookie = "user_latitude ="+lat;
			 
		  };
		  var geoError = function(error) {
			console.log('Error occurred. Error code: ' + error.code);
			// error.code can be:
			//   0: unknown error
			//   1: permission denied
			//   2: position unavailable (error response from location provider)
			//   3: timed out
		  };
		  
		  navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
		};

      </script>
</body>
</html>
<?php /**PATH E:\xampp\htdocs\pneck_backend\resources\views/front/layout/auth.blade.php ENDPATH**/ ?>