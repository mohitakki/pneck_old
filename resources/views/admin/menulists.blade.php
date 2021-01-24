@extends('admin.layout.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('/admin_theme/app-assets/css/plugins/forms/selectivity/selectivity.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/admin_theme/app-assets/vendors/css/forms/selects/selectivity-full.min.css')}}">
@endsection
@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Menu List</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Menu</li>
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
                  <h4 class="card-title">Menu List</h4>
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
                         <th style="text-align: center;"> Menu Name </th>
                         <th style="text-align: center;"> Menu Icon </th>
                         <th style="text-align: center;"> Menu Link </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      @php
                      $i=1;
                      $user=Auth::guard('admin')->user();
                      @endphp
                      <tbody>
                      @foreach($menus as $menu)
                      <tr style="text-align:center">
                        <td style="display: none"></td>
                        <td><a href="#" data-toggle="modal" @if($user->role_type != '1') data-target="#bounceInLeft{{$menu->menu_id}}" @else data-target="#bounceInLeft{{$menu->id}}" @endif>{{$menu->menu_name}}</a></td>
                        <td><i class="{{($menu->menu_icon)}}"></i> </td>
                        <td>{{$menu->menu_link}}</td>
                        <td>
                          @if(($menu->id != '1') && ($menu->id != '5') && ($menu->id != '23'))
                          @if($menu->menu_status == '1')
                          <a href="#" data-url="{{route('admin.menu-uncheck',$menu->id)}}" class="btn btn-success uncheck">
                          Active 
                          </a>
                          @else
                          <a href="#" data-url="{{route('admin.menu-check',$menu->id)}}" class=" btn btn-danger check">
                            Inactive
                          </a> 
                          @endif
                          @endif
                          </td>
                        <td>
                          <a href="#" data-toggle="modal" @if($user->role_type != '1') data-target="#bounceInLeft{{$menu->menu_id}}" @else data-target="#bounceInLeft{{$menu->id}}" @endif>
                            <i class="la la-pencil"></i>
                          </a>
                           
                            @if(($menu->id != '1') && ($menu->id != '5') && ($menu->id != '23'))
                          <a href="#" data-url="{{route('admin.menu-delete',$menu->id)}}" class="delete">
                            <i class="la la-trash"></i>
                          </a>
                          @endif
                          
                        </td>
                      </tr>
                      <div class="modal animated bounceInLeft text-left" @if($user->role_type != '1') id="bounceInLeft{{$menu->menu_id}}" @else id="bounceInLeft{{$menu->id}}" @endif tabindex="-1" role="dialog" aria-labelledby="myModalLabel48" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel48">Edit Menus</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <link rel="stylesheet" type="text/css" href="{{URL::asset('public/admin_theme/app-assets/fonts/line-awesome/css/line-awesome.min.css')}}">
                      <form action="{{route('admin.menu-update')}}" method="post">
                        {{csrf_field()}}
                      <div class="modal-body">
                          <div class="form-group">
                            <label for="projectinput2">Menu Name</label>

                             <input type="text" id="MenuName" name="menu_name" class="form-control"  required autocomplete="off" value="{{$menu->menu_name}}"/>
                             <input type="hidden" id="Menuid" name="id" class="form-control"  required autocomplete="off" value="{{$menu->id}}"/>
                          </div>

                          <div class="form-group">
                              <label for="projectinput2">Menu Icon</label>
                          </div>
                          <div class="form-group">
                               <select class="form-control" required name="menu_icon" style="width:100%">
                              @foreach($menus_icons as $menu_icon)
                                <option value="{{$menu_icon->icons_name}}" @if($menu_icon->icons_name == $menu->menu_icon) selected @endif>
                                    {{$menu_icon->icons_name}}</option>
                              @endforeach  
                               </select>

                          </div>

                          @if(($menu->id != '1') && ($menu->id != '5') && ($menu->id != '23'))
                          <div class="form-group">
                            <label for="projectinput3">Status</label>
                                  <select class="form-control" id="menu_status" required="" name="menu_status">
                                    <option value="0" @if($menu->menu_status == '0') selected @endif>De-Active</option>
                                    <option value="1" @if($menu->menu_status == '1') selected @endif>Active</option>
                                  </select>      
                          </div>
                          @endif
                          
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-outline-primary">Save changes</button>
                      </div>
                    </form>
                    </div>
                    </div>
                  </div>
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
<script src="{{url('/admin_theme/app-assets/vendors/js/forms/select/selectivity-full.min.js')}}"></script>
<script src="{{url('/admin_theme/app-assets/js/scripts/forms/select/form-selectivity.js')}}"></script>
@endsection
@endsection