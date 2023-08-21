<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Alstomfx - Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Alstomfx - You need profits, we know profits" name="description" />
    <meta content="Orlawealth" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/assets/img/alstomfx-logo.png">

    <!-- plugins -->
    <link href="/backend/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo e(asset('backend/assets/css/bootstrap.min.css'), false); ?>" rel="stylesheet" type="text/css">
    <link href="/backend/assets/css/custom/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/frontend/assets/css/font-awesome/css/font-awesome.min.css" >
    <link href="<?php echo e(asset('backend/assets/css/icons.min.css'), false); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('backend/assets/css/app.min.css'), false); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/shepherd/2.0.0-beta.1/css/shepherd-theme-arrows.css" />
    <style>
      .dissapear {
        display: none !important;
      }
    </style>

    <!-- Other Style CSS -->
    <?php echo $__env->yieldContent('custom_css'); ?>



	    <!-- Custom styles for this template -->
	    
	    
		<link rel="stylesheet" href="<?php echo e(url('/asset/css/vex/css/vex.css'), false); ?>" />
	
		<link href="<?php echo e(url('/asset/css/vex/css/vex-theme-wireframe.css'), false); ?>" rel="stylesheet" />
		    

		<!-- Scripts -->
		<script>
			window.Laravel = <?php echo json_encode([
				'csrfToken' => csrf_token(),
			]); ?>;
		</script>
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
<!--End of Tawk.to Script-->
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <?php echo $__env->make('partials.bsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!--====================  heaer area ====================-->
        <?php echo $__env->make('partials.bheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--====================  End of heaer area  ====================-->
        <div class="content-page">
            <div class="content">

                <?php echo $__env->yieldContent('content'); ?>

            </div>

            <!--====================  footer area ====================-->
            <?php echo $__env->make('partials.bfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--====================  End of footer area  ====================-->
        </div>



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
    <script src="/backend/assets/js/pages/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/shepherd/2.0.0-beta.1/js/shepherd.js"></script>


    <!-- App js -->
    <script src="/backend/assets/js/app.min.js"></script>

    <?php echo $__env->yieldContent('javascript'); ?>
  <!-- footer -->





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
</body>



    <!--common script for all pages-->
    <script src="<?php echo e(url('/asset/js/common-scripts.js'), false); ?>"></script>

    <script type="text/javascript" src="<?php echo e(url('/asset/js/gritter/js/jquery.gritter.js'), false); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('/asset/js/gritter-conf.js'), false); ?>"></script>

	<script src="<?php echo e(url('/asset/js/vex/js/vex.combined.min.js'), false); ?>"></script>
	<script src="<?php echo e(url('/asset/js/jquery.countdown.min.js'), false); ?>"></script>
	<script>vex.defaultOptions.className = 'vex-theme-wireframe'</script>
	<script src="<?php echo e(url('/asset/js/app.js'), false); ?>" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('select').each(function(){
                var selected = $(this).attr('value');
                if(selected !== 'undefined'){
                    $(this).val(selected);
                }
            })
        });
    </script>
    <?php if(Request::is('admin/*')): ?>
    <script>
    $(document).ready(function() {
      	$('#summernote').summernote({
          		height: 300,                 // set editor height
          		minHeight: 200,             // set minimum height of editor
          		maxHeight: 600,             // set maximum height of editor
                callbacks: {
                    onImageUpload: function(files, editor, welEditable) {
                                    for (var i = files.length - 1; i >= 0; i--) {
                                        uploadImage(files[i], this);
                                    }
                                }
                            }
      	});

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

	function deleteRowDialog(btn){
		var url = $(btn).attr('data-url');
		var messg = $(btn).attr('data-msg');

		vex.dialog.confirm({
		message: 'Are you sure you want to delete '+ messg +'?',
			callback: function (value) {
				if (value) {
					$(btn).closest('tr').addClass("danger");
					$.ajax({
						url:url,
						dataType:'json',
						data: { _method:'delete' },
						type:'post',
						success: function(response){
							if(response.success){
								$(btn).closest('tr').remove();
							}else {
								$(btn).closest('tr').removeClass("warning");
								vex.dialog.alert(response['error-status']);
							}
						},
						error: function(){
							$(btn).closest('tr').removeClass("warning");
							vex.dialog.alert('Unable to delete '+ messg);
						}
					});
				}
			}
		});
	}


    function uploadImage(file, el) {
        console.log('trying to upload image');
        var form_data = new FormData();
        form_data.append('image',file);
        $.ajax ({
            data: form_data,
            type: "POST",
            url: "<?php echo e(url('/admin/image'), false); ?>",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if(data['status'] == 'success'){
                    $(el).summernote('editor.insertImage',data['url']);
                    vex.dialog.alert('Image Uploaded successfully');
                }else{
                    vex.dialog.alert('Error: Unable to upload image - '+data['message']);
                }
            },
            error: function(){
                vex.dialog.alert('Error: Unable to upload image');
            }
        });
    }
    </script>
    <?php endif; ?>

</html>
