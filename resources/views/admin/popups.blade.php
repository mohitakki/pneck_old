@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Pop Up</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Pop Up</li>
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
                  <h4 class="card-title">Pop Up Data List</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a href="{{route('admin.popup-create')}}"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <th style="display: none"></th>
                         <th style="text-align: center;"> PopUp For </th>
                         <th style="text-align: center;"> PopUp Type </th>
                         <th style="text-align: center;"> PopUp Title </th>
                         <th style="text-align: center;"> PopUp message </th>
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
                        <td>@foreach ($menus as $menu)
                            @if($menu->id ==  $row->popup_for)
                            <a href="{{route('admin.popup-edit',$row->id)}}">{{ucfirst($menu->menu_name)}}</a>
                            @elseif($row->popup_for == '0')
                            <a href="{{route('admin.popup-edit',$row->id)}}">  Default </a>
                            @break
                            @endif
                            @endforeach
                            
                        </td>
                        <td>
                          @foreach($poptypes as $poptype)
                          @if($poptype->id == $row->popup_type)
                            {{ucfirst($poptype->name)}}
                          @endif
                          @endforeach

                        </td>
                        <td>{{$row->popup_title}}</td>
                        <td>{{$row->popup_message}}</td>
                        <td>{{ucfirst($row->username->first_name)}} {{($row->username->last_name)}} </td>
                        <td>@if($row->updated_at != '') {{date('d M, Y (h:i A)', strtotime($row->updated_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($row->created_at))}}
                            @endif
                        </td>
                        <td>@if(($row->status == '1') && ($row->popup_for != '0')) 
                          <a href="#" data-url="{{route('admin.popup-uncheck',$row->id)}}" class="btn btn-success uncheck">
                          Active 
                          </a>
                          @elseif(($row->status == '0') && ($row->popup_for != '0'))
                          <a href="#" data-url="{{route('admin.popup-check',$row->id)}}" class="btn btn-danger check">
                          Inactive 
                          </a>
                          @endif
                        </td>
                        <td>
                          <a href="{{route('admin.popup-edit',$row->id)}}">
                            <i class="la la-pencil"></i>
                          </a>
                          
                          @if(($row->popup_for != '0')) 
                          <a href="#" data-url="{{route('admin.popup-delete',$row->id)}}" class="delete">
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