@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">SMS API List</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Email & Sms</li>
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
                  <h4 class="card-title">SMS API Data List</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="{{route('admin.smsapi-create')}}"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <th style="display: none"></th>
                         <th style="text-align: center;"> SMS API Username </th>
                         <th style="text-align: center;"> Sender Id </th>
                         <th style="text-align: center;"> Updated By </th>
                         <th style="text-align: center;"> Updated Date </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      @php
                      $i=1;
                      @endphp
                      <tbody>
                      @foreach($data as $row)
                      <tr style="text-align:center">
                        <td style="display: none"></td>
                        <td><a href="{{route('admin.smsapi-edit',$row->id)}}"> {{(ucfirst($row->username))}} </a> </td>
                        <td>{{$row->sender_id}}</td>
                        <td>{{ucfirst($row->adminname->first_name)}} {{($row->adminname->last_name)}} </td>
                        <td>@if($row->updated_at != '') {{date('d M, Y (h:i A)', strtotime($row->updated_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($row->created_at))}}
                            @endif
                        </td>
                        <td>@if($row->status == '1')
                          <a href="#" data-url="{{route('admin.smsapi-uncheck',$row->id)}}" class="btn btn-success uncheck">
                           Active
                          </a> 
                          @else
                          <a href="#" data-url="{{route('admin.smsapi-check',$row->id)}}" class=" btn btn-danger check">
                          Inactive
                          </a> 
                          @endif</td>
                        <td>
                          <a href="{{route('admin.smsapi-edit',$row->id)}}">
                            <i class="la la-pencil"></i>
                          </a>
                          <a href="#" data-url="{{route('admin.smsapi-delete',$row->id)}}" class="delete">
                            <i class="la la-trash"></i>
                          </a>
                          
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