<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from masref.netlify.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2021 23:42:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="Mobilevtuplus" content="simple and affordable mobile payments platform">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Mobile VTU plus</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body class="light-version">
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="loader-load"></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <nav class="navbar navbar-expand-md navbar-white fixed-top" id="banner">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="/"><span><img src="img/core-img/logo.png" alt="logo"></span>MobileVtu Plus</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/">Home</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.html">Home</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Services</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/dashboard">Buy Airtime</a>
                            <a class="dropdown-item" href="/dashboard">Buy Data</a>
                            <a class="dropdown-item" href="/dashboard">Cable Subscription</a>
                            <a class="dropdown-item" href="/dashboard">Bills Payment</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                     <a href="dashboard" class="btn login-btn mr-im">Dashboard</a>
                     <?php else: ?>
                    <a href="/login" class=" btn login-btn mr-im">Log in</a>
                    <a href="/register" class=" btn login-btn login-last">Signup </a>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ##### Header Area End ##### -->

    <!-- Login popup form  -->

    <div id="test-popup" class="white-popup mfp-hide">
      <div class="top-form-header">
          <h4>Login Form</h4>
      </div>
      <form method="POST" action="<?php echo e(url('/login'), false); ?>" id="main_login_form">
             <?php echo e(csrf_field(), false); ?>


            <div class="row">

               <div class="col-12 col-md-12">
                    <div class="group">
                        <input type="text" name="email" id="email" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Email</label>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="group">
                        <input type="password" name="password" id="password" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Password</label>
                    </div>
                </div>

                <div class="col-12 col-sm-5 text-left ">
                    <button type="submit" class="btn more-btn">Login</button>
                </div>
                <div class="col-12 col-sm-7 text-left">
                    <p class="mb-0 mt-10">Don't have an account? <a href="#" >Sign up</a></p>
                </div>
            </div>
        </form>


    </div>

    <!-- signup popup form so: -->

    <div id="signup-popup" class="white-popup mfp-hide">
      <div class="top-form-header">
          <h4>Signup Form</h4>
      </div>
      <form method="POST" action="<?php echo e(url('/register'), false); ?>" role="form" id="main_Signup_form" >
          	<?php echo e(csrf_field(), false); ?>

            <div class="row">
                 <div class="col-12 col-md-12">

                    <div class="group">
                        <input type="number" name="phone" id="phone" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Valid Phone Number</label>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="group">
                        <input type="text" name="name" id="name3" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Full Name</label>
                    </div>
                </div>

               <div class="col-12 col-md-12">
                    <div class="group">
                        <input type="text" name="name" id="name4" required="">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Email</label>
                    </div>
                </div>
                 <div class="col-12 col-md-12">
                    <div class="group">
                        <input type="text" name="name" id="name4">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Referal Mobile Number (Optional)</label>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="group">
                        <input type="password" name="name" id="name5" required="">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Password</label>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="group">
                        <input type="password" name="name" id="name6" required="">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Confirm Password</label>
                    </div>
                </div>

                <div class="col-12 col-sm-5 text-left ">
                    <button type="submit" class="btn more-btn">Login</button>
                </div>
                <div class="col-12 col-sm-7 text-left">
                    <p class="mb-0 mt-10">Don't have an account? <a href="#" >Sign up</a></p>
                </div>
            </div>
        </form>


    </div>
                <?php if(auth()->guard()->check()): ?>

                <?php else: ?>

                <?php endif; ?>



<!-- //banner -->

<?php echo $__env->yieldContent('content'); ?>




      <div class="footer-content-area mt-0">
            <div class="container">
                <div class="row ">
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="footer-copywrite-info">
                            <!-- Copywrite -->
                            <div class="copywrite_text fadeInUp" data-wow-delay="0.2s">
                                <div class="footer-logo">
                                    <a href="#"><img src="img/core-img/logo.png" alt="logo"> MobileVtu Plus </a>
                                </div>
                                <p>Subsidiary of EL BIG Laboratory <br> <a href="mailto:info@mobilevtuplus.com"><font color="white"> info@mobilevtuplus.com</font></a> </p>
                            </div>
                            <!-- Social Icon -->
                            <div class="footer-social-info fadeInUp" data-wow-delay="0.4s">
                                 <a href="https://chat.whatsapp.com/K55Z6pcZEJpFh2DyBQEWXj"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                <a href="https://t.me/joinchat/kn7Y5IgENLdjYTE0"> <i class="fa fa-telegram" aria-hidden="true"></i></a>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 col-md-6">
                        <div class="contact_info_area d-sm-flex justify-content-between">
                            <!-- Content Info -->
                            <div class="contact_info mt-x text-center fadeInUp" data-wow-delay="0.3s">
                                <h5>Services</h5>
                                <a href="/dashboard"><p>Data bundle</p></a>
                                <a href="/dashboard"><p>Airtime Topup</p></a>
                                <a href="/dashboard"><p>Bill payment</p></a>
                                <a href="/dashboard"><p>Cable subscription</p></a>
                                <a href="/dashbaord"><p>Bulk sms</p></a>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-12 col-lg-2 col-md-6 "> -->
                        <!-- Content Info -->
                        <!-- <div class="contact_info_area d-sm-flex justify-content-between">
                            <div class="contact_info mt-s text-center fadeInUp" data-wow-delay="0.2s">
                                <h5>NAVIGATE</h5>
                                <a href="/register"><p>Advertisers</p></a>
                                <a href="/register"><p>Developers</p></a>
                                <a href="/register"><p>Resources</p></a>
                                <a href="/register"><p>Company</p></a>
                                <a href="#"><p>Connect</p></a>
                            </div>
                        </div>
                    </div> -->


                    <div class="col-12 col-lg-3 col-md-6 ">
                        <div class="contact_info_area d-sm-flex justify-content-between">
                            <!-- Content Info -->
                            <div class="contact_info mt-s text-center fadeInUp" data-wow-delay="0.4s">
                                <h5>CONTACT US</h5>
                                <p>Ebenezer Anglican Church Unubi., Nnewi South LGA Anambra State.</p>

                                <p>+2349033921429</p>
                                <p>info@mobilevtuplus.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ########## All JS ########## -->
    <!-- jQuery js -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins.js"></script>
    <script src="js/animated.js"></script>
    <!-- Parallax js -->
    <script src="js/dzsparallaxer.html"></script>

    <script src="js/jquery.syotimer.min.js"></script>

    <!-- script js -->
    <script src="js/script.js"></script>

</body>


<!-- Mirrored from masref.netlify.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2021 23:42:57 GMT -->
</html>
