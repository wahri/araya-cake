<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <title>{{ $title ?? '' }} | Araya Cake Pekanbaru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Website pesan cake untuk acara seperti Birthday Cake, Custom Cake, dan Cake lainnya" name="description" />
    <meta content="Araya Cake Pekanbaru" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-araya-small.png') }}">

    @yield('style')

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />


</head>


<body>

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('admin.partials.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.partials.sidebar')

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')

            <!-- End Page-content -->

            @include('admin.partials.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>





    @yield('script')
    <script src="{{ asset('assets/js/app.js') }}"></script>


</body>

</html>
