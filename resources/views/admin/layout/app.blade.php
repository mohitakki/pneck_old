<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
   @php
  $userdata=Auth::guard('admin')->user();
  $general_setting=DB::table('general_settings')->where('status','1')->first();
  @endphp
  <head>
    @include('admin.includes.meta')
    <!-- BEGIN VENDOR CSS-->
    @include('admin.includes.css')
    @yield('css')
    
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
            @include('admin.includes.header')
    </nav>
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
            @include('admin.includes.sidebar')
    </div>
        <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
            
            @yield('content')
      </div>
    </div>
    @include('admin.includes.footer')
    @include('admin.includes.setting')
    @include('admin.includes.js')
     @yield('js')
   
</body>
</html>
