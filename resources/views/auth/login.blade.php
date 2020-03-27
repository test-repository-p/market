<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('user/logincss.css') }}">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
</head>

<body>
    <div id="formWrapper">
        <a class="navbar-brand" style="margin-right:40px;float:right" href="{{ url('/') }}"> 
            صفحه اصلی
        </a>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div id="form">
                <div class="form-item alert-danger " style="color:red">
                    @error('email')
                   <small>{{ $message }}</small>      
                    @enderror
                </div>
                <div class="form-item alert-danger " style="color:red">
                @error('password')
                <small>{{ $message }}</small>      
                    @enderror
                </div>
                <div class="logo">
                    فرم ورود
                </div>
                <div class="form-item">
                    <p class="formLabel">ایمیل</p>
                    <input type="email" name="email" id="email" class="form-style @error('email') is-invalid @enderror"
                        required autocomplete="email" autofocus autocomplete="off" />
                </div>
                <div class="form-item">
                    <p class="formLabel">پسورد</p>
                    <input type="password" name="password" id="password"
                        class="form-style @error('password') is-invalid @enderror" required
                        autocomplete="current-password" />
                    <p class="p">
                        <small style="margin-right:20px;color:#58bff6 "> {{ __(' مرابه خاطربسپار') }}</small><input
                            class="form-check-input " type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}></p>

                    @if (Route::has('password.request'))
                    <p class="p"><a
                            href="{{ route('password.request') }}"><small>{{ __('فراموشی رمزعبور') }}</small></a></p>
                    @endif
                </div>

                <div class="form-item">
                    <p class="pull-left"><a href="{{ route('register') }}"><small>ثبت نام</small></a></p>
                    <input type="submit" class="login pull-right" value="ورود">

                    <div class="clear-fix"></div>
                    <a href="{{ url('login/google') }}" style="margin-top: 20px;"
                        class="btn btn-lg btn-success btn-block">
                        <small> ورود با گوگل</small>
                    </a>
                    
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('user/loginjs.js') }}"></script>
</body>

</html>