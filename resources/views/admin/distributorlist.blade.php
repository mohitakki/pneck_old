@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Distributor List</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Admin Distributor User</li>
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
                  <h4 class="card-title">User List</h4>
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
                         <th style="text-align: center;"> Full Name </th>
                         <th style="text-align: center;"> Email Id </th>
                         <th style="text-align: center;"> Contact Number </th>
                         <th style="text-align: center;"> State </th>
                         <th style="text-align: center;"> City </th>
                         <th style="text-align: center;"> Role </th>
                         <th style="text-align: center;"> Updated Date </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      @php
                      $i=1;
                      @endphp
                      <tbody>
                      @foreach($users as $user)
                      <tr style="text-align:center">
                      	<td style="display: none"></td>
                        <td><a href="{{route('admin.agent-list',$user->id)}}">{{$user->first_name}} {{$user->last_name}}</a></td>
                        <td>{{$user->email}} </td>
                        <td>{{$user->mobile}} </td>
                        <td>{{$user->state['name']}} </td>
                        <td>{{$user->city['city_name']}} </td>
                        <td>@if($user->role_detail != ''){{ucfirst($user->role_detail->role_name)}} @endif</td>
                        <td>@if($user->updated_at != '') {{date('d M, Y (h:i A)', strtotime($user->updated_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($user->created_at))}}
                            @endif
                        </td>
                        <td>@if(($user->status == '0') && ($user->id != '1'))
                          <a href="#" data-url="{{route('admin.user-check',$user->id)}}" class=" btn btn-danger check"> Inactive </a> 
                          @elseif(($user->status == '1') && ($user->id != '1'))
                          <a href="#" data-url="{{route('admin.user-uncheck',$user->id)}}" class="btn btn-success uncheck">
                          Active
                          </a>
                          @endif
                          </td>
                        <td>
                          <a href="{{route('admin.user-edit',$user->id)}}">
                            <i class="la la-pencil"></i>
                          </a>
                          <a>
                            @if($user->id != '1')
                          <a href="#" data-url="{{route('admin.user-delete',$user->id)}}" class="delete">
                            <i class="la la-trash"></i>
                          </a>
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