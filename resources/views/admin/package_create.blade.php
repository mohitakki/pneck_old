@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Package API Data Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Package API Data Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Package Data</a>
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
                   
                    <form action="{{route('admin.package-submit')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Package Data Info</h4>
                        <div class="row">
                        

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Package Name</label>

                               <input type="text" id="package_name" name="package_name" class="form-control"  required autocomplete="off" value=""/>
              
                          </div>

                          
                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Package Price</label>

                              <input type="text" id="package_price" name="package_price" class="form-control"  required autocomplete="off" value=""/>
              
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Duration</label>                         
                                  <select class="form-control" id="duration" required="" name="duration">
                                    <option value="">Select The Duration</option>
                                    <option value="1">Week</option>
                                    <option value="2">Month</option>
                                    <option value="3">Year</option>
                                    <option value="4">Life Time</option>
                                  </select>
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Currency</label>                         
                                  <select class="form-control" id="currency" required="" name="currency">
                                    <option value="" ></option>
                                  @foreach($currency as $currencies)
                                    <option value="{{$currencies->id}}" >{{$currencies->country}} {{$currencies->code}} <span style="text-align: left">{{$currencies->symbol}}</span></option>
                                  @endforeach
                                  </select>
                          </div>

                          <div class="form-group col-md-12 mb-2">
                              <label for="projectinput3">Package Description</label>                        
                              <textarea name="package_description" class="tinymce tinymce-classic"></textarea>
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