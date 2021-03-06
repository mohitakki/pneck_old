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
                   
                    <form action="<?php echo e(route('admin.backend-data-submit')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Vehicle Info</h4>
                        <div class="row">
                        

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2"> Vehicle Type</label>

                             <input type="text" id="Vehicle Type" name="Vehicle Type" class="form-control" placeholder=" Vehicle Type"  required autocomplete="off" value=""/>
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Number of Seats</label>                         
                              <input type="text" id="Seats" name="Seats" class="form-control" placeholder="Number of Seats"  required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Base Fare</label>                         
                              <input type="text" id="Base Fare" name="Base Fare" class="form-control" placeholder="Base Fare"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Minimum fare</label>                         
                              <input type="text" id="Minimum fare" name="Minimum fare" class="form-control" placeholder="Minimum fare"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Booking Fee</label>                         
                              <input type="text" id="Booking Fee" name="Booking Fee" class="form-control" placeholder="Booking Fee" required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Tax Percentage</label>                         
                              <input type="text" id="Tax Percentage" name="Tax Percentage" class="form-control" placeholder="Tax Percentage" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Price per minute</label>                         
                              <input type="text" id="Price per minute" name="Price per minute" class="form-control" placeholder="Price per minute" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Price per Mile / kms</label>                         
                              <input type="text" id="Price per Mile / kms" name="Price per Mile / kms" class="form-control" placeholder="Price per Mile / kms" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Mile-or-Kms</label>
                            
                            <select id="Mile" name="Mile" class="form-control"  required autocomplete="off">
                            <option value="#">Mile</option>
                            <option value="#">Kms</option>
                            </select>
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Picture Image</label>                         
                              <input type="file" id="Image" name="Image" class="form-control" required autocomplete="off" />
                          </div>

                        
                        </div>
                        <div class="form-actions right">
                        <button type="button" class="btn btn-danger mr-1" onclick="history.go(-1);"><i class="ft-x"></i> Cancel</button>
                        <button type="submit" name="save" class="btn btn-success" value="Save"><i class="ft-check save-button-check"></i> Save</button>                       
                        </div>
                        </div>
                      </div>  
                    </form>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </section>
      </div>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pneck_backend\resources\views/admin/vehicle-add.blade.php ENDPATH**/ ?>