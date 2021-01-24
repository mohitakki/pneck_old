@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Pneck Employee Application</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Pneck Employee Application</li>
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
                  <h4 class="card-title">Pneck Employee Application List</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                     <!-- <li><a href="{{route('admin.user-create')}}"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a> -->
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
                         <th style="text-align: center;"> Full Name </th>
                         <th style="text-align: center;"> Email Id </th>
                         <th style="text-align: center;"> Mobile </th>
                         <th style="text-align: center;"> Current Company Name </th>
                         <th style="text-align: center;">Current Desigination</th>
                         <th style="text-align: center;">Position Applyied</th>
                         <th style="text-align: center;"> Current Salary </th>
                         <th style="text-align: center;"> State </th>
                         <th style="text-align: center;"> City </th>
                         <th style="text-align: center;"> Download Document</th>
                         <th style="text-align: center;"> Updated Date </th>
                         <!-- <th style="text-align: center;"> Action </th> -->
                      </thead>
                      @php
                      $i=1;
                      @endphp
                      <tbody>
                      @foreach($empapplicationInfo as $user)
                      <tr style="text-align:center">
                      	<td style="display: none"></td>
                          
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}} </td>
                        <td>{{$user->mobile}} </td>
                        <td>{{$user->present_employer}} </td>
                        <td>{{$user->current_position}} </td>
                        <td>{{$user->applyied_for}} </td>
                        <td>{{$user->present_salary}} </td>
                        <td>{{$user->stateName}} </td>
                        <td>{{$user->cityName}} </td>
                        <td><a href="{{route('admin.downloadEmpResume',$user->image)}}" data-url="{{route('admin.downloadEmpResume',$user->image)}}">
                            <i class="la la-download"></i>
                          </a></td>
                        <td>@if($user->updated_at != '') {{date('d M, Y (h:i A)', strtotime($user->updated_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($user->created_at))}}
                            @endif
                        </td>
                        <!-- <td>                     
                          <a href="#" data-url="{{route('admin.pneckcontactus-delete',$user->id)}}" class="delete">
                            <i class="la la-trash"></i>
                          </a>
                        </td> -->
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