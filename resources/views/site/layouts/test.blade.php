<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/site/image/favicon.png" rel="icon" />
    @yield('title')
    @include('site.layouts.head')
    @yield('script')
</head>
<body>
    <div class="wrapper-wide">
        @include('site.layouts.header')
        <div id="container">
            <div class="container">
                <div class="row">
                    @include('site.layouts.aside')
                    @yield('content')
                </div>
            </div>
        </div>
        @include('site.layouts.footer')
        @include('site.layouts.sideblock')
    </div>
    @include('site.layouts.footerscript')
</body>
</html>