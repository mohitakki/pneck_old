@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">User Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pneck Customer Management</a>
                </li>
               <!-- <li class="breadcrumb-item active"><a href="#">Add User</a> -->
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
                   
                    <form action="{{route('admin.pneckuser-update')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Pneck Customer Info</h4>
                        <div class="row">
                          
                          @php
                          foreach($roles as $role)
                          {
                          $roleid[]=$role->id;
                          }
                          $i=1;
                          @endphp
                           <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">Customer Pic</label>

                              @if($user->profile_image != '')
                <img class="brand-logo" alt="modern admin logo" style="border-radius:35px;" height="100px;" width="100px;" src="{{ $user->profile_image }}">
                 @else
              <img src="{{url('/admin_theme/app-assets/images/logo/logo.png') }}" id="blahimage" alt="logo" style="background-color: linen;">
                            @endif
                               
                         
                             
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">First Name</label>
                             <input type="hidden" name="id" value="{{$user->id}}">
                             <input type="text" id="FirstName" readonly name="first_name" class="form-control" required autocomplete="off" value="{{$user->first_name}}"/>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">Last Name</label>                            
          
                              <input type="text" id="LastName" readonly name="last_name" class="form-control" required autocomplete="off" value="{{$user->last_name}}"/>

                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Contact</label>

                               <input type="text" id="Mobile" readonly name="mobile" class="form-control" required autocomplete="off" value="{{$user->mobile}}"/>
              
                          </div>

                          
                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Email</label>

                              <input type="text" id="Emailid" readonly name="email" class="form-control" required autocomplete="off" value="{{$user->email}}"/>
              
                          </div>

                         <!-- <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Change New Password</label>                         
                              <input type="password" id="password"  name="password" class="form-control"  autocomplete="off" value="" />
                          </div> -->
                        
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