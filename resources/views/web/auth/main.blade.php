<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('web.auth.layout.header')

    @include('web.auth.layout.resources.css')

    @yield('styles')

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ config('app.url') }}" class="h1"><b>{{ config('app.name') }}</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">@yield('box-msg')</p>
                @yield('content')
            </div>
            <div class="card-footer text-center">
                @if (url()->current() == route('register'))
                <p>
                    <a href="{{route('login')}}">I Already Have a membership</a>
                </p>
                @endif

                @if (url()->current() == route('login'))
                <p>
                    <a href="{{route('password.request')}}" class="text-center">I forgot my password</a>
                </p>
                @endif

                @if (url()->current() == route('login') || url()->current() == route('password.request'))
                <p>
                    <a href="{{route('register')}}" class="text-center">Register a new membership</a>
                </p>
                @endif
                @if (url()->current() == route('password.request'))
                <a>
                    <a href="{{route('login')}}" class="text-center">Login</a>
                </a>
                @endif
            </div>
        </div>
    </div>

    @include('web.auth.layout.resources.js')

    @yield('scripts')
</body>

</html>