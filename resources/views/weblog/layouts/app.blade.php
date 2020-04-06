<!DOCTYPE html>
<html lang="fa">
<head>
    {{-- @yield('title') --}}
    @include('weblog.layouts.head')
</head>
<body>
    @include('weblog.layouts.header')
    @yield('content')
    @include('weblog.layouts.footer')
    @include('weblog.layouts.footer-script')
</body>
</html>