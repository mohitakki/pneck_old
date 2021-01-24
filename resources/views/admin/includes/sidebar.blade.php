
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="active"><a href="{{route('admin.dashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          @php
          $user=Auth::guard('admin')->user();
          $menus=$user->menus;
          $sidebarid=Session('sidebarid');
                 
          @endphp
          
          @if($user->role_type == '1')
        
                @foreach($menus as $menu)
                    @if($menu->menu_parent == '0' &&  $menu->menu_status == '1')
                      <li class=" nav-item"><a href="#"><i class="{{($menu->menu_icon)}}"></i><span class="menu-title" data-i18n="nav.invoice.main">{{$menu->menu_name}}</span></a>
                        
                          @if(count($menu->sub_menus) != '0')
                          <ul>
                            @foreach($menu->sub_menus as $submenu)
                              @if($submenu->menu_status == '1')
                                  <li class="nav-item @if($submenu->id == $sidebarid) active @endif "><a @if($submenu->menu_link != '') href="{{route($submenu->menu_link)}}" @else href="#" @endif><i class="{{( $submenu->menu_icon)}}"></i><span class="menu-title" data-i18n="nav.invoice.main">{{$submenu->menu_name}}</span></a>
                                    @if(count($submenu->sub_menus) != '0')
                                        <ul>
                                            @foreach($submenu->sub_menus as $subsubmenu)
                                                @if($subsubmenu->menu_status == '1')
                                                    <li class="nav-item @if($subsubmenu->id == $sidebarid) active @endif "><a @if($subsubmenu->menu_link != '') href="{{route($subsubmenu->menu_link)}}" @else href="#" @endif><i class="{{($subsubmenu->menu_icon)}}"></i><span class="menu-title" data-i18n="nav.invoice.main">{{$subsubmenu->menu_name}}</span></a>
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
            
                @foreach($user->adminuser_menus as $adminuser_menu)

                    @if($adminuser_menu->menu_parent == '0' &&  $adminuser_menu->menu_status == '1')
                      <li class="nav-item"><a href="#"><i class="{{($adminuser_menu->menu_icon)}}"></i><span class="menu-title" data-i18n="nav.invoice.main">{{$adminuser_menu->menu_name}}</span></a>
                        @if(count($adminuser_menu->adminuser_sub_menus($user->role_type)) != '0')
                          <ul>
                            @foreach($adminuser_menu->adminuser_sub_menus($user->role_type) as $submenu)
                              @if($submenu->menu_status == '1')
                                  <li class="nav-item"><a @if($submenu->menu_link != '') href="{{route($submenu->menu_link)}}" @else href="#" @endif><i class="{{($submenu->menu_icon)}}"></i><span class="menu-title" data-i18n="nav.invoice.main">{{$submenu->menu_name}}</span></a>
                                    @if(count($submenu->adminuser_sub_menus($user->role_type)) != '0')
                                        <ul>
                                            @foreach($submenu->adminuser_sub_menus($user->role_type) as $subsubmenu)
                                                @if($subsubmenu->menu_status == '1')
                                                    <li class=" nav-item"><a @if($subsubmenu->menu_link != '') href="{{route($subsubmenu->menu_link)}}" @else href="#" @endif><i class="{{($subsubmenu->menu_icon)}}"></i><span class="menu-title" data-i18n="nav.invoice.main">{{$subsubmenu->menu_name}}</span></a>
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
          </ul>
      </div>