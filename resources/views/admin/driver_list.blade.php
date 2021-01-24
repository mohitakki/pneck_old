@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Cab Driver</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Cab Driver </li>
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
                  <h4 class="card-title">Cab Driver List</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="{{ url('/admin/kycemployee') }}">
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
                         <th style="text-align: center;"> Updated Date </th>
                         <th style="text-align: center;"> KYC Status </th>
                          <th style="text-align: center;"> Emp Type </th>
                         <th style="text-align: center;"> Login Info </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      @php
                      $i=1;
                      @endphp
                      <tbody>
                      @foreach($users as $user)

                      @if($user->type_user=='2')
                          
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
                        
                        <td>@if($user->updated_at != '') {{date('d M, Y (h:i A)', strtotime($user->updated_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($user->created_at))}}
                            @endif
                        </td>
                        <td>@if(($user->doc_verified == '0'))
                          <a href="{{ url('/admin/employeekyc/dl/').'/'.$user->id }}"> <i class="la la-dot-circle-o warning font-medium-1 mr-1"></i>Pending</a> 
                          @elseif(($user->doc_verified == '1'))
                          <a href="{{ url('/admin/employeekyc/dl/').'/'.$user->id }}"> <i class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                          Approved
                          </a>
                          @endif
                          </td>
                          @if ($user->type_user==2)
                          <td>Cab Driver</td>
                          @else
                          <td>Delivery Boy</td>
                          @endif
                          <td>
                          <a href="{{route('admin.employeelogininfo',$user->id)}}">
                            <i class="la la-sign-in"></i>
                          </a>                        
                        </td>
                        <td>@if(($user->pneck_emp == '0') && ($user->id != '1'))
                          <a href="#" data-url="{{route('admin.pneckemployee-check',$user->id)}}" class=" btn btn-danger check"> Inactive </a> 
                          @elseif(($user->pneck_emp == '1') && ($user->id != '1'))
                          <a href="#" data-url="{{route('admin.pneckemployee-uncheck',$user->id)}}" class="btn btn-success uncheck">
                          Active
                          </a>
                          @endif
                          </td>
                        <td>
                          <a href="{{route('admin.pneckemployee-edit',$user->id)}}">
                            <i class="la la-pencil"></i>
                          </a>
                        <!--  <a>
                            @if($user->id != '1')
                          <a href="#" data-url="{{route('admin.user-delete',$user->id)}}" class="delete">
                            <i class="la la-trash"></i>
                          </a>
                            @endif -->
                        </td>
                      </tr>
                      @endif
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
