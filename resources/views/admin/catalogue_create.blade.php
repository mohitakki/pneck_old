@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Vendor Catalogue API Data Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Vendor Catalogue API Data</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Vendor Catalogue Data</a>
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
                     <li><a href="{{ url('/admin/catalogue-show') }}">
                     <button type="button" class="btn btn-info mr-1 add-button">Delete</button></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                   
                    <form action="{{route('admin.catalogue-submit')}}" method="post">
                    @csrf         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Service Data Info</h4>
                        <div class="row">

                        <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Select Your Profession</label>                         
                                  <select class="form-control" id="profession" required name="profession">
                                    <option value="" >Select Your Profession</option>
                                  @foreach($services as $row)
                                    <option value="{{$row->id}}" >{{$row->id}} <span style="text-align: left">{{$row->title}}</span></option>
                                  @endforeach
                                  </select>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">Select Category</label>

                          <select class="form-control" name="category_name" required="true" id="category">
                          </select>
                          </div>

                         <!-- <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Select Your Category</label>                         
                                  <select class="form-control" id="category_name" required name="category_name">
                                    <option value="" >Select Your Category</option>
                                  @foreach($category as $row)
                                    <option value="{{$row->id}}" ><span style="text-align: left">{{$row->title}}</span></option>
                                  @endforeach
                                  </select>
                          </div> -->
                          
                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Input Catalogue Name</label>

                              <input type="text" id="catalogue_name" name="catalogue_name" class="form-control"  required autocomplete="off" placeholder="Input Catalogue Name" value=""/>
              
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

      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

      <script>
      $('#profession').change(function(){
        var sid = $(this).val();
        if(sid){
        $.ajax({
           type:"get",
           url:"{{ url('/admin/getCategory')}}/"+sid, //Please see the note at the end of the post**
           success:function(res)
           {       
                if(res)
                {
                    $("#category").empty();
                    $("#category").append('<option>Select Category</option>');
                    $.each(res,function(key,value){
                        $("#category").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    });
    </script>

@endsection