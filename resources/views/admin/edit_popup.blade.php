@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Pop-Up Edit</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Admin Pop-Up Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Pop-Up</a>
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
                   
                    <form action="{{route('admin.popup-update')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Pop-Up Info</h4>
                        <div class="row">
                          
                          
                           <div class="form-group col-md-6 mb-2">
                            <input type="hidden" name="id" value="{{$data->id}}">

                                  <label for="projectinput2">PopUp for</label>
                                      <select class="form-control" id="popup_for" required="" name="popup_for">
                                        @if($data->popup_for != '0')
                                        @foreach($menus as $key => $value)    
                                        <option value="{{$key}}" @if($data->popup_for == $key) selected @endif>{{$value}}</option>
                                        @endforeach
                                        @elseif($data->popup_for == '0')
                                        <option value="0"  selected >Default</option>
                                        @endif
                                      </select>
                                                                  
                          </div>
                          
                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">PopUp Type</label>
                              <select class="form-control" id="popup_type" required="" name="popup_type">
                                    <option value="">Select The Popup Type</option>
                                    <option value="1" @if($data->popup_type == 1) selected @endif>Active</option>
                                    <option value="2" @if($data->popup_type == 2) selected @endif>Inactive</option>
                                    <option value="3" @if($data->popup_type == 3) selected @endif>Delete</option>
                              </select>
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">PopUp Title</label>                         
                              <input type="text" id="popup_title" name="popup_title" class="form-control"  required autocomplete="off" value="{{$data->popup_title}}"/>
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">PopUp Message</label>                         
                              <input type="text" id="popup_message" name="popup_message" class="form-control"  required autocomplete="off" value="{{$data->popup_message}}" />
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