<?php $__env->startSection('content'); ?>

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Backend Data List</h3>-->
           <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Passenger Management</li>
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
                  <h4 class="card-title">Passenger Management</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="<?php echo e(route('admin.add-passenger')); ?>"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                         <th style="display: none"></th>
                         <th style="text-align: center;"> ID </th>
                         <th style="text-align: center;"> User Name </th>
                         <th style="text-align: center;"> Email </th>
                         <th style="text-align: center;"> Mobile </th>
                          <th style="text-align: center;"> Joined At </th>
                          <th style="text-align: center;"> Is Verified </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $passenger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr style="text-align:center">
                          <td style="display: none"></td>
                          <td><?php echo e(1); ?></td>
                          <td><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></td>
                          <td><?php echo e($item->email); ?></td>
                          <td><?php echo e($item->contact_number); ?></td>
                          <td> <?php echo e($item->created_at); ?></td>
                          <?php if($item->is_verified == 1 ): ?>
                          <td class="text-success"><b>Verified</b></td>
                          <?php else: ?>
                          <td class="text-danger"><b>Not Verified</b></td>
                          <?php endif; ?> 
                          
                          <?php if($item->is_verified == 1 ): ?>
                          <td>
                            <a href="#" data-url="#" class=" btn btn-success btn-sm">Approved </a>
                          </td>
                          <?php else: ?>
                          <td>
                            <a href="#" data-url="#" class=" btn btn-danger btn-sm">Not Approved </a>
                          </td>
                          <?php endif; ?> 
                            
                          <td>
                            <a href=<?php echo e(route('admin.single-passenger',$item->id)); ?>>
                              <i class="la la-pencil"></i>
                            </a>
                          <a  data-url="<?php echo e(route('admin.delete-passenger',$item->id)); ?>'"  class="delete "> 
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/passenger-list.blade.php ENDPATH**/ ?>