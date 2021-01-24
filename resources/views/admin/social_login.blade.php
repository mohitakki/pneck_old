@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Social Login List</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Social Login</li>
              </ol>
            </div>
          </div>
        </div>
      <div class="content-body">
        
        <!-- Column selectors table -->
        <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Social Login Data List</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <th style="display: none"></th>
                         <th style="text-align: center;"> Social Login Type </th>
                         <th style="text-align: center;"> App Client Id </th>
                         <th style="text-align: center;"> App Secret Key </th>
                         <th style="text-align: center;"> Updated By </th>
                         <th style="text-align: center;"> Updated Date </th>
                         <th style="text-align: center;"> Action </th>
                      </thead>

                      <tbody>
                      @foreach($data as $row)
                      <tr style="text-align:center">
                        <td style="display: none">
                        <td><a href="#" data-toggle="modal" data-target="#bounceInLeft{{$row->id}}">@if($row->sociallogin_type == '1') Facebook @elseif($row->sociallogin_type == '2') Google @endif </a></td>
                        <td>{{$row->app_client_id}}</td>
                        <td>{{$row->app_secret}}</td>
                        <td>{{ucfirst($row->username->first_name)}} {{($row->username->last_name)}} </td>
                        <td>@if($row->updated_at != '') {{date('d M, Y (h:i A)', strtotime($row->updated_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($row->created_at))}}
                            @endif
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#bounceInLeft{{$row->id}}">
                            <i class="la la-pencil"></i>
                          </a>
                          
                        </td>
                      </tr>
                      <div class="modal animated bounceInLeft text-left" id="bounceInLeft{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel48" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel48">Edit Social Login</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <link rel="stylesheet" type="text/css" href="{{URL::asset('public/admin_theme/app-assets/fonts/line-awesome/css/line-awesome.min.css')}}">
                      <form action="{{route('admin.social_login-update')}}" method="post">
                        {{csrf_field()}}
                      <div class="modal-body">
                          <div class="form-group">
                            <label for="projectinput2">Social Login Type</label>

                             <input type="text" id="social_login_type" name="sociallogin_type" class="form-control"  readonly autocomplete="off" @if($row->sociallogin_type == '1') placeholder="Facebook" @elseif($row->sociallogin_type == '2') placeholder="Google" @endif/>
                             <input type="hidden" id="id" name="id" class="form-control"  required autocomplete="off" value="{{$row->id}}"/>
                          </div>

                          <div class="form-group">
                              <label for="projectinput2">App Client Id</label>
                          </div>
                          <div class="form-group">
                               <input type="text" id="app_client_id" name="app_client_id" class="form-control"  required autocomplete="off" value="{{$row->app_client_id}}"/>

                          </div>

                          <div class="form-group">
                            <label for="projectinput3">App Secret Key</label>
                                  <input type="text" id="app_secret" name="app_secret" class="form-control"  required autocomplete="off" value="{{$row->app_secret}}"/>   
                          </div>
                          
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-outline-primary">Save changes</button>
                      </div>
                    </form>
                    </div>
                    </div>
                  </div>
                      @endforeach
                      </tbody>

                 </table>
                </div>
              </div> 
            </div>
          </div>
         </div>
        </div>
      </section>
    </div>
<!--/ Column selectors table -->

@section('js')
@include('admin.includes.popup')
@endsection
@endsection