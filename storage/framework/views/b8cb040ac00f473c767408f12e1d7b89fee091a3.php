<?php $__env->startSection('content'); ?>

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Backend Data List</h3>-->
           <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Vehicle Types List</li>
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
                  <h4 class="card-title">Vehicle Types List</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="<?php echo e(route('admin.add-vehicle-type')); ?>"><button type="button" class="btn btn-info mr-1 add-button">ADD Vehicle Type</button></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                         <th style="text-align: center;"> ID </th>
                         <th style="text-align: center;">  Vehicle Type </th>
						 <th style="text-align: center;">  Vehicle Image Url </th>
						 <th style="text-align: center;">  Edit/Delete </th>
                       </thead>
                      <tbody>
                      <?php if(!empty($vehicleType)): ?>
						 <?php $i = 1 ; ?>
						<?php $__currentLoopData = $vehicleType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  <?php $valueId = $value['id']; ?>
						  <tr style="text-align:center">
						    <td><?php echo e($i); ?></td>
							<td><?php echo e($value['vehicle_type']); ?></td>
							<td><?php echo e($value['vehicle_image']); ?></td>
							<td>
							  <a href="<?php echo e(route('admin.editVehicleType', ['id' => $valueId])); ?>"><i class="la la-pencil"></i></a>
							  <a href="<?php echo e(route('admin.deleteVehicleType', ['id' => $valueId])); ?>" data-url="<?php echo e(route('admin.deleteVehicleType', ['id' => $valueId])); ?>" class="delete"> <i class="la la-trash"></i></a>
							</td>
						  </tr>
						  <?php $i++; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  <?php endif; ?>
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pneck_backend\resources\views/admin/vehicle-type-list.blade.php ENDPATH**/ ?>