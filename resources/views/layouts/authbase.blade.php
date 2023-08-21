<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Alstomfx - You need profits, we know profits </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Alstomfx - You need profits, we know profits" name="description" />
    <meta content="Orlawealth" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/assets/img/alstomfx-logo.png">

    <!-- plugins -->
    <link href="/backend/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="/backend/assets/css/custom/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/frontend/assets/css/font-awesome/css/font-awesome.min.css" >
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/shepherd/2.0.0-beta.1/css/shepherd-theme-arrows.css" />
    <style>
      .dissapear {
        display: none !important;
      }
    </style>

    <!-- Other Style CSS -->
    @yield('custom_css')


</head>

<body class="authentication-bg">

    <!-- Begin page -->
    <div id="wrapper">



        @yield('content')



    </div>

    <!-- JS
============================================ -->

    <!-- Vendor js -->
    <script src="/backend/assets/js/vendor.min.js"></script>

    <!-- optional plugins -->
    <script src="/backend/assets/libs/moment/moment.min.js"></script>
    <script src="/backend/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="/backend/assets/libs/flatpickr/flatpickr.min.js"></script>

    <!-- page js -->
    <script src="/backend/assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="/backend/assets/js/app.min.js"></script>

    @yield('javascript')
</body>

</html>
