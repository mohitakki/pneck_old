<?php $__env->startSection('content'); ?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Vehicle Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Vehicle Data</a>
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

                    <form action="<?php echo e(route('admin.updateVehicleType')); ?>" method="post" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>         
                       
                        <div class="form-body">
                          <h4 class="form-section"><i class="ft-user"></i>Vehicle Info</h4>
                          <div class="row">
                          
                          <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
  
                            <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2"> Vehicle Type</label>
  
                            <input type="text" value="<?php echo e($data->vehicle_type); ?>" name="vehicle_type" class="form-control" placeholder=" Vehicle Type"  required autocomplete="off"/>
                            </div>
  
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Number of Seats</label>                         
                                <input type="text" value="<?php echo e($data->no_of_seats); ?>" name="no_of_seats" class="form-control" placeholder="Number of Seats"  required autocomplete="off" />
                            </div>
  
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Base Fare</label>                         
                                <input type="text" value="<?php echo e($data->base_fare); ?>" name="base_fare" class="form-control" placeholder="Base Fare"  required autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Minimum fare</label>                         
                                <input type="text" value="<?php echo e($data->mini_fare); ?>"  name="mini_fare" class="form-control" placeholder="Minimum fare"  required autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Booking Fee</label>                         
                                <input type="text" value="<?php echo e($data->booking_fee); ?>" name="booking_fee" class="form-control" placeholder="Booking Fee" required autocomplete="off" />
                            </div>
  
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Tax Percentage</label>                         
                                <input type="text" value="<?php echo e($data->tax_percentage); ?>" name="tax_percentage" class="form-control" placeholder="Tax Percentage" required autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Price per minute</label>                         
                                <input type="text" value="<?php echo e($data->price_minute); ?>" name="price_minute" class="form-control" placeholder="Price per minute" required autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Price per Mile / kms</label>                         
                                <input type="text" value="<?php echo e($data->price_mile); ?>" name="price_mile" class="form-control" placeholder="Price per Mile / kms" required autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Mile-or-Kms</label>
                              
                              <select name="mile_kms" class="form-control"  autocomplete="off">
                              <option value="<?php echo e($data->mile_kms); ?>"><?php echo e($data->mile_kms); ?></option>
                              <option value="mile">Mile</option>
                              <option value="kms">Kms</option>
                              </select>
                            </div>
  
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Picture Image</label>                         
                                <input type="file" name="picture" class="form-control" autocomplete="off" />
                                <img src="<?php echo e(url('admin_logos/'.$data->picture)); ?>" name="picture" class="rounded-circle img-border height-100"  alt="Card image">
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

                    <form action="<?php echo e(route('admin.submitVehicleType')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Vehicle Info</h4>
                        <div class="row">
                        

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2"> Vehicle Type</label>

                             <input type="text" name="vehicle_type" class="form-control" placeholder=" Vehicle Type"  required autocomplete="off"/>
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Number of Seats</label>                         
                              <input type="text" name="no_of_seats" class="form-control" placeholder="Number of Seats"  required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Base Fare</label>                         
                              <input type="text" name="base_fare" class="form-control" placeholder="Base Fare"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Minimum fare</label>                         
                              <input type="text" name="mini_fare" class="form-control" placeholder="Minimum fare"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Booking Fee</label>                         
                              <input type="text" name="booking_fee" class="form-control" placeholder="Booking Fee" required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Tax Percentage</label>                         
                              <input type="text" name="tax_percentage" class="form-control" placeholder="Tax Percentage" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Price per minute</label>                         
                              <input type="text" name="price_minute" class="form-control" placeholder="Price per minute" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Price per Mile / kms</label>                         
                              <input type="text" name="price_mile" class="form-control" placeholder="Price per Mile / kms" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Mile-or-Kms</label>
                            
                            <select name="mile_kms" class="form-control"  required autocomplete="off">
                            <option value="mile">Mile</option>
                            <option value="kms">Kms</option>
                            </select>
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Picture Image</label>                         
                              <input type="file" name="picture" class="form-control" required autocomplete="off" />
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/vehicle-add.blade.php ENDPATH**/ ?>