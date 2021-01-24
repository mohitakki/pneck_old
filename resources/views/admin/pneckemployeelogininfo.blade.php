@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Pneck Employee</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Pneck Employee Login Info </li>
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
                  <h4 class="card-title">Pneck Employee Login Info</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="{{ url('/admin/pneckemployee') }}">
                     <button type="button" class="btn btn-info mr-1 add-button">Back</button></a>
                      </li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                      	<th style="display: none"></th>
                        <th style="text-align: center;"> Photo </th>
                         <th style="text-align: center;"> Full Name </th>
                         <th style="text-align: center;"> Email Id </th>
                         <th style="text-align: center;"> Mobile </th>
                         <th style="text-align: center;"> Login Info </th>
                          <th style="text-align: center;"> Status </th>
                                          
                      </thead>
                      @php
                      $i=1;
                      @endphp
                      <tbody>
                      @foreach($users as $user)
                      <tr style="text-align:center">
                      	<td style="display: none"></td>
                          <td>@if($user->profile_image != '')
                <img class="brand-logo" alt="modern admin logo" style="border-radius:35px;" height="50px;" width="50px;" src="{{ $user->profile_image }}">
                 @else
              <img src="{{url('/admin_theme/app-assets/images/logo/logo.png') }}" id="blahimage" alt="logo" style="background-color: linen;">
                            @endif</td>
                        <td><a href="{{route('admin.pneckemployee-edit',$user->id)}}">{{$user->first_name}} {{$user->last_name}}</a></td>
                        <td>{{$user->email}} </td>
                        <td>{{$user->mobile}} </td>
                        
                        <td class="col-md-6">@if($user->login_at != '') {{date('d M,D, Y (h:i A)', strtotime($user->login_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($user->created_at))}}
                            @endif
                        </td>
                        <td>@if(($user->login == '1'))
                           <i class="la la-dot-circle-o success font-medium-1 mr-1"></i>Login
                          @elseif(($user->login == '2'))
                           <i class="la la-dot-circle-o warning font-medium-1 mr-1"></i>Logout
                          @endif
                          </td>
                       
                      </tr>
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