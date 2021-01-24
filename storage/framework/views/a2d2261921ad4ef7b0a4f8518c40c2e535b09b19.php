<?php $__env->startSection('content'); ?>

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Pneck Customers</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Pneck User (Customers) </li>
              </ol>
            </div>
          </div>
        </div>
      <div class="content-body">
        
        <!-- Column selectors table -->
        <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Pneck Customers List</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                     <!-- <li><a href="<?php echo e(route('admin.user-create')); ?>"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a> -->
                      </li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                      	<th style="display: none"></th>
                        <th style="text-align: center;"> Photo </th>
                         <th style="text-align: center;"> Full Name </th>
                         <th style="text-align: center;"> Email Id </th>
                         <th style="text-align: center;"> Mobile </th>
                         <th style="text-align: center;"> Updated Date </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      <?php
                      $i=1;
                      ?>
                      <tbody>
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr style="text-align:center">
                      	<td style="display: none"></td>
                          <td><?php if($user->profile_image != ''): ?>
                <img class="brand-logo" alt="modern admin logo" style="border-radius:35px;" height="50px;" width="50px;" src="<?php echo e($user->profile_image); ?>">
                 <?php else: ?>
              <img src="<?php echo e(url('/admin_theme/app-assets/images/logo/logo.png')); ?>" id="blahimage" alt="logo" style="background-color: linen;">
                            <?php endif; ?></td>
                        <td><a href="<?php echo e(route('admin.pneckuser-edit',$user->id)); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a></td>
                        <td><?php echo e($user->email); ?> </td>
                        <td><?php echo e($user->mobile); ?> </td>
                        
                        <td><?php if($user->updated_at != ''): ?> <?php echo e(date('d M, Y (h:i A)', strtotime($user->updated_at))); ?>

                            <?php else: ?>
                            <?php echo e(date('y-m-d h:i', strtotime($user->created_at))); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php if(($user->status == '0') && ($user->id != '1')): ?>
                          <a href="#" data-url="<?php echo e(route('admin.pneckuser-check',$user->id)); ?>" class=" btn btn-danger check"> Inactive </a> 
                          <?php elseif(($user->status == '1') && ($user->id != '1')): ?>
                          <a href="#" data-url="<?php echo e(route('admin.pneckuser-uncheck',$user->id)); ?>" class="btn btn-success uncheck">
                          Active
                          </a>
                          <?php endif; ?>
                          </td>
                        <td>
                          <a href="<?php echo e(route('admin.pneckuser-edit',$user->id)); ?>">
                            <i class="la la-pencil"></i>
                          </a>
                        <!--  <a>
                            <?php if($user->id != '1'): ?>
                          <a href="#" data-url="<?php echo e(route('admin.user-delete',$user->id)); ?>" class="delete">
                            <i class="la la-trash"></i>
                          </a>
                            <?php endif; ?> -->
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>

                 </table>
                </div>
              </div> 
            </div>
          </div>
         </div>
        </div>
      </section>
    </div>
<!--/ Column selectors table -->
<?php $__env->startSection('js'); ?>
<?php echo $__env->make('admin.includes.popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pneck_backend\resources\views/admin/pneckuserlists.blade.php ENDPATH**/ ?>