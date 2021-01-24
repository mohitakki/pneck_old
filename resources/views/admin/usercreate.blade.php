@extends('admin.layout.app')

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Admin User Agent Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Admin Agent User Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Agent User</a>
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
                   
                    <form action="{{route('admin.user-submit')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Admin Agent User Registration</h4>
                        <div class="row">
                          
                          
                           <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">User Role</label>
                                  <select class="form-control" id="Orgrole" required name="role_type">
                                    <option value="">Select The Role</option>
                                    @foreach($roles as $role)
                                    @if($role->id!='1')
                                    <option value="{{$role->id}}">{{ucfirst($role->role_name)}}</option>
                                    @endif
                                    @endforeach
                                  </select>
                               
                          </div>
                          
                         <div class="form-group col-md-6 mb-2 assign_distributor" style="display:none;">

                            <label for="projectinput2">Under Distributor</label>
                                
                                <select class="selectpicker form-control agent" id="agent" name="assign_distributor[]" multiple data-live-search="true">
                                <option value="">Select Distributor</option>
                                  @foreach($distributor as $rows)
                                  <option value="{{$rows->id}}">{{ucfirst($rows->first_name)}} {{ucfirst($rows->last_name)}}</option>
                                  @endforeach
                                  </select>

                            </div> 

                            <div class="form-group col-md-6 mb-2 assign_agent" style="display:none;">

                            <label for="projectinput2">Assign Agent</label>
                                
                                <select class="selectpicker form-control agent" id="agent" name="assign_agent[]" multiple data-live-search="true">
                                <option value="">Select Agent</option>
                                  @foreach($users as $rows)
                                  <option value="{{$rows->id}}">{{ucfirst($rows->first_name)}} {{ucfirst($rows->last_name)}}</option>
                                  @endforeach
                                  </select>

                            </div> 

                            <div class="form-group col-md-6 mb-2">

                            <label for="projectinput2">Select State</label>

                            <select class="form-control" name="state_id" required id="state">
                              <option value="">Select State</option>
                              @foreach ($state as $rows) 
                                  <option value="{{ $rows->id }}">
                                  {{ ucfirst($rows->name) }}
                                  </option>
                              @endforeach
                          </select>

                          </div>

                         <!-- <select class="form-control" name="state" id="state">
                          </select> -->

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">Select City</label>

                          <select class="form-control" name="city_id" required="true" id="city">
                          </select>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">First Name</label>

                             <input type="text" id="FirstName" name="first_name" class="form-control" placeholder="Input First Name" required autocomplete="off" value=""/>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">Last Name</label>                            
          
                              <input type="text" id="LastName" name="last_name" class="form-control" placeholder="Input Last Name"  required autocomplete="off" value=""/>

                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Mobile</label>
                               <input type="text" id="Mobile" name="mobile" class="form-control" placeholder="Input Mobile No" required autocomplete="off" value=""/>              
                          </div>

                          <div class="form-group col-md-6 mb-2" style="display:none;">
                            <label for="projectinput3">Latitude</label>
                               <input type="text" id="lat" name="latitude" class="form-control" autocomplete="off" value=""/>              
                          </div>

                          <div class="form-group col-md-6 mb-2" style="display:none;">
                            <label for="projectinput3">Lognitude</label>
                               <input type="text" id="long" name="lognitude" class="form-control" autocomplete="off" value=""/>              
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Email</label>

                              <input type="text" id="Emailid" name="email" class="form-control" placeholder="Input email id" required autocomplete="off" value=""/>
              
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Password</label>                         
                              <input type="password" id="password" name="password" class="form-control"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Current Address</label>

                              <input type="text" id="address" name="address" class="form-control" required placeholder="Input current address" value=""/>
              
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

     
 <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>Ankit-Google-key-- AIzaSyCa6F4F-g-v5PbK1hBmXg_bZOyRKOaBvpQ -->

 <script src="https://maps.google.com/maps/api/js?key=AIzaSyBSsn8yLLAYhjVbWe11EJ-GlvuavinGEFY" 
          type="text/javascript"></script> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 

  <script>
     navigator.geolocation.getCurrentPosition(function(position) {

    var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            console.log('Latitude: ' +position.coords.latitude);
            console.log('Longitude: ' +position.coords.longitude);
            $("#lat").val(position.coords.latitude);
            $("#long").val(position.coords.longitude);
     }); 

  // var geocoder;
  // var map;
  // function initialize() {
  //   geocoder = new google.maps.Geocoder();
  //   var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  //   var mapOptions = {
  //     zoom: 8,
  //     center: latlng
  //   }
  //   map = new google.maps.Map(document.getElementById('map'), mapOptions);
  // }

  // function codeAddress() {
  //   var address = document.getElementById('address').value;
  //   geocoder.geocode( { 'address': address}, function(results, status) {
  //     if (status == 'OK') {
  //       console.log(address);
  //       map.setCenter(results[0].geometry.location);
  //       var marker = new google.maps.Marker({
  //           map: map,
  //           position: results[0].geometry.location
  //       });
  //     } else {
  //       alert('Geocode was not successful for the following reason: ' + status);
  //     }
  //   });
  // }
  </script>

      <script type="text/javascript">

     $('#Orgrole').change(function(){

       var getdata = $(this).val();

        if(getdata == 2){
          $(".assign_distributor").show();
          $(".assign_agent").hide();
        }if(getdata == 3){
          $(".assign_agent").show();
          $(".assign_distributor").hide();
        }
        if(getdata == 5){
          $(".assign_agent").hide();
          $(".assign_distributor").hide();
        }
        
     });

      </script>

      

      <script>
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
