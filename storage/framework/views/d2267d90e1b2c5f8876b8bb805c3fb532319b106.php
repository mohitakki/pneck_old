<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
   <?php
  $userdata=Auth::guard('admin')->user();
  $general_setting=DB::table('general_settings')->first();
  ?>
  <head>
    <?php echo $__env->make('admin.includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- BEGIN VENDOR CSS-->
    <?php echo $__env->make('admin.includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('css'); ?>
    <style>
        label{
            font-weight:bold;
        }
    </style>
    
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
            <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </nav>
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
            <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php
    $user=Auth::guard('admin')->user();
    ?>
 <div class="app-content content">
    <div class="content-wrapper" style="background-color: #fff;padding: 1.2rem 2.2rem;">
        <div class="content-header row card-content">
            <div class="content-header-left col-md-6 col-12">
               <span style="float: left;">    Home = Edit Profile </span>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <span style="float: right;"><?php echo e(date('M d, Y', strtotime($user->updated_at))); ?></span>
            </div>
        </div>
    </div>
    <div class="content-wrapper" style="padding: 1.2rem 2.2rem 0.2rem;">
        <div class="content-header row">
              <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="mb-0 d-inline-block" style="font-weight: 500;letter-spacing: 1px;color: #464855;">Admin Profile</h3>
              </div>
        </div>
    </div>
    <form action="<?php echo e(route('admin.user-update')); ?>" method="post" runat="server" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>  
    <div class="content-wrapper" style="padding: 0.2rem 2.2rem;">
        <div class="row match-height">
        <div class="col-xl-3 col-lg-12">
            <div class="card card-shadow" style="align-items: center;display: flex;justify-content: center;">
                <div class="media-left pl-2 pt-2">
                        <a href="#" class="profile-image">
                            <?php if($user->image != ''): ?>
                            <img src="<?php echo e(url('admin_image/'.$user->image)); ?>" id="blah"  class="rounded-circle img-border height-100"  alt="Card image">
                            <?php else: ?>
                            <img src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-19.png')); ?>" alt="logo" class="rounded-circle img-border height-100"  id="blah" style="background-color: linen;">
                            <?php endif; ?>
                        </a>
                </div>
                <div class="media-left pl-2 pt-2">
                    <h4 class="card-title" style="margin-bottom: 1.0rem !important;"><a href="#"><?php echo e(ucfirst($user->first_name)); ?> <?php echo e(ucfirst($user->last_name)); ?></a></h4>
                </div>
                    <!-- h4 class="card-title" style="font-weight: 500;letter-spacing: 1px;color: #464855;"></h4> -->
                        <div class="media-body" style="padding-left: 1.5rem !important;font-weight: 500;letter-spacing: 1px;color: #464855;margin-bottom: 1.0rem !important;">
                            <?php echo e(ucfirst($user->role_detail->role_name)); ?>

                        </div>
                <div class="media-left" style="padding-top: 0.2rem !important;padding-left: 1.5rem !important;margin-bottom: 1.0rem !important;">
                    <label for="updatepic" class="btn btn-primary d-" style="background-color: #00c5dc !important;border-color: #00c5dc !important;padding: .75rem 2rem;border-radius:50px;">Choose Pic</label>
                    <input type="file" id="updatepic" style="display: none" name="image">

                </div>
            </div>
            
        </div>
        <div class="col-xl-9 col-12">
             <div class="card card-shadow" style="height: 418px;">
                    
            <div class="card-content collpase show">
              <div class="card-body">
                            
                 <div class="form-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="projectinput2">First Name</label>
                        </div>
                        <div class="form-group col-md-6">
                             <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                             <input type="hidden" name="url" value="my-profile">
                             <input type="text" id="first_name" name="first_name" class="form-control" required autocomplete="off" value="<?php echo e($user->first_name); ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="projectinput2">Last Name</label>
                        </div>
                        <div class="form-group col-md-6">
                             <input type="text" id="last_name" name="last_name" class="form-control" required autocomplete="off" value="<?php echo e($user->last_name); ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="projectinput2">Email</label>
                        </div>
                        <div class="form-group col-md-6">
                             <input type="text" id="email" name="email" class="form-control" required autocomplete="off" value="<?php echo e($user->email); ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="projectinput2">Contact Number</label>
                        </div>
                        <div class="form-group col-md-6">
                             <input type="text" id="mobile" name="mobile" class="form-control" required autocomplete="off" value="<?php echo e($user->mobile); ?>"/>
                        </div>
                    </div>
                     <div class="form-actions right">
                        <button type="button" class="btn btn-danger mr-1" onclick="history.go(-1);"><i class="ft-x"></i> Cancel</button>
                        <button type="submit" name="save" class="btn btn-success" value="Save"><i class="ft-check save-button-check"></i> Save</button>                        
                     </div>
                </div>
            </div>
          </div>
            </div>
        </div>
    </div>
</div>
</form>
 </div>
    <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.includes.setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->yieldContent('js'); ?>
    <script>
$(document).ready(function(){
function readURL(input){

    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $("#blah").attr('src', e.target.result);
            $("#blahimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#updatepic").change(function(){
    readURL(this);
});
});
</script>

</body>
</html><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/my_profile.blade.php ENDPATH**/ ?>