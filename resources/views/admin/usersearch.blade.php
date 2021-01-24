@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Admin User Agent Search</h3>
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
                   
                    <form action="{{route('admin.user-search')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Admin Agent User Search</h4>
                        <div class="row">
                          
                          
                         <!--  <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">User Role</label>
                                  <select class="form-control" id="Orgrole" required name="role_type">
                                    <option value="">Select The Role</option>
                                    @foreach($roles as $role)
                                    @if($role->id!='1')
                                    <option value="{{$role->id}}">{{ucfirst($role->role_name)}}</option>
                                    @endif
                                    @endforeach
                                  </select>
                               
                          </div> -->

                        <!--  <div class="form-group col-md-6 mb-2">

                            <label for="projectinput2">Select State</label>
                                <select class="form-control" id="Orgrole" required="" name="state">
                                  <option value="">Select</option>
                                  @foreach($state as $rows)
                                  <option value="{{$rows->id}}">{{ucfirst($rows->name)}}</option>
                                  @endforeach
                                </select>                            
                            </div> -->

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
                        
                        </div>
                        <div class="form-actions right">
                        <button type="button" class="btn btn-danger mr-1" onclick="history.go(-1);"><i class="ft-x"></i> Cancel</button>
                        <button type="submit" name="save" class="btn btn-success" value="Save"><i class="ft-check save-button-check"></i>Search</button>                       
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