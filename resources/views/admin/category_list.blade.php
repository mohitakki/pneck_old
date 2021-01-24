@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Backend Data List</h3>-->
           <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Category</li>
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
                  <h4 class="card-title">Category</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="{{route('admin.category-create')}}"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                         <th style="display: none"></th>
                         <th style="text-align: center;"> Category Name </th>
                         <th style="text-align: center;"> Image </th>
                         <th style="text-align: center;"> Title </th>
                         <th style="text-align: center;"> Code </th>
                         <th style="text-align: center;"> Body </th>
                          <th style="text-align: center;"> Updated Date </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      <tbody>
                      @foreach($data as $row)
                      <tr style="text-align:center">
                        <td style="display: none"></td>
                        <td>{{ucfirst($row->title)}}</td>
                      <td><img src="{{ $row->category_images }}" width="50px" height="50px"></td>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->code }}</td>
                      <td>{{ $row->body }}</td>
                        <td>@if($row->updated_at != '') {{date('d M, Y (h:i A)', strtotime($row->updated_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($row->created_at))}}
                            @endif
                        </td>
                          
                        <td>
                          <a href="{{route('admin.category-edit',$row->id)}}">
                            <i class="la la-pencil"></i>
                          </a>
                          @if($row->status != '1')
                          <a href="#" data-url="{{route('admin.category-delete',$row->id)}}" class="delete"> 
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
