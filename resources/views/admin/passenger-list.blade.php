@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Backend Data List</h3>-->
           <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Passenger Management</li>
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
                  <h4 class="card-title">Passenger Management</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="{{route('admin.add-passenger')}}"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                         <th style="display: none"></th>
                         <th style="text-align: center;"> ID </th>
                         <th style="text-align: center;"> User Name </th>
                         <th style="text-align: center;"> Email </th>
                         <th style="text-align: center;"> Mobile </th>
                          <th style="text-align: center;"> Joined At </th>
                          <th style="text-align: center;"> Is Verified </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      <tbody>
                        @foreach ($passenger as $item)    
                        <tr style="text-align:center">
                          <td style="display: none"></td>
                          <td>{{1}}</td>
                          <td>{{$item->first_name}} {{ $item->last_name}}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->contact_number}}</td>
                          <td> {{$item->created_at}}</td>
                          @if ($item->is_verified == 1 )
                          <td class="text-success"><b>Verified</b></td>
                          @else
                          <td class="text-danger"><b>Not Verified</b></td>
                          @endif 
                          
                          @if ($item->is_verified == 1 )
                          <td>
                            <a href="#" data-url="#" class=" btn btn-success btn-sm">Approved </a>
                          </td>
                          @else
                          <td>
                            <a href="#" data-url="#" class=" btn btn-danger btn-sm">Not Approved </a>
                          </td>
                          @endif 
                            
                          <td>
                            <a href={{route('admin.single-passenger',$item->id)}}>
                              <i class="la la-pencil"></i>
                            </a>
                          <a  data-url="{{route('admin.delete-passenger',$item->id)}}'"  class="delete "> 
                              <i class="la la-trash"></i>
                            </a>
                          {{-- <a  data-url="{{route('admin.delete-passenger',$item->id)}}" onclick="deletepop2(this)"  class="delete"> 
                              <i class="la la-trash"></i>
                            </a> --}}
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