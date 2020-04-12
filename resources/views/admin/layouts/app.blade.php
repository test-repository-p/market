<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @yield('title')
  @include('admin.layouts.head')
  @yield('script-head')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.layouts.header')
  @include('admin.layouts.aside')
  <div class="content-wrapper">
    
      @yield('header-title')
      @yield('content')
      
  </div>
  {{-- @include('admin.layouts.footer') --}}
  @include('admin.layouts.sidebar')
  @yield('modol')
  @yield('script-footer')
@include('admin.layouts.footer-script')
</body>
</html>