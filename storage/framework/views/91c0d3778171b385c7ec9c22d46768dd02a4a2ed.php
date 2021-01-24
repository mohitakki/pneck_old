<?php $__env->startSection('content'); ?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Corporates Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Corporates Data</a>
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

                    <form action="<?php echo e(route('admin.corporates-update')); ?>" method="post" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>         
                       
                        <div class="form-body">
                          <h4 class="form-section"><i class="ft-user"></i>Edit Corporates Info</h4>
                          <div class="row">
                          
                            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
  
                            <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">Business Name</label>
  
                            <input type="text" name="business_name" value="<?php echo e($data->business_name); ?>" class="form-control" placeholder="Business Name"  autocomplete="off" value=""/>
                            </div>
  
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Email</label>                         
                                <input type="text" name="email" value="<?php echo e($data->email); ?>" class="form-control" placeholder="Email"  autocomplete="off" />
                            </div>
  
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Mobile</label>                         
                                <input type="text" name="mobile_no" value="<?php echo e($data->mobile_no); ?>" class="form-control" placeholder="Mobile Number"  autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Description</label>                         
                                <textarea name="description" class="form-control" placeholder="Description" autocomplete="off" ><?php echo e($data->description); ?></textarea>
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Gender</label> <br>       
                                <select class="form-control">
                                <option><?php echo e($data->gender); ?></option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                            <label for="projectinput3">Address</label>                         
                                <input type="text" name="address" value="<?php echo e($data->address); ?>" class="form-control" placeholder="Address"  autocomplete="off" />
                            </div>
  
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Password</label>                         
                                <input type="text" name="password" value="<?php echo e($data->password); ?>" class="form-control" placeholder="Password" autocomplete="off" />
                            </div>
  
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Confirm Password</label>                         
                                <input type="text" name="confirmpassword" value="<?php echo e($data->confirmpassword); ?>" class="form-control" placeholder="Confirm Password" autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Paypal Email</label>                         
                                <input type="text" name="paypalemail" value="<?php echo e($data->paypalemail); ?>" class="form-control" placeholder="Paypal Email"  autocomplete="off" />
                            </div>
  
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Picture Image</label>                         
                                <input type="file" name="pictureimage" class="form-control" autocomplete="off" />
                                <img src="<?php echo e(url('/admin_logos/'.$data->pictureimage)); ?>" width="100px" height="100px" >
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
                 
                    <form action="<?php echo e(route('admin.corporates-submit')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Corporates Info</h4>
                        <div class="row">
                        

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">Business Name</label>

                             <input type="text" name="business_name" class="form-control" placeholder="Business Name"  required autocomplete="off" value=""/>
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Email</label>                         
                              <input type="text" name="email" class="form-control" placeholder="Email"  required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Mobile</label>                         
                              <input type="text" name="mobile_no" class="form-control" placeholder="Mobile Number"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Description</label>                         
                              <textarea name="description" class="form-control" placeholder="Description" required autocomplete="off" ></textarea>
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                            <label for="projectinput3">Gender</label> <br>       
                            <select class="form-control">
                            <option>Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                            </select>
                        </div>

                          <div class="form-group col-md-6 mb-2">                           
                          <label for="projectinput3">Address</label>                         
                              <input type="text" name="address" class="form-control" placeholder="Address"  required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Password</label>                         
                              <input type="text" name="password" class="form-control" placeholder="Password" required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Confirm Password</label>                         
                              <input type="text" name="confirmpassword" class="form-control" placeholder="Confirm Password" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Paypal Email</label>                         
                              <input type="text" name="paypalemail" class="form-control" placeholder="Paypal Email"  required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Picture Image</label>                         
                              <input type="file" name="pictureimage" class="form-control" required autocomplete="off" />
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/corporates-add.blade.php ENDPATH**/ ?>