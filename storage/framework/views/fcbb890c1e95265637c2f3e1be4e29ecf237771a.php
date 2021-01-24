
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item mr-auto">
              <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>">
                <?php if($general_setting->logo != ''): ?>
                <img class="brand-logo" alt="modern admin logo" src="<?php echo e(url('/public/admin_logos/'.$general_setting->logo)); ?>" width="20px" height="50">
                 <?php else: ?>
              <img src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-19.png')); ?>" id="blahimage" alt="logo" style="background-color: linen;">
                            <?php endif; ?>
            <h3 class="brand-text"><?php echo e($general_setting->header); ?></h3></a></li>
           <!-- <a href="<?php echo e(url('/admin/logout')); ?>"><h3 class="brand-text">Logout</h3></a> -->
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">         
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1">Hello,<span class="user-name text-bold-700"><?php echo e(ucfirst($userdata->first_name)); ?> <?php echo e(ucfirst($userdata->last_name)); ?></span></span><span class="avatar avatar-online"><?php if($userdata->image != ''): ?>
                            <img src="<?php echo e(url('/public/admin_image/'.$userdata->image)); ?>" id="blahimage" alt="Card image">
                            <?php else: ?>
                            <img src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-19.png')); ?>" id="blahimage" alt="logo" style="background-color: linen;">
                            <?php endif; ?><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo e(route('admin.myprofile')); ?>"><i class="ft-user"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo e(url('/admin/logout')); ?>"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
<?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/includes/header.blade.php ENDPATH**/ ?>