<!doctype html>
<html lang="en">
  <!-- Mirrored from pixner.net/alstomfx/demo// by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Oct 2020 19:02:10 GMT -->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>AlstomFx | <?php if(Request::segment(1) == ''): ?> Home <?php else: ?> <?php echo e(ucfirst(Request::segment(1)), false); ?> <?php endif; ?></title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/odometer.css" />
    <link rel="stylesheet" href="assets/css/nice-select.css" />
    <link rel="stylesheet" href="assets/css/owl.min.css" />
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="assets/css/flaticon.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <link
      rel="shortcut icon"
      href="assets/images/favicon.ico"
      type="image/x-icon"
    />
  </head>

  <body>
    <div class="main--body">
      <!--========== Preloader ==========-->
      <div class="preloader">
        <div class="preloader-wrapper">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
      <div class="overlay"></div>
      <!--========== Preloader ==========-->

      <!--=======Header-Section Starts Here=======-->
      <header class="header-section">
        <div class="header-top">
          <div class="container">
           
          </div>
        </div>
        <div class="header-bottom">
          <div class="container">
            <div class="header-area">
              <div class="logo">
                <a href="/">
                  <img src="assets/images/logo/logo.png" alt="logo" />
                </a>
              </div>
              <ul class="menu">
                <li>
                  <a href="/">Home</a>
                </li>
                <li>
                  <a href="/about">About</a>
                </li>

                <li>
                  <a href="/investment">Investment</a>
                </li>
                <li>
                  <a href="/faq">Faqs</a>
                </li>
                <li>
                  <a href="/contact">Contact</a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                <li>
                  <a href="/dashboard">Login</a>
                </li>
                <li class="pr-0">
                  <a href="/dashboard" class="custom-button">My Account</a>
                </li>
                <?php else: ?>
                <li>
                  <a href="/login">Login</a>
                </li>
                <li class="pr-0">
                  <a href="/register" class="custom-button">Register</a>
                </li>
                <?php endif; ?>
              </ul>
              
            </div>
          </div>
        </div>
      </header>
      <!--=======Header-Section Ends Here=======-->

  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b65662ae21878736ba29e6a/1egnjour7';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

                                <?php if(auth()->guard()->check()): ?>
                               
                                <?php endif; ?>
                            </ul>
                    </div>
                </nav>
                <!-- //navigation -->
            </div>
        </div>
    </header>
    <!-- //header -->
    
</div>
<?php if(auth()->guard()->guest()): ?>

<?php endif; ?>
<!-- //banner -->

<?php echo $__env->yieldContent('content'); ?>



<!-- ==========Footer-Section Starts Here========== -->
      <footer class="footer-section">
        <div class="newslater-section padding-bottom">
          <div class="container">
            <div class="newslater-area">
              <div class="newslater-content padding-bottom padding-top">
                <span class="cate">SUBSCRIBE TO alstomfx</span>
                <h3 class="title">To Get Exclusive Benefits</h3>
                <form class="newslater-form">
                  <input
                    type="text"
                    placeholder="Enter Your Email Here"
                    required
                  />
                  <button type="submit">subscribe</button>
                </form>
              </div>
              <div class="newslater-thumb">
                <img src="assets/images/footer/footer.png" alt="footer" />
                <div class="coin-1">
                  <img src="assets/images/footer/Coin_01.png" alt="footer" />
                </div>
                <div class="coin-2">
                  <img src="assets/images/footer/Coin_02.png" alt="footer" />
                </div>
                <div class="coin-3">
                  <img src="assets/images/footer/Coin_03.png" alt="footer" />
                </div>
                <div class="coin-4">
                  <img src="assets/images/footer/Coin_04.png" alt="footer" />
                </div>
                <div class="coin-5">
                  <img src="assets/images/footer/Coin_05.png" alt="footer" />
                </div>
                <div class="coin-6">
                  <img src="assets/images/footer/Coin_06.png" alt="footer" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="footer-top">
            <div class="logo">
              <a href="/">
                <img src="assets/images/logo/footer-logo.png" alt="logo" />
              </a>
            </div>
            <ul class="links">
              <li>
                <a href="/about">About</a>
              </li>
              
              <li>
                <a href="/investment">Investment</a>
              </li>
              <li>
                <a href="/faq">FAQ</a>
              </li>
              <li>
                <a href="#0">Privacy Policy</a>
              </li>
            </ul>
          </div>
          <div class="footer-bottom">
            <div class="footer-bottom-area">
              <div class="left">
                <p>
                  &copy; 2020 <a href="/">alstomfx</a> | All right reserved
                </p>
              </div>
              <ul class="social-icons">
                <li>
                  <a href="#0">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li>
                  <a href="#0" class="active">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#0">
                    <i class="fab fa-pinterest-p"></i>
                  </a>
                </li>
                <li>
                  <a href="#0">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <!-- ==========Footer-Section Ends Here========== -->
    </div>

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/viewport.jquery.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/owl.min.js"></script>
    <script src="assets/js/paroller.js"></script>
    <script src="assets/js/main.js"></script>
  </body>

		
		<!-- all js here -->

		<!-- jquery latest version -->
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
		<!-- bootstrap js -->
		<script src="js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- magnific js -->
        <script src="js/magnific.min.js"></script>
        <!-- wow js -->
        <script src="js/wow.min.js"></script>
        <!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
		<!-- Form validator js -->
		<script src="js/form-validator.min.js"></script>
		<!-- plugins js -->
		<script src="js/plugins.js"></script>
		<!-- main js -->
		<script src="js/main.js"></script>
	</body>
