<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('web.layout.resources.css')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>{{ config('app.name', 'ICEMINE') }}</b></a>
            </div>
            <div class="card-body text-center">
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
        <!-- /.card -->
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>