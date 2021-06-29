<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('web.reviewer.layout.header')
    @include('web.reviewer.layout.resources.css')
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">
        @include('web.reviewer.layout.navbar')

        <div class="page-header has-background"
            style="background-image: linear-gradient(rgba(0, 0, 0, .5), #1a1a1a), url({{asset('dist/img/user-background.jpg')}})">
        </div>

        <div class="card social-prof">
            <div class="card-body">
                <div class="wrapper">
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
            @include('web.reviewer.layout.footer')
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('web.reviewer.layout.resources.js')
</body>

</html>