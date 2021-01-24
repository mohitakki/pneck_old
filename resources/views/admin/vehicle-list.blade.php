@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Backend Data List</h3>-->
           <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Vehicle Types </li>
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
                  <h4 class="card-title">Vehicle Types</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="{{route('admin.add-vehicle-type')}}"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>
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
                         <th style="text-align: center;">  Name </th>
                         <th style="text-align: center;"> Picture </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      <tbody>

                        @foreach ($data as $show)
                            
                      <tr style="text-align:center">
                        <td style="display: none"></td>
                        <td>{{ $show->id }}</td>
                        <td>{{ $show->vehicle_type }}</td>
                        <td>
                          <img src="{{ $show->vehicle_image }}" class="rounded-circle img-border"  alt="Card image" width="50px" height="50px">
                        </td>

                        <td>
                          <a href="{{ route('admin.editVehicleType', $show->id) }}">
                            <i class="la la-pencil"></i>
                          </a>
                        <a href="#" data-url="{{ route('admin.deleteVehicleType', $show->id) }}" class="delete"> 
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
