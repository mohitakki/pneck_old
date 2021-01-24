@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Pneck Vendors</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Pneck Vendors </li>
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
                  <h4 class="card-title">Pneck Vendors List</h4>
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
                        <th style="text-align: center;"> Photo </th>
                         <th style="text-align: center;"> Full Name </th>
                         <th style="text-align: center;"> Email Id </th>
                         <th style="text-align: center;"> Mobile </th>
                         <th style="text-align: center;"> KYC Approved By</th>
                         <th style="text-align: center;"> Payment Mode</th>
                         <th style="text-align: center;"> Vendor Type </th>
                         <th style="text-align: center;"> Category </th>
                         <th style="text-align: center;"> State </th>
                         <th style="text-align: center;"> City </th>
                         <th style="text-align: center;"> Updated Date </th>
                         <th style="text-align: center;"> KYC Status </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      @php
                      $i=1;
                      @endphp
                      <tbody>
                      @foreach($vendors as $rows)
                       @if($rows->user_type=='1')
                      <tr style="text-align:center">
                      	<td style="display: none"></td>
                          <td>@if($rows->profile_image != '')
                <img class="brand-logo" alt="modern admin logo" style="border-radius:35px;" height="50px;" width="50px;" src="{{ $rows->profile_image }}">
                 @else
              <img src="{{url('/admin_theme/app-assets/images/logo/logo.png') }}" id="blahimage" alt="logo" style="background-color: linen;">
                            @endif</td>
                        <td><a href="{{route('admin.pneckvendor-edit',$rows->id)}}">{{$rows->first_name}} {{$rows->last_name}}</a></td>
                        <td>{{$rows->email}} </td>
                        <td>{{$rows->mobile}} </td>
                        <td>{{$rows->FirstName}} {{$rows->LastName}}-{{$rows->agent_id}} </td>
                        <td>{{$rows->payment_mode}} </td>
                        <td>{{$rows->vendor_type}} </td>
                        <td>{{$rows->category}} </td>
                        <td>{{$rows->stateName}} </td>
                        <td>{{$rows->city_name}} </td>
                        
                        <td>@if($rows->updated_at != '') {{date('d M, Y (h:i A)', strtotime($rows->updated_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($rows->created_at))}}
                            @endif
                        </td>
                        <td>@if(($rows->kyc_approved_at == ''))
                          <a href="{{ url('/admin/vendorkyc/dl/').'/'.$rows->id }}"> <i class="la la-dot-circle-o warning font-medium-1 mr-1"></i>Pending</a> 
                          @elseif(($rows->kyc_approved_at != 'NULL'))
                          <a href="{{ url('/admin/vendorkyc/dl/').'/'.$rows->id }}"> <i class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                          Approved
                          </a>
                          @endif
                          </td>
                        <td>@if(($rows->pneck_vendor == '0') && ($rows->id != '1'))
                          <a href="#" data-url="{{route('admin.pneckvendor-check',$rows->id)}}" class=" btn btn-danger check"> Inactive </a> 
                          @elseif(($rows->pneck_vendor == '1') && ($rows->id != '1'))
                          <a href="#" data-url="{{route('admin.pneckvendor-uncheck',$rows->id)}}" class="btn btn-success uncheck">
                          Active
                          </a>
                          @endif
                          </td>
                        <td>
                          <a href="{{route('admin.pneckvendor-edit',$rows->id)}}">
                            <i class="la la-pencil"></i>
                          </a>
                        <!--  <a>
                            @if($rows->id != '1')
                          <a href="#" data-url="{{route('admin.user-delete',$rows->id)}}" class="delete">
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
