<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link href="dist/images/logo.svg" rel="shortcut icon">
		<meta name="theme-color" content="#f75a5a" />
		<link type="image/x-icon" href="<?php echo e(url('img/core-img/favicon.ico'), false); ?>" rel="icon" />
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
		<title>Mobile VTU Plus |  <?php if(Request::segment(1) == ''): ?> Home <?php else: ?> <?php echo e(ucfirst(Request::segment(1)), false); ?> <?php endif; ?></title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta property="og:url"           content="https://www.mobilevtuplus.com" />
		<meta property="og:type"          content="Mobile VTU Plus" />
		<meta property="og:title"         content="Mobile VTU Plus" />
		<!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->
	 <meta name="viewport" content="width=device-width, initial-scale=1">

		 <?php echo $__env->make('sections.sidebar_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		   <body class="app loading">
      

           
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">MobileVTUPlus</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active"><?php echo e(ucfirst(Request::segment(1)), false); ?></a> </div>
                    <!-- END: Breadcrumb -->

                    <!-- BEGIN: Account Menu -->
                    <div class="side-nav dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="Mobile VTU Plus" src="dist/images/profile-7.jpg">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium"><?php echo e(Auth::user()->username, false); ?></div>
                                    <div class="text-xs text-theme-41"><?php echo e(Auth::user()->name, false); ?></div>
                                </div>
                                <div class="p-2">
                                    <a href="/profile" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                   
                                    <a href="/profile" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
               
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <a href="/logout" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->

	<?php echo $__env->yieldContent('content'); ?>
	 <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script>
        <script src="dist/js/app.js"></script>
		<!-- END: JS Assets-->
	<!-- smooth scrolling -->
<script src="<?php echo e(url('/js/SmoothScroll.min.js'), false); ?>"></script>
<!-- //smooth scrolling -->

<!-- move-top -->
<script src="<?php echo e(url('/js/move-top.js'), false); ?>"></script>
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