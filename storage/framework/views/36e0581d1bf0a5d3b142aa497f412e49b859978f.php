<?php $__env->startSection('content'); ?>
 <script type="text/javascript" language='javascript'>

      function flip() {
          myimage.src = ColorSelect.children[ColorSelect.selectedIndex].getAttribute('url');
      }

document.getElementById('amount').value='123333' ; 
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
                                Buy Airtime
                            </h2>
                            <p>Wallet Balance: &#8358;<?php echo e(number_format( Auth::user()->balance, 2 ), false); ?></p>
                        </div>
             <form class="validate-form" role="form" method="POST" action="/buy_airtime">
                    <?php echo e(csrf_field(), false); ?>

                 <img id="myimage" src="/img/core-img/logo.png" style="width:70px; height:70px;display:block; margin:7px;">
                 <!-- <p>MTN:3%  GLO:5%   Airtel:3%   9Mobile: 5.0%  </p> -->
 <div> <label>Select Network</label>
     <div class="mt-2"> 
         <select id="ColorSelect" name="network" onchange="javascript:flip();" class="select2 w-full">
            <option url="img/core-img/logo.png" >Select Network</option>
             <option url="img/core-img/mtn-logo.jpg" value="mtn">MTN</option>
             <option url="img/core-img/glo-logo.jpg" value="glo">GLO</option>
             <option url="img/core-img/airtel-logoTwo.png" value="airtel">AIRTEL</option>
             <option url="img/core-img/ninemobile-logo.png" value="9mobile">9MOBILE</option>
             
         </select> 
        </div>
         
 </div>
     <div class="mt-3">
          <label class="flex flex-col sm:flex-row"> Mobile Number <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Enter Valid Mobile Number</span> </label>
           <input type="tel" name="mobile" class="input w-full border mt-2" placeholder="Enter Mobile Number" required>
         </div>
     
     <div class="mt-3"> 
         <label class="flex flex-col sm:flex-row"> Amount <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, integer only & maximum 3 characters</span> </label> 
         <input id="myInput" min="50" max="25000" type="number" name="amount" class="input w-full border mt-2" placeholder="Enter Amount" required>
         </div><br>
         <input type="hidden" name="endpoint" value="https://vtutopcenter.com/api/products/buyairtime">
         <input type="hidden" name="desc" value="Airtime Topup">
         
         <!-- <p>Amount To Pay:</p>
         <h2 class="flex flex-col sm:flex-row"  id="amount"> 0</h2> 
         <input type="text" value="" name="" id=""> -->
 
      <button type="submit" class="button bg-theme-1 text-white mt-5">Purchase</button>
 </form>
                    <!-- END: Personal Information -->
        </div><!-- /row -->
    </div>
    </div>
     </body>

     
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>