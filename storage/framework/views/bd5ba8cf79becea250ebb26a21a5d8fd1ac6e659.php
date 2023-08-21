

<?php $__env->startSection('content'); ?>
<script src="https://checkout.flutterwave.com/v3.js"></script>
 <script type="text/javascript" language='javascript'>

      function flip() {
          myimage.src = ColorSelect.children[ColorSelect.selectedIndex].getAttribute('url');
      }

    </script>
<body>

	<div id="wrapper">

<!-- Inner Page Header serction end here -->
<section id="main-content" style="background:#eeeeee24;" class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
       <?php if(session('error-status')): ?>
                <div class="alert alert-danger">

                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
                    <b>Error: &nbsp </b> <?php echo e(session('error-status'), false); ?>

                </div>
            </div>
        <?php endif; ?>
        <?php if(session('success-status')): ?>
                <div class="alert alert-success">

                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
                    <?php echo e(session('success-status'), false); ?>

                </div>
            </div>
        <?php endif; ?>





            <!-- BEGIN: Personal Information -->
             <div class="flex items-center p-5 border-b border-gray-200">
                            <h2 class="font-medium text-base mr-auto">
                                Share money
                            </h2>
                            <p>Wallet Balance: &#8358;<?php echo e(number_format( Auth::user()->balance, 2 ), false); ?></p>
                        </div>










             <form class="validate-form" role="form" method="POST" action="/share">
                 <?php echo e(csrf_field(), false); ?>



         <div class="mt-3">

         <label class="flex flex-col sm:flex-row"> Amount <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, integer only & maximum 3 characters</span> </label>
         <input min="100" type="number" name="amount" class="input w-full border mt-2" placeholder="Enter Amount" required>

         </div>
         <div class="mt-3">
         <input type="tel" name="phone" class="input w-full border mt-2" placeholder="Enter User Phone" required>
          </div>
    <br>

         <!-- <p id="info">Funding via Bank Deposit or Transfer attracts ₦50 stamp duty on every deposit. And minimum funding is ₦1200 </p> -->

      <button type="submit" class="button bg-theme-1 text-white mt-5">Share</button>


</form>

                    <!-- END: Personal Information -->
        </div><!-- /row -->
    </div>
    </div>
     </body>


</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>