<?php $__env->startSection('content'); ?>
 <script type="text/javascript" language='javascript'>

      function flip() {
          myinput.value = ColorSelect.children[ColorSelect.selectedIndex].getAttribute('price');
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
                                Buy MTN Data Bundle
                            </h2>
                            <p>Wallet Balance: &#8358;<?php echo e(number_format(Auth::user()->balance, 2), false); ?></p>
                        </div>
             <form class="validate-form" role="form" method="POST" action="/buy_airtime">
                 <?php echo e(csrf_field(), false); ?>

                 <img id="myimage" src="/img/core-img/mtn-logo.jpg" style="width:70px; height:70px;display:block; margin:7px;">
                 <p>MTN SME: *461*4#,    MTN CORP: *460*260#   or *131*4#</p>
 <div> <label>Select Network</label>
 <input type="hidden" name="endpoint" value="https://vtutopcenter.com/api/products/mtndata">
     <div class="mt-2"> 
         <select id="ColorSelect" name="bundle_code" onchange="javascript:flip();" class="select2 w-full">
            <option  >Select Data Bundle</option>
             <?php $__empty_1 = true; $__currentLoopData = $bundle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
             <option price="<?php echo e($t->price, false); ?>" value="<?php echo e($t->code, false); ?>"><?php echo e($t->name, false); ?></option>
             
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
             <option  >No Data Bundle</option>
            <?php endif; ?>
         </select> 
        </div>
         
 </div>
     <div class="mt-3">
          <label class="flex flex-col sm:flex-row"> Mobile Number <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Enter Valid Mobile Number</span> </label>
           <input type="number" name="mobile" class="input w-full border mt-2" placeholder="Enter Mobile Number" required>
         </div>
     
     <div class="mt-3"> 
         <label class="flex flex-col sm:flex-row"> Amount <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, integer only & maximum 3 characters</span> </label> 
         <input readonly id="myinput" min="50" max="25000" type="text" value="" name="amount" class="input w-full border mt-2" placeholder="Enter Amount" required>
         </div><br>
       <input type="hidden" name="desc" value="MTN Data Purchase">
     
      <button type="submit" class="button bg-theme-1 text-white mt-5">Purchase</button>
 </form>
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