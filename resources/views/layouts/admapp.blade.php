<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="theme-color" content="#f75a5a" />
		<link type="image/x-icon" href="{{ url('/favicon.png') }}" rel="icon" />
		<link rel="shortcut icon" href="{{ url('/favicon.png?') }}" type="image/x-icon">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Neptune | Admin</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta property="og:url"           content="" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="" />

		<meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS -->
	    <link href="{{ url('/asset/css/bootstrap.css') }}" rel="stylesheet">
	    <!--external css-->
	    <link href="{{ url('/asset/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
	    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/gritter/css/jquery.gritter.css') }}" />
	    <link rel="stylesheet" type="text/css" href="{{ url('/asset/lineicons/style.css') }}">
        <link rel="stylesheet" href="{{ url('/asset/plugins/summernote-0.8.3/summernote.css') }}">

	    <!-- Custom styles for this template -->
	    <link href="{{ url('/asset/css/dashboard_style.css') }}" rel="stylesheet">
	    <link href="{{ url('/asset/css/style-responsive.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ url('/asset/css/vex/css/vex.css') }}" />
		<link rel="stylesheet" href="{{ url('/asset/css/vex/css/vex-theme-os.css') }}" />
		<link href="{{ url('/asset/css/vex/css/vex-theme-wireframe.css') }}" rel="stylesheet" />

		<!-- Scripts -->
		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
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
	@yield('content')
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ url('/asset/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ url('/asset/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ url('/asset/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ url('/asset/plugins/summernote-0.8.3/summernote.min.js') }}"></script>
    <script src="{{ url('/asset/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="{{ url('/asset/js/common-scripts.js') }}"></script>

    <script type="text/javascript" src="{{ url('/asset/js/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ url('/asset/js/gritter-conf.js') }}"></script>

	<script src="{{ url('/asset/js/vex/js/vex.combined.min.js') }}"></script>
	<script src="{{ url('/asset/js/jquery.countdown.min.js') }}"></script>
	<script>vex.defaultOptions.className = 'vex-theme-wireframe'</script>
	<script src="{{ url('/asset/js/app.js') }}" type="text/javascript"></script>
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
    @if(Request::is('admin/*'))
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
            url: "{{ url('/admin/image') }}",
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
    @endif

</html>
