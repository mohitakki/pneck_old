<?php $__env->startSection('content'); ?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Passenger Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Passenger Data</a>
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
                   
                   <?php
                      $uri = $_SERVER['REQUEST_URI'];
                      $uri= substr($uri,1,-2);
                    ?>
                    <form action="<?php echo e($uri== 'admin/single-passenger' ? route('admin.update-passenger') : route('admin.save-passenger')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>         
                  
                      
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Passenger Info</h4>
                        <div class="row">
                        

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">First Name</label>
                             <?php if($uri == 'admin/single-passenger'): ?> 
                            <input type="hidden" name="hiddenvalue" value="<?php echo e($passenger->id); ?>">
                          
                            <?php endif; ?>
                             <input type="text" id="fname" name="fname" value="<?php echo e($passenger->first_name ??  old('fname')); ?>"  class="form-control" placeholder="First Name"  required autocomplete="off" value=""/>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">Last Name</label>                            
                              <input type="text" id="lname" name="lname"  value="<?php echo e($passenger->last_name ??   old('lname')); ?>"   class="form-control" placeholder="Last Name"  required autocomplete="off" value=""/>

                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Email</label>                         
                              <input type="text" id="email" name="email" value="<?php echo e($passenger->email ??   old('email')); ?>" class="form-control" placeholder="Email"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-2 mb-2">
                            <label for="projectinput3">Country Code</label>
                            
                            <select id="country" name="country_code" value="<?php echo e($passenger->country_code ??   old('country_code')); ?>" class="form-control"  required autocomplete="off">
                            <option>Select Country Code</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($item->id == ($passenger->country_code ?? old('country_code'))  ): ?>
                            <option selected value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endif; ?>
                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>

                          <div class="form-group col-md-4 mb-2">                           
                              <label for="projectinput3">Contact Number</label>                         
                              <input type="text" id="contact" name="contact_number" value="<?php echo e($passenger->contact_number  ?? old('contact_number')); ?>" class="form-control" placeholder="Contact Number"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Gender</label> <br>   
                              <input type="radio" id="gender" name="gender" value="Male" <?php echo e(($passenger->gender ?? old('gender')) == 'Male' ? 'checked' : ''); ?> /> Male
                              <input type="radio" id="gender" name="gender" value="Female" <?php echo e(($passenger->gender ?? old('gender')) == 'Female' ? 'checked' : ''); ?> /> Female
                              <input type="radio" id="gender" name="gender" value="Other" <?php echo e(($passenger->gender ?? old('gender')) == 'Other' ? 'checked' : ''); ?>/> Other
                            
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                             
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Password</label>                         
                              <input type="text" id="Password" name="password" value="<?php echo e(old('password')); ?>" class="form-control" placeholder="Password" <?php echo e($uri== 'admin/single-passenger' ?'' :'required'); ?> autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Confirm Password</label>                         
                              <input type="text" id="Confirm Password" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>" class="form-control" placeholder="Confirm Password" <?php echo e($uri== 'admin/single-passenger' ?'' :'required'); ?> autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">   
                            <?php if($uri== 'admin/single-passenger'): ?>
                              <img src="<?php echo e($passenger->image); ?>" width="68px" >
                            <?php endif; ?>
                            <br>
                              <label for="projectinput3">Picture Image</label>                         
                              <input type="file" id="Image" name="image"   class="form-control" <?php echo e($uri== 'admin/single-passenger' ?'' :'required'); ?> autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Description</label>                         
                              <textarea id="description" name="description"  class="form-control" placeholder="description" required autocomplete="off" rows="5" ><?php echo e($passenger->description ?? old('description')); ?></textarea>
                          </div>
                        
                        </div>
                        <div class="form-actions right">
                           
                        <button type="button" class="btn btn-danger mr-1" onclick="history.go(-1);"><i class="ft-x"></i> Cancel</button>
                        <button type="submit" class="btn btn-success" value="Save"><i class="ft-check save-button-check"></i><?php echo e($uri== 'admin/single-passenger' ? 'Update' : 'Save'); ?> </button>                       
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/mydata/pneck_backend-master/resources/views/admin/passenger-add.blade.php ENDPATH**/ ?>