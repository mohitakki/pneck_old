<?php $__env->startSection('content'); ?>  
    <!-- page-header -->
     <div class="page-header" style="background-image: url('front_theme/images/contact_us.jpg');">
        <div class="container">
            <div class="row">
                <!-- page caption -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="page-caption">
                        <!--<h1 class="page-title">Contact us</h1>-->
                    </div>
                </div>
                <!-- /.page caption -->
            </div>
        </div>
        <!-- page caption -->
        <div class="page-breadcrumb">
            <div class="container">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Contact us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- page breadcrumb -->
    </div>
    <!-- /.page-header -->
    <!-- contact-form -->
    <div class="content">
        <div class="container">
            <div class="row">

                <!-- Flash Messages Start -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
            
            <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php endif; ?>


                    <?php if($message = Session::get('error')): ?>
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php endif; ?>
            </div>
            <!-- Flash Message End -->

                <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 mb60">

                    <!-- contact-section-title -->
                    <div class="text-center">
                        <p class="lead">You can contact about your complaint and suggestion, we will try to resolve your every complaint and every one of your feedback is important for company because we realize your needs
                        </p>
                    </div>
                    <!-- /.contact-section-title -->
                </div>

                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
                     <form action="<?php echo e(route('contactus')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <div class="contact-form">
                            <div class="row">
                              
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input id="name" type="text" name="name" placeholder="Full Name" class="form-control" required>
                                    </div>
                                </div>
                                
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="email"></label>
                                        <input id="email" required type="email" name="email" placeholder="Email" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="phone"></label>
                                        <input id="phone" type="number" name="phone" placeholder="Phone" class="form-control" required>
                                    </div>
                                </div>
                                <!-- select -->
                               <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <select class="wide mb20" name="selectvendor">
                                            <option value="Vendor Purpose">Vendor Purpose</option>
                                            <option value="Couple">Couple</option>
                                            <option value="Pricing">Pricing</option>
                                            <option value="Vendor">Vendor</option>
                                            <option value="Advertise with us">Advertise with us</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="message"></label>
                                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Messages"></textarea>
                                    </div>
                                </div>
                                <!--button -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button type="submit" name="singlebutton" class="btn btn-default">submit</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.form -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.contact-form -->

   <!--  <div id="map"></div> -->
    
    <div class="space-medium bg-white">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="contact-block">
                        <div class="contact-icon"><i class="far fa-user-circle"></i></div>
                        <div class="contact-content">
                            <h3>Customer Support</h3>
                            <p>Call our 24-hour helpline.</p>
                            <p><strong>Phone number:</strong><span class="text-default"><i class="fas fa-fw fa-phone-volume text-default pr-3 pt-1"></i>+91-7500066331</span>
                                <br> <strong>Email:</strong><span class="text-default">callpneck@gmail.com</span></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="contact-block">
                        <div class="contact-icon"><i class="fa fa-map-marker-alt"></i></div>
                        <div class="contact-content">
                            <h3>Our Address</h3>
                            <p>Our offices are located in the many cities 
                            <p><strong>Address:</strong>
                            102,Kiratpur Bijnor,<br/> Uttar Pradesh,India
                            </p>
                        </div>
                    </div>
                </div>
               
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="contact-block">
                        <div class="contact-icon"><i class="far fa-envelope"></i></div>
                        <div class="contact-content">
                            <h3>Other Enquiries</h3>
                            <p>Please contact us at the email below for all other inquiries.</p>
                            <p><strong>Email:</strong> <span class="text-default">callpneck@gmail.com</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.contact-block -->
            </div>
        </div>
    </div>
    <!-- /.contact-block-section -->
   
    <script>
    function initMap() {
        var uluru = {
            lat: 23.0732195,
            lng: 72.5646902
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: 'images/map-pin.png'
        });
    }
    </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/front/contact_us.blade.php ENDPATH**/ ?>