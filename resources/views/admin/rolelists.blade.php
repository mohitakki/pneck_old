@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <h3 class="content-header-title mb-0 d-inline-block">Role List</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Role</li>
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
                  <h4 class="card-title">Role List</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <!--<li><a href="{{route('admin.role-create')}}"><button type="button" class="btn btn-info mr-1 add-button">ADD</button></a></li>-->
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <th style="display: none"></th>
                         <th style="text-align: center;"> Role Name</th>
                         <!-- <th style="text-align: center;"> Manage Menu</th> -->
                         <th style="text-align: center;"> Updated Date </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;"> Action </th>                          
                      </thead>
                      @php
                      $i=1;
                      @endphp
                      <tbody>
                      @foreach($roles as $role)
                      <tr style="text-align:center">
                        <td style="display: none"></td>
                        <td><a href="{{route('admin.role-edit',$role->id)}}">{{$role->role_name}} </a> </td>
                        <td>@if($role->updated_at != '') {{date('d M, Y (h:i A)', strtotime($role->updated_at))}}
                            @else
                            {{date('y-m-d h:i', strtotime($role->created_at))}}
                            @endif
                        </td>
                        <td>@if($role->status == '1' && $role->id != '1')
                            <a href="#" data-url="{{route('admin.role-uncheck',$role->id)}}"class=" btn btn-success uncheck">
                            Active 
                            </a>
                          @elseif($role->status != '1' && $role->id != '1')
                            <a href="#" data-url="{{route('admin.role-check',$role->id)}}" class="btn btn-danger check">
                            Inactive
                            </a> 
                          @endif
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#assignrole{{$role->id}}">
                            <i class="la la-eye"></i>
                          </a>
                          <a href="{{route('admin.role-edit',$role->id)}}">
                            <i class="la la-pencil"></i>
                          </a>
                          @if($role->id != '1')
                          <!--<a href="#" data-url="{{route('admin.role-delete',$role->id)}}" class="delete">-->
                          <!--  <i class="la la-trash"></i>-->
                          <!--</a>-->
                          @endif

                        </td>
                      </tr>

                <div class="modal animated bounceInLeft text-left" id="assignrole{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel48" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel48">Assign Roles</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                      	@if($role->id == '1')
                           @foreach($role->menus as $menu)
                                @if(($menu->menu_parent == '0') &&  ($menu->menu_status == '1'))
                                  <li class="nav-item"><span class="menu-title" data-i18n="nav.invoice.main">{{$menu->menu_name}}</span>                                    
                                      @if(count($menu->sub_menus) != '0')
                                      <ul>
                                        @foreach($menu->sub_menus as $submenu)
                                        @if($submenu->menu_status == '1')
                                        <li class="nav-item"><span class="menu-title" data-i18n="nav.invoice.main">{{$submenu->menu_name}}</span>
                                                @if(count($submenu->sub_menus) != '0')
                                                <ul>
                                                    @foreach($submenu->sub_menus as $subsubmenu)
                                                  @if($subsubmenu->menu_status == '1')
                                                  <li class=" nav-item"><span class="menu-title" data-i18n="nav.invoice.main">{{$subsubmenu->menu_name}}</span>
                                                  </li>
                                                  @endif
                                                  @endforeach
                                                </ul>
                                                @endif
                                        </li>
                                        @endif
                                        @endforeach
                                      </ul>
                                      @endif
                                    
                                  </li>
                                @endif
                            @endforeach
                        @else
                        	 @foreach($role->adminuser_menus as $adminuser_menu)
                                @if($adminuser_menu->menu_parent == '0' &&  $adminuser_menu->menu_status == '1')
                                  <li class="nav-item"><span class="menu-title" data-i18n="nav.invoice.main">{{$adminuser_menu->menu_name}}</span>
                                  @if(count($adminuser_menu->adminuser_sub_menus($role->id)) != '0')
                                      <ul>
                                        @foreach($adminuser_menu->adminuser_sub_menus($role->id) as $adminuser_sub_menu)
                                        @if($adminuser_sub_menu->menu_status == '1')
                                        <li class="nav-item"><span class="menu-title" data-i18n="nav.invoice.main">{{$adminuser_sub_menu->menu_name}}</span>
                                                @if(count($adminuser_sub_menu->adminuser_sub_menus($role->id)) != '0')
                                                <ul>
                                                    @foreach($adminuser_sub_menu->adminuser_sub_menus($role->id) as $adminuser_subsubmenu)
                                                  @if($adminuser_subsubmenu->menu_status == '1')
                                                  <li class=" nav-item"><span class="menu-title" data-i18n="nav.invoice.main">{{$adminuser_subsubmenu->menu_name}}</span>
                                                  </li>
                                                  @endif
                                                  @endforeach
                                                </ul>
                                                @endif
                                        </li>
                                        @endif
                                        @endforeach
                                      </ul>
                                  @endif
                                  </li>
                                 @endif
                            @endforeach
                        @endif
                     
                      </div>
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
@endsection
@endsection