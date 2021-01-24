@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Sub Admin Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Sub Admin Data</a>
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
                   
                    <form action="{{route('admin.backend-data-submit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Sub Admin Info</h4>
                        <div class="row">
                        

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2"> Name</label>

                             <input type="text" id=" Name" name=" Name" class="form-control" placeholder=" Name"  required autocomplete="off" value=""/>
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Email</label>                         
                              <input type="text" id="email" name="email" class="form-control" placeholder="Email"  required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Mobile</label>                         
                              <input type="text" id="Mobile" name="Mobile" class="form-control" placeholder="Mobile Number"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Paypal Email</label>                         
                              <input type="text" id="Paypal" name="Paypal" class="form-control" placeholder="Paypal Email"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Gender</label> <br>                        
                              <input type="radio" id="gender" name="gender" /> Male
                              <input type="radio" id="gender" name="gender" /> Female
                              <input type="radio" id="gender" name="gender" /> Other
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                         
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Password</label>                         
                              <input type="text" id="Password" name="Password" class="form-control" placeholder="Password" required autocomplete="off" />
                          </div>


                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Confirm Password</label>                         
                              <input type="text" id="Confirm Password" name="Confirm Password" class="form-control" placeholder="Confirm Password" required autocomplete="off" />
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
      
@endsection