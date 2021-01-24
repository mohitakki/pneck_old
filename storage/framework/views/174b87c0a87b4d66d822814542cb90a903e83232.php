<?php $__env->startSection('content'); ?>

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Backend Data List</h3>-->
           <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">General Settings</li>
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
                  <h4 class="card-title">General Settings</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="<?php echo e(route('admin.backend-data-create')); ?>"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                         <th style="display: none"></th>
                         <th style="text-align: center;"> Header </th>
                         <th style="text-align: center;"> Footer </th>
                         <th style="text-align: center;"> Site Tile </th>
                         <th style="text-align: center;"> Copyright </th>
                         <th style="text-align: center;"> Logo </th>
                         <th style="text-align: center;"> User Name </th>
                          <th style="text-align: center;"> Updated Date </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      <tbody>
                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr style="text-align:center">
                        <td style="display: none"></td>
                        <td><a href="<?php echo e(route('admin.backend-data-edit',$row->id)); ?>"><?php echo e(ucfirst($row->header)); ?></a></td>
                        <td><?php echo e($row->footer); ?></td>
                        <td><?php echo e($row->site_title); ?></td>
                        <td><?php echo e($row->copyright); ?></td>
                        <td><img src="<?php echo e(url('/admin_logos/'.$row->logo)); ?>" style="width: 80px;"></td>
                        <td>
                            <?php
                          if(isset($row->username->first_name) && !empty($row->username->first_name)){
                              $first_name = $row->username->first_name;
                            }else{
                            $first_name = '';
                          }
                          if(isset($row->username->last_name) && !empty($row->username->last_name)){
                              $last_name = $row->username->last_name;
                            }else{
                            $last_name = '';
                          }
                      ?>


                          <?php echo e(ucfirst($first_name)); ?> <?php echo e(($last_name)); ?> 
                        </td>
                        <td><?php if($row->updated_at != ''): ?> <?php echo e(date('d M, Y (h:i A)', strtotime($row->updated_at))); ?>

                            <?php else: ?>
                            <?php echo e(date('y-m-d h:i', strtotime($row->created_at))); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php if($row->status == '0'): ?>
                          <a href="#" data-url="<?php echo e(route('admin.backend-data-check',$row->id)); ?>" class=" btn btn-danger check">Inactive </a>
                          <?php elseif($row->status == '1'): ?>
                            <a href="#" class="btn btn-success" style="width:100px;">
                              Active 
                            </a>
                          <?php endif; ?>
                        </td>
                          
                        <td>
                          <a href="<?php echo e(route('admin.backend-data-edit',$row->id)); ?>">
                            <i class="la la-pencil"></i>
                          </a>
                          <?php if($row->status != '1'): ?>
                          <a href="#" data-url="<?php echo e(route('admin.backend-data-delete',$row->id)); ?>" class="delete"> 
                            <i class="la la-trash"></i>
                          </a>
                          <?php endif; ?>
                          
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/backend_datalists.blade.php ENDPATH**/ ?>