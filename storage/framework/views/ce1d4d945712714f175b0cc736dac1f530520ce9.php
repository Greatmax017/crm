<?php $__env->startSection('content'); ?>
<body>

	<div id="wrapper">
		
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
        <?php if(session('error-status')): ?>
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center><b>Error:</b> <?php echo e(session('error-status'), false); ?></center>
            </div>
        </div>
        <?php endif; ?>
        <?php if(session('success-status')): ?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center> <?php echo e(session('success-status'), false); ?></center>
            </div>
        </div>
        <?php endif; ?>




 <!-- BEGIN: Content -->
  
        <div class="content">
            
            <h2 class="intro-y text-lg font-medium mt-10">
                
            </h2>
            <h2 class="intro-y text-lg font-medium mt-10">
               Total downlines: 
            </h2>

            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                     
                    
                    
                    <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 14 of 14 downlines</div>
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        
                    </div>
                </div>
                <!-- BEGIN: Users Layout -->

                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="intro-y col-span-12 md:col-span-6">
                    <div class="box">
                        <div class="flex flex-col lg:flex-row items-center p-5">
                            <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-12.jpg">
                            </div>
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium"><?php echo e($m->name, false); ?></a> 
                                <div class="text-gray-600 text-xs"><?php echo e($m->email, false); ?></div>
                            </div>
                            <div class="flex mt-4 lg:mt-0">
                                <a href="https://wa.me/<?php echo e($m->phone, false); ?>" class="button button--sm text-white bg-theme-1 mr-2">Message</a>
                                <button class="button button--sm text-gray-700 border border-gray-300">referral</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    
                                        <p colspan="3"><center><i>You have not referred anyone. share your referral link to get referral bonus</i></center></p>
                                    
                                    <?php endif; ?>


                                     <script>  function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Link Copied! ");
} </script>


 
                                            <input id="myInput" value="<?php echo e(url('/register').'?ref='.Auth::user()->phone, false); ?>">
                                              <!-- The button used to copy the text -->
                                            <button class="button w-24 mr-1 mb-2 bg-theme-9 text-white" onclick="myFunction()">Copy Link</button>
                <!-- BEGIN: Users Layout -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>