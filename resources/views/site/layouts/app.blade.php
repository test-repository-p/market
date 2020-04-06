<!DOCTYPE html>
<html dir="rtl">
    <head>
        @yield('title') 
        @include('site.layouts.head')
        @yield('script')
    </head>
    <body>
    <div class="wrapper-wide">
        
        @include('site.layouts.header')

        <div id="container">
            <div class="container">

                <!-- Breadcrumb Start-->
                @yield('title-content')
                <!-- Breadcrumb End-->

                <div class="row">
                    @yield('aside')
                    @yield('content')
                    @yield('sidebar')   
                </div>

            </div>
        </div>
        @include('site.layouts.footer')
        @include('site.layouts.side-block')
        


    </div>
    @include('site.layouts.footer-script')
    @yield('script-endfooter')

    </body>
