

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
                                BAnk Deposit
                            </h2>
                            <p>Wallet Balance: &#8358;<?php echo e(number_format( Auth::user()->balance, 2 ), false); ?></p>
                        </div>




                    <div class="px-5 sm:px-16 py-10 sm:py-20">
                        <div class="overflow-x-auto">
                            <table class="table">
                               <h2 class="text-lg font-medium truncate mr-auto">Our Active Account(s)</h2>
                                <thead>
                                    <tr>
                                        <!-- <th class="border-b-2 whitespace-no-wrap">DESCRIPTION</th> -->

                                        <th class="border-b-2 whitespace-no-wrap">#</th>
                                        <th class="border-b-2 whitespace-no-wrap">Bank</th>
                                        <th class="border-b-2 whitespace-no-wrap">Account Number</th>
                                        <th class="border-b-2 whitespace-no-wrap">Account Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $__empty_1 = true; $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <!-- <td class="border-b">
                                            <div class="font-medium whitespace-no-wrap">Midone HTML Admin Template</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">Regular License</div>
                                        </td> -->

                                         <td class="border-b w-32 font-medium">








                                         <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white"><?php if($t->status == 3): ?>Complete <?php endif; ?></button></td>


        </form>



                                         <td class="border-b w-32 font-medium">&#8358;<?php echo e(number_format($t->amount, 2), false); ?></td>
                                        <td class=" border-b w-32"><?php echo e($t->created_at->toDayDateTimeString(), false); ?></td>
                                        <td class="border-b w-32 font-medium"><?php echo e($t->description, false); ?> <?php if($t->beneficiary !=null): ?> to <?php echo e($t->beneficiary, false); ?> <?php endif; ?></td>


                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <p>No pending transaction,</p>
                                    </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

            <!-- END: Content -->












                    <!-- END: Personal Information -->
        </div><!-- /row -->
    </div>
    </div>
     </body>
      <script type="text/javascript" language='javascript'>
      // place this after <body> to run it after body has loaded.
      var myimage = document.getElementById('myimage');
      var ColorSelect= document.getElementById('ColorSelect');
















	  $(document).ready(calculate());
    $(document).on("keyup", calculate());
 function calculate() {
        var sum = 0;
        $(".totalCal").each(function(){
            sum += +$(this).val();
        });
        $("#total").val(sum);

        document.getElementById('amountToPay').innerHTML = sum.toFixed(2);
        });
    }


$("#amount").keyup(function(){
       	var sub_id="";
       var netwrk=$("#network").val();
		if(netwrk=="mtn"){
		sub_id=4;
		}else if (netwrk=="glo"){
		  sub_id=3;
		}else if (netwrk=="airtel"){
		 sub_id=2;
		}else if (netwrk=="9mobile"){
		  sub_id=1;
		}
		  	var discount="";
		$.post("../enclosed/getDataDiscount.inc",{
			   suggest:sub_id
				},
			    function(data, status){
			discount=data;
			var amount=$("#amount").val();
			discount=amount*discount;
			var amountToPay=amount-discount;
			$("#amountToPay").val(amountToPay);

  		});


		});






		 });

         	 function keyupFunction() {
                document.getElementById("amountToPay").style.backgroundColor = "green";
            }

  </script>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>