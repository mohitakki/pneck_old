<?php $__env->startSection('content'); ?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Rental Management Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Rental Management</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        
      <div class="content-body">
        <!-- Form actions layout section start -->
        <section id="form-action-layouts">
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                 <!--  <h4 class="card-title" id="from-actions-top-left">Category Details</h4> -->
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                    <!--   <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                     <!--  <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                    </ul>
                  </div>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">

                 <?php if(!empty($data)): ?>
                 <form action="<?php echo e(route('admin.rental-update')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>      
                  
                  <input type="hidden" value="<?php echo e($data->id); ?>" name="id" >
                   
                    <div class="form-body">
                      <h4 class="form-section"><i class="ft-user"></i>Edit Rental Info</h4>
                      <div class="row">
                      

                        <div class="form-group col-md-6 mb-2">
                          <label for="projectinput2">Number Hours</label>

                        <input type="text"  name="number_hours" class="form-control" placeholder="Hourly Package"  required autocomplete="off" value="<?php echo e($data->number_hours); ?>"/>
                        </div>


                        <div class="form-group col-md-6 mb-2">                           
                            <label for="projectinput3">Price</label>                         
                            <input type="text" name="price" class="form-control" value="<?php echo e($data->price); ?>" placeholder="Price" required autocomplete="off" />
                        </div>


                        <div class="form-group col-md-6 mb-2">                           
                            <label for="projectinput3">Disance</label>                         
                            <input type="text" name="distance" class="form-control" value="<?php echo e($data->distance); ?>" placeholder="Disance"  required autocomplete="off" />
                        </div>

                        <div class="form-group col-md-6 mb-2">
                          <label for="projectinput3">Choose Vehicle Types</label>
                          
                          <select name="vehicle_type" class="form-control"  required autocomplete="off">
                          <option><?php echo e($data->vehicle_type); ?></option>
                          <option value="Speed">Speed</option>
                          <option value="MVP">MVP</option>
                          </select>
                        </div>


                      
                      </div>
                      <div class="form-actions right">
                      <button type="button" class="btn btn-danger mr-1" onclick="history.go(-1);"><i class="ft-x"></i> Cancel</button>
                      <button type="submit" name="save" class="btn btn-success" value="Save"><i class="ft-check save-button-check"></i> Save</button>                       
                      </div>
                      </div>
                    </div>  
                  </form>
                 <?php else: ?>
                   
                    <form action="<?php echo e(route('admin.rental-submit')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Rental Info</h4>
                        <div class="row">
                        

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">Number Hours</label>

                             <input type="text"  name="number_hours" class="form-control" placeholder="Hourly Package"  required autocomplete="off" value=""/>
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Price</label>                         
                              <input type="text" name="price" class="form-control" placeholder="Price" required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Disance</label>                         
                              <input type="text" name="distance" class="form-control" placeholder="Disance"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Choose Vehicle Types</label>
                            
                            <select name="vehicle_type" class="form-control"  required autocomplete="off">
                            <option value="Speed">Speed</option>
                            <option value="MVP">MVP</option>
                            </select>
                          </div>


                        
                        </div>
                        <div class="form-actions right">
                        <button type="button" class="btn btn-danger mr-1" onclick="history.go(-1);"><i class="ft-x"></i> Cancel</button>
                        <button type="submit" name="save" class="btn btn-success" value="Save"><i class="ft-check save-button-check"></i> Save</button>                       
                        </div>
                        </div>
                      </div>  
                    </form>


                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </section>
      </div>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/rental-add.blade.php ENDPATH**/ ?>