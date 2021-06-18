<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('web.participant.layout.header')
    @include('web.participant.layout.resources.css')
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">
        @include('web.participant.layout.navbar')

        <div class="page-header has-background"
            style="background-image: linear-gradient(rgba(0, 0, 0, .5), #1a1a1a), url({{asset('dist/img/user-background.jpg')}})">
        </div>

        <div class="card social-prof">
            <div class="card-body">
                <div class="wrapper">
                    <img src="{{asset(Auth::user()->participant->photo)}}" alt="" class="user-profile">
                    <h3>{{ Auth::user()->participant->salutation . ' ' . Str::title(Auth::user()->participant->first_name) }}
                    </h3>
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Notification</h5>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer text-center">
            @include('web.participant.layout.footer')
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('web.participant.layout.resources.js')
</body>

</html>