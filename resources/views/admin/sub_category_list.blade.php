@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Backend Data List</h3>-->
           <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Sub Category</li>
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
                  <h4 class="card-title">Sub Category</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="{{route('admin.subcategory-create')}}"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>
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
                         <th style="text-align: center;"> Sub Category Name </th>
                         <th style="text-align: center;"> User Name </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      <tbody>
                      @foreach($data as $row)
                      <tr style="text-align:center">
                        <td style="display: none"></td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->subtitle}}</td>
                        <td>
                            @php
                          if(isset($row->username->first_name) && !empty($row->username->first_name)){
                              $first_name = $row->username->first_name;
                            }else{
                            $first_name = '';
                          }
                          if(isset($row->username->last_name) && !empty($row->username->last_name)){
                              $last_name = $row->username->last_name;
                            }else{
                            $last_name = '';
                          }
                      @endphp


                          {{ucfirst($first_name)}} {{($last_name)}} 
                        </td>
                       
                          
                        <td>
                          <a href="{{route('admin.subcategory-edit',$row->id)}}">
                            <i class="la la-pencil"></i>
                          </a>
                          <a href="#" data-url="{{route('admin.subcategory-delete',$row->id)}}" class="delete"> 
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
