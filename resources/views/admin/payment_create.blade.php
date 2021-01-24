@extends('admin.layout.app')

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Payment API Data Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Payment API Data Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Payment Data</a>
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
                   
                    <form action="{{route('admin.payment-submit')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Payment API Data Info</h4>
                        <div class="row">

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Payment Gateway Name</label>
                               <input type="text" id="name" name="name" class="form-control"  required autocomplete="off" value=""/>
              
                          </div>
                                                

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput3">Merchant Key</label>

                               <input type="text" id="merchant_key" name="merchant_key" class="form-control"  required autocomplete="off" value=""/>
              
                          </div>

                          
                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Salt</label>

                              <input type="text" id="salt" name="salt" class="form-control"  required autocomplete="off" value=""/>
              
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Test URL</label>                         
                              <input type="text" id="test_url" name="test_url" class="form-control"  required autocomplete="off" />
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput3">Live URL</label>

                              <input type="text" id="live_url" name="live_url" class="form-control"  required autocomplete="off" value=""/>
              
                          </div>

                          <div class="form-group col-md-6 mb-2">                           
                              <label for="projectinput3">Account Type</label>                         
                              <input type="text" id="account_type" name="account_type" class="form-control"  required autocomplete="off" />
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