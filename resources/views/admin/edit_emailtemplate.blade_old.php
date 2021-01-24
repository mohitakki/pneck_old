@extends('admin.layout.app')

@section('content')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Email Template Edit</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Email Template Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Edit Email Template</a>
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
                   
                    <form action="{{route('admin.email-template-update')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Email Template Info</h4>
                        <div class="row">
                          

                          <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">User Type</label>
                                  <select class="form-control" id="for_user" required="" name="for_user">
                                    <option value="">Select The User Type</option>
                                    @foreach($usertypes as $usertype)
                                    <option value="{{$usertype->id}}" @if($data->for_user == $usertype->id)  selected @endif>{{$usertype->user_type_name}}</option>
                                    @endforeach
                                  </select>
                               
                          </div> 
                          
                           <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">Email For</label>
                                  <select class="form-control" id="email_for" required="" name="email_for">
                                    <option value="1" @if($data->email_for == '1') selected @endif>User Registration</option>
                                    <option value="2" @if($data->email_for == '2') selected @endif>Admin User Forgot Password</option>
                                    <option value="3" @if($data->email_for == '3') selected @endif>Admin User Reset Password</option>
                                    <option value="4" @if($data->email_for == '4') selected @endif>Veriy Your Email Address</option>
                                  </select>
                               
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">Email Heading</label>

                             <input type="hidden" name="id" value="{{$data->id}}">
                              <input type="text" id="email_heading" name="email_heading" class="form-control"  required autocomplete="off" value="{{$data->email_heading}}"/>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">Email Subject</label>                            
          
                              <input type="text" id="Email Subject" name="email_subject" class="form-control" required autocomplete="off" value="{{$data->email_subject}}"/>

                          </div>

                          <div class="form-group col-md-12 mb-2">
                            <label for="projectinput3">Email Body</label>

                               <textarea id="email_body" name="email_body" class="tinymce tinymce-classic" required autocomplete="off">{{$data->email_body}}</textarea>
              
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