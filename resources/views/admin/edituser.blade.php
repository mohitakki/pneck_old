@extends('admin.layout.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">User Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Admin User Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add User</a>
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
                   
                    <form action="{{route('admin.user-update')}}" method="post">
                    {{csrf_field()}} 

                   <!-- <input type="hidden" name="latitude" value="{{$user->latitude}}">
                    <input type="hidden" name="lognitude" value="{{$user->lognitude}}"> -->              
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Admin User Info</h4>
                        <div class="row">
                          
                          @php
                          foreach($roles as $role)
                          {
                          $roleid[]=$role->id;
                          }
                          $i=1;
                          @endphp
                           <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">User Role</label>
                                  <select class="form-control" id="Orgrole" required="" name="role_type">
                                    @foreach($roles as $role)
                                    @if($role->id != '1' && (in_array($user->role_type,$roleid)))
                                    <option value="{{$role->id}}" @if($role->id == $user->role_type) selected="selected" @endif>{{ucfirst($role->role_name)}}</option>
                                    @elseif($role->id == '1' &&  $user->role_type == '1')
                                    <option value="{{$role->id}}" selected="selected">{{$role->role_name}}</option>
                                      @break
                                    @elseif(($role->id != '1') && (!in_array($user->role_type,$roleid)))
                                    @if($i++ == '1')
                                    <option value="" >Select The Role Type</option>
                                    @endif
                                    <option value="{{$role->id}}" >{{$role->role_name}}</option>
                                    @endif
                                    @endforeach                                    
                                  </select>
                               
                          </div>

                          <div class="form-group col-md-6 mb-2 assign_distributor">

                            <label for="projectinput2">Assign Distributor</label>
                            
                                <select class="selectpicker form-control agent dropup show" id="agent" name="assign_distributor[]" multiple data-live-search="true">
                                <option value="">Select Distributor</option>
                                  @foreach($distributor as $rows)
                                  <option value="{{$rows->id}}">{{ucfirst($rows->first_name)}} {{ucfirst($rows->last_name)}}</option>
                                  @endforeach
                                  </select>

                            </div> 
                          
                          <div class="form-group col-md-6 mb-2 assign_agent">

                            <label for="projectinput2">Assign Agent</label>
                            
                                <select class="selectpicker form-control agent dropup show" id="agent" name="assign_agent[]" multiple data-live-search="true">
                                <option value="">Select Agent</option>
                                  @foreach($users as $rows)
                                  <option value="{{$rows->id}}">{{ucfirst($rows->first_name)}} {{ucfirst($rows->last_name)}}</option>
                                  @endforeach
                                  </select>

                            </div> 

                          <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">State</label>
                              {{ Form::select('state_id', $state, $user->state_id, array('class' => 'form-control','id'=>'state')) }}
                             
                          </div>

                          <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">City</label>
                              {{ Form::select('city_id', $city, $user->city_id, array('class' => 'form-control','id'=>'city')) }}
                             
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">First Name</label>
                             <input type="hidden" name="id" value="{{$user->id}}">
                             <input type="text" id="FirstName" name="first_name" class="form-control" required autocomplete="off" value="{{$user->first_name}}"/>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">Last Name</label>                            
          
                              <input type="text" id="LastName" name="last_name" class="form-control" required autocomplete="off" value="{{$user->last_name}}"/>

                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Contact</label>

                               <input type="text" id="Mobile" name="mobile" class="form-control" required autocomplete="off" value="{{$user->mobile}}"/>
              
                          </div>

                          
                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Email</label>

                              <input type="text" id="Emailid" name="email" class="form-control" required autocomplete="off" value="{{$user->email}}"/>
              
                          </div>
                          @if($role->id != '1')
                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Change New Password</label>                         
                              <input type="password" id="password" name="password" class="form-control"  autocomplete="off" value="" />
                          </div>
                          @endif
                        
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

      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

      <script>

      $(document).ready(function(){
        var getdata = $('#Orgrole').val();

          if(getdata == 2){
            $(".assign_agent").show();
            $(".assign_distributor").hide();
          }if(getdata == 3){
            $(".assign_agent").hide();
            $(".assign_distributor").show();
          }
          if(getdata == 5){
            $(".assign_agent").hide();
            $(".assign_distributor").show();
          }
      });

      $('#Orgrole').change(function(){

      var getdata = $(this).val();

          if(getdata == 2){
            $(".assign_agent").show();
            $(".assign_distributor").hide();
          }if(getdata == 3){
            $(".assign_agent").hide();
            $(".assign_distributor").show();
          }
          if(getdata == 5){
            $(".assign_agent").hide();
            $(".assign_distributor").hide();
          }
      
      });

      $('#country').change(function(){
        var cid = $(this).val();
        if(cid){
        $.ajax({
           type:"get",
           url:" url('/state') /"+cid, //Please see the note at the end of the post**
           success:function(res)
           {       
                if(res)
                {
                    $("#state").empty();
                    $("#city").empty();
                    $("#state").append('<option>Select State</option>');
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    });
    
    $('#state').change(function(){
        var sid = $(this).val();
               
        if(sid){
        $.ajax({
           type:"get",
           //data: {"_token": "{{ csrf_token() }}"},
           url:"{{ url('/admin/getCities')}}/"+sid, //Please see the note at the end of the post**
           success:function(res)
           {       
                if(res)
                {
                    $("#city").empty();
                    $("#city").append('<option>Select City</option>');
                    $.each(res,function(key,value){
                        $("#city").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    }); 
     </script> 
      
@endsection