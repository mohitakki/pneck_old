@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Ratings</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Rating Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Set Ratings</a>
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
                   
                    <form action="{{route('admin.vendor-rating')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Set Default Ratings</h4>
                        <div class="row">
                          
                          
                           <div class="form-group col-md-6 mb-2">

                           <?php
                                      $ratings =  [
                                            0 => array(
                                              'id' => 1,
                                              'name' => 'Employee'
                                            ),
                                            1 => array(
                                              'id' => 2,
                                              'name' => 'Vendor'
                                            )
                                            ];
                                       
                                    ?>

                              <label for="projectinput2">Select Ratings For</label>
                                  <select class="form-control" id="Orgrole" required name="rating_for">
                                    <option value="">Select</option>
                                   <?php
                                    foreach($ratings as $role) { ?>
                                    <option value="{{$role['id']}}">{{ucfirst($role['name'])}}</option>
                                        <?php } ?>
                                    
                                  </select>
                               
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">Set Rating</label>

                             <input type="number" id="number" name="rating" class="form-control" required autocomplete="off" value=""/>
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