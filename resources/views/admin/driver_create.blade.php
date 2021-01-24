@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Driver Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Driver Data</a>
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

                    @if (!empty($data))

                    <form action="{{route('admin.driver-update')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}         
                       
                        <div class="form-body">
                          <h4 class="form-section"><i class="ft-user"></i>Edit Driver Info</h4>
                          <div class="row">

                          <input type="hidden" name="id" value="{{ $data->id }}">
                          
  
                            <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">First Name</label>
  
                            <input type="text" name="first_name" class="form-control" placeholder="First Name"  autocomplete="off" value="{{ $data->first_name }}"/>
                            </div>
  
                            <div class="form-group col-md-6 mb-2">
                                <label for="projectinput2">Last Name</label>                            
            
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name"  autocomplete="off" value="{{ $data->last_name }}"/>
  
                            </div>
  
                            <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Choose Corporates</label>
                              
                              <select name="corporation" class="form-control"  autocomplete="off">
                              <option>{{ $data->corporation }}</option>
                              @foreach ($c_data as $row)
                                
                              <option value="{{ $row->business_name }}">{{ $row->business_name }}</option>
  
                              @endforeach
                              </select>
                            </div>
  
                            
                            <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Choose Service Types</label>
                              
                              <select name="service" class="form-control"  autocomplete="off">
                              <option>{{ $data->service }}</option>
                              @foreach ($v_data as $row1)
                              <option value="{{ $row1->vehicle_type }}">{{ $row1->vehicle_type }}</option>
                              @endforeach
                              </select>
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Email</label>                         
                                <input type="text" name="email" class="form-control" value="{{ $data->email }}" placeholder="Email"  autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-2 mb-2">
                              <label for="projectinput3">Country Code</label>
                              
                              <select id="country" name="country" class="form-control"  autocomplete="off">
                              <option>Select Country Code</option>
                              <option value="+91">India</option>
                              <option value="+1">USA</option>
                              </select>
                            </div>
  
                            <div class="form-group col-md-4 mb-2">                           
                                <label for="projectinput3">Contact Number</label>                         
                                <input type="text" name="contact" class="form-control" placeholder="Contact Number"  value="{{ $data->contact }}"  autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Gender</label> <br>                        
                               <select class="form-control" name="gender">
                                 <option>{{ $data->gender }}</option>
                                 <option value="male">Male</option>
                                 <option value="female">Female</option>
                                 <option value="other">Other</option>
                               </select>
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Plate No</label>                         
                                <input type="text" name="plate_no" value="{{$data->plate_no }}" class="form-control" placeholder="Plate No"  autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Model</label>                         
                                <input type="text" name="model" value="{{$data->model }}" class="form-control" placeholder="Model"  autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Color</label>                         
                                <input type="text" name="color" value="{{$data->color }}" class="form-control" placeholder="Color"  autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Full Address</label>                         
                                <input type="text" name="address" value="{{$data->address }}" class="form-control" placeholder="Full Address"   autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Upload Image</label>                         
                                <input type="file" name="image" class="form-control"  autocomplete="off" />
                                <img src="{{url('/admin_logos/'.$data->image) }}" width="100px" height="100px" >
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Car Image</label>                         
                                <input type="file" name="car" class="form-control"  autocomplete="off" />
                                <img src="{{url('/admin_logos/'.$data->car) }}" width="100px" height="100px" >
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Password</label>                         
                                <input type="text" name="password" value="{{$data->password }}" class="form-control" placeholder="Password"  autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                               
                            </div>
  
                            <div class="form-group col-md-6 mb-2">                           
                                <label for="projectinput3">Confirm Password</label>                         
                                <input type="text" name="cpassword" value="{{$data->cpassword }}" class="form-control" placeholder="Confirm Password" autocomplete="off" />
                            </div>
  
                            <div class="form-group col-md-12 mb-2">                           
                                <label for="projectinput3">Description</label>                         
                                <textarea name="description" class="form-control" placeholder="Description" autocomplete="off" rows="5" >{{$data->description }}</textarea>
                            </div>
                          
                          </div>
                          <div class="form-actions right">
                          <button type="button" class="btn btn-danger mr-1" onclick="history.go(-1);"><i class="ft-x"></i> Cancel</button>
                          <button type="submit" name="save" class="btn btn-success" value="Save"><i class="ft-check save-button-check"></i> Save</button>                       
                          </div>
                          </div>
                        </div>  
                      </form>
                        
                    @else
                   
                    <form action="{{route('admin.driver-submit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Driver Info</h4>
                        <div class="row">
                        

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">First Name</label>

                             <input type="text" name="first_name" class="form-control" placeholder="First Name"  required autocomplete="off" value=""/>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">Last Name</label>                            
          
                              <input type="text" name="last_name" class="form-control" placeholder="Last Name"  required autocomplete="off" value=""/>

                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Choose Corporates</label>
                            
                            <select name="corporation" class="form-control"  required autocomplete="off">
                            <option>Select Corporates</option>
                            @foreach ($c_data as $row)
                              
                            <option value="{{ $row->business_name }}">{{ $row->business_name }}</option>

                            @endforeach
                            </select>
                          </div>

                          
                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Choose Service Types</label>
                            
                            <select name="service" class="form-control"  required autocomplete="off">
                              <option>Select Service</option>
                              @foreach ($v_data as $row1)
                              <option value="{{ $row1->vehicle_type }}">{{ $row1->vehicle_type }}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Email</label>                         
                              <input type="text" name="email" class="form-control" placeholder="Email"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-2 mb-2">
                            <label for="projectinput3">Country Code</label>
                            
                            <select id="country" name="country" class="form-control"  required autocomplete="off">
                            <option>Select Country Code</option>
                            <option value="+91">India</option>
                            <option value="+1">USA</option>
                            </select>
                          </div>

                          <div class="form-group col-md-4 mb-2">                           
                              <label for="projectinput3">Contact Number</label>                         
                              <input type="text" name="contact" class="form-control" placeholder="Contact Number"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Gender</label> <br>                        
                             <select class="form-control" name="gender">
                               <option>Select Gender</option>
                               <option value="male">Male</option>
                               <option value="female">Female</option>
                               <option value="other">Other</option>
                             </select>
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Plate No</label>                         
                              <input type="text" name="plate_no" class="form-control" placeholder="Plate No"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Model</label>                         
                              <input type="text" name="model" class="form-control" placeholder="Model"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Color</label>                         
                              <input type="text" name="color" class="form-control" placeholder="Color"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Full Address</label>                         
                              <input type="text" name="address" class="form-control" placeholder="Full Address"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Upload Image</label>                         
                              <input type="file" name="image" class="form-control" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Car Image</label>                         
                              <input type="file" name="car" class="form-control" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Password</label>                         
                              <input type="text" name="password" class="form-control" placeholder="Password" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                             
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Confirm Password</label>                         
                              <input type="text" name="cpassword" class="form-control" placeholder="Confirm Password" required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-12 mb-2">                           
                              <label for="projectinput3">Description</label>                         
                              <textarea name="description" class="form-control" placeholder="Description" required autocomplete="off" rows="5" ></textarea>
                          </div>
                        
                        </div>
                        <div class="form-actions right">
                        <button type="button" class="btn btn-danger mr-1" onclick="history.go(-1);"><i class="ft-x"></i> Cancel</button>
                        <button type="submit" name="save" class="btn btn-success" value="Save"><i class="ft-check save-button-check"></i> Save</button>                       
                        </div>
                        </div>
                      </div>  
                    </form>

                                            
                    @endif
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </section>
      </div>
      
@endsection