<!-- footer -->



<!-- //copyright -->


<!-- Js files -->
<!-- JavaScript -->
<script src="<?php echo e(url('/js/jquery-2.2.3.min.js'), false); ?>"></script>
<!-- Default-JavaScript-File -->
<script src="<?php echo e(url('/js/bootstrap.js'), false); ?>"></script>
<!-- Necessary-JavaScript-File-For-Bootstrap -->

<script src="<?php echo e(url('/asset/js/vex/js/vex.combined.min.js'), false); ?>"></script>
<script>vex.defaultOptions.className = 'vex-theme-os'</script>

<!-- flexSlider (for testimonials) -->
<link rel="stylesheet" href="<?php echo e(url('/css/flexslider.css'), false); ?>" type="text/css" media="screen" property="" />
<script defer src="<?php echo e(url('/js/jquery.flexslider.js'), false); ?>"></script>
<script>
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
});
</script>
<!-- //flexSlider (for testimonials) -->

<!-- stats -->
<script src="<?php echo e(url('/js/jquery.waypoints.min.js'), false); ?>"></script>
<script src="<?php echo e(url('/js/jquery.countup.js'), false); ?>"></script>
<script>
$('.counter').countUp();
</script>
<!-- //stats -->

<!-- password-script -->
<?php if(auth()->guard()->guest()): ?>
<script>
window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
}

function validatePassword() {
    var pass2 = document.getElementById("password2").value;
    var pass1 = document.getElementById("password1").value;
    if (pass1 != pass2)
    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
    else
    document.getElementById("password2").setCustomValidity('');
    //empty string means no validation error
}
</script>
<!-- //password-script -->
<?php endif; ?>

<!-- smooth scrolling -->
<script src="<?php echo e(url('/js/SmoothScroll.min.js'), false); ?>"></script>
<!-- //smooth scrolling -->


<!-- easing -->
<script src="<?php echo e(url('/js/easing.js'), false); ?>"></script>
<!--  necessary snippets for few javascript files -->
<script src="<?php echo e(url('/js/district.js'), false); ?>"></script>

<script src="<?php echo e(url('/js/bootstrap.js'), false); ?>"></script>
<!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //Js files -->
<script>
$(document).ready(function(){
    $('select').each(function(){
        var selected = $(this).attr('value');
        if(typeof(selected) !== 'undefined'){
            $(this).val(selected);
        }
    });

    $("#g-inv").keyup(function(e) {
        $("#g-amt").val($(this).val() * 1.3);
    });

    $("#p-inv").keyup(function(e) {
        $("#p-amt").val($(this).val() * 1.5);
    });

    $('#_share_checkbox').click(function(){
        if($(this).prop('checked')){
            $('._share_checkbox').prop('checked', true);
        }else{
            $('._share_checkbox').prop('checked', false);
        }
        select_merge();
    });

    $('._share_checkbox').click(function(){
        $('#_share_checkbox').prop('indeterminate', true);
        select_merge();
    });

    $(".g-clock").each(function(){
        if(parseInt($(this).attr('time-now')) >= parseInt($(this).attr('time'))){
            $(this).text('Drawing...');
            setTimeout(reloadWindow, 120000);
            return;
        }
        $(this).countdown(parseInt($(this).attr('time'))*1000, function(event) {
            $(this).text(
                event.strftime('%H:%M:%S')
            );
        })
        .on('finish.countdown', function(){
            $(this).text('Drawing...');
            setTimeout(reloadWindow, 60000);
        });
    });
});

function reloadWindow(){
    location.reload();
}
function submitForm(btn){
    var formid = $(btn).attr('form-id');
    var message = $(btn).attr('form-action');
    vex.dialog.confirm({
        message: 'Are you sure you want to '+message+'?',
        callback: function (value) {
            if (value) {
                $('#'+formid).submit();
            }
        }
    });
}
function submitFormById(formid, message){
    vex.dialog.confirm({
        message: 'Are you sure you want to '+message+'?',
        callback: function (value) {
            if (value) {
                $('#'+formid).submit();
            }
        }
    });
}
function submitFormById(formid){
    var $form = $('#'+formid);
    if($form[0].checkValidity()) $form.submit();
    else $form[0].reportValidity()
}
</script>
</body>
</html>
