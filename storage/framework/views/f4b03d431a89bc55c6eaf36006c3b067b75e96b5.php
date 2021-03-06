<?php $__env->startSection('content'); ?>

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Backend Data List</h3>-->
           <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Driver</li>
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
                  <h4 class="card-title">Driver Management</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="<?php echo e(route('admin.driver-create')); ?>"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                         <th style="display: none"></th>
                         <th style="text-align: center;"> S No </th>
                         <th style="text-align: center;"> Name </th>
                         <th style="text-align: center;"> Email </th>
                         <th style="text-align: center;"> Vehicle-Type </th>
                         <th style="text-align: center;" colspan="4"> Ride Requests </th>
                         <th style="text-align: center;" colspan="3"> Earnings </th>
                          <th style="text-align: center;"> Availability </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      <tbody>         
                            
                      <tr style="text-align:center">
                        <td style="display: none"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Total</th>
                        <th>Completed</th>
                        <th>Accepted</th>
                        <th>Cancelled</th>
                        <th>Total</th>
                        <th>Admin</th>
                        <th>Driver</th>
                        <td></td>
                        <td></td>
                      </tr>

                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                      <tr style="text-align:center">
                        <td style="display: none"></td>
                      <td><?php echo e($row->id); ?></td>
                      <td><?php echo e($row->first_name); ?> <?php echo e($row->last_name); ?></td>
                        <td><?php echo e($row->email); ?></td>
                        <td><?php echo e($row->service); ?></td>
                        <td>1</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>
                        <a href="#" data-url="#" class=" btn btn-primary btn-sm">Yes </a>
                        </td>
                        <td>
                        <a href="#" data-url="#" class=" btn btn-success btn-sm">Approved </a>
                        </td>
                          
                        <td>
                          <a href="<?php echo e(route('admin.driver-edit', $row->id)); ?>">
                            <i class="la la-pencil"></i>
                          </a>
                            <a href="#" data-url="<?php echo e(route('admin.driver-delete', $row->id)); ?>" class="delete"> 
                            <i class="la la-trash"></i>
                          </a>
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/driver_list.blade.php ENDPATH**/ ?>