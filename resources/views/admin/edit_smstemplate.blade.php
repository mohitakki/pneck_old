@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">SMS Template Edit</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">SMS Template Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Edit SMS Template</a>
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
                   
                    <form action="{{route('admin.sms-template-update')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>SMS Template Info</h4>
                        <div class="row">
                          
                          
                           <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">SMS For</label>
                                  <select class="form-control" id="sms_for" required="" name="sms_for">
                                     <option value="1" @if($data->sms_for == '1') selected @endif>User Registration</option>
                                    <option value="2" @if($data->sms_for == '2') selected @endif>Admin User Forgot Password</option>
                                    <option value="3" @if($data->sms_for == '3') selected @endif>Admin User Reset Password</option>
                                    <option value="4" @if($data->sms_for == '4') selected @endif>Veriy Your Email Address</option>
                                  </select>
                               
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">SMS Heading</label>

                             <input type="hidden" name="id" value="{{$data->id}}">
                              <input type="text" id="sms_heading" name="sms_heading" class="form-control" placeholder="Enter SMS Heading" required autocomplete="off" value="{{$data->sms_heading}}"/>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">SMS Subject</label>                            
          
                              <input type="text" id="sms Subject" name="sms_subject" class="form-control" placeholder="Enter SMS Subject" required autocomplete="off" value="{{$data->sms_subject}}"/>

                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">SMS Body</label>

                               <input type="text" id="sms_body" name="sms_body" class="form-control" placeholder="Enter SMS Body" required autocomplete="off" value="{{$data->sms_body}}"/>
              
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