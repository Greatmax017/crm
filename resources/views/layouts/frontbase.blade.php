<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no">
    <meta content="Alstomfx - You need profits, we know profits" name="description" />
    <meta content="Orlawealth" name="author" />
    <title>Alstomfx - You need profits, we know profits</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/assets/img/alstomfx-logo.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="/frontend/assets/css/bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="/frontend/assets/css/font-awesome/css/font-awesome.min.css" >
  	<link href="/frontend/assets/css/custom/style.css" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua+One">
    <!-- Other Style CSS -->
    <style type="text/css">
  		body, html{
  			font-family: "patua one";
		}
  		
  	</style>
    @yield('custom_css')
</head>

<body>


    <!-- Begin page -->
    <!--====================  heaer area ====================-->
    @include('partials.header')
    <!--====================  End of heaer area  ====================-->


    @yield('content')

    <!--====================  footer area ====================-->
    @include('partials.footer')
    <!--====================  End of footer area  ====================-->

    <!-- JS
============================================ -->

    <!-- Core JS here - dont touch -->
    <script src="/frontend/assets/css/bootstrap/js/jquery.min.js"></script>
    <script src="/frontend/assets/css/bootstrap/js/popper.min.js"></script>
    <script src="/frontend/assets/css/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom js-->
    <script src="/frontend/assets/js/header-footer.js"></script>
    <script>
      AOS.init();
    </script>


    @yield('javascript')

</body>

</html>
