

<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script type="text/javascript" language='javascript'>

       function flip() {
          myinput.value = ColorSelect.children[ColorSelect.selectedIndex].getAttribute('price');
          myimage.src = selectLevel.children[selectLevel.selectedIndex].getAttribute('url');
      }


$(document).ready(function() {

  // Save all selects' id in an array
  // to determine which select's option and value would be changed
  // after you select an option in another select.
  var selectors = ['selectLevel', 'ColorSelect',]

  $('select').on('change', function() {
    var index = selectors.indexOf(this.id)
    var value = this.value

    // check if is the last one or not
    if (index < selectors.length - 1) {
      var next = $('#' + selectors[index + 1])

      // Show all the options in next select
      $(next).find('option').show()
      if (value != "") {
        // if this select's value is not empty
        // hide some of the options
        $(next).find('option[data-value!=' + value + ']').hide()
      }

      // set next select's value to be the first option's value
      // and trigger change()
      $(next).val($(next).find("option:first").val()).change()
    }
  })
});

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
                                Cable Subscription:
                            </h2>
                            <p>Wallet Balance: &#8358;<?php echo e(number_format(Auth::user()->balance, 2), false); ?></p>
                        </div>

             <form class="validate-form" role="form" method="POST" action="/buy_airtime">
                 <?php echo e(csrf_field(), false); ?>

                 <img id="myimage" src="/img/core-img/logo.png" style="width:70px; height:70px;display:block; margin:7px;">

  <input type="hidden" name="endpoint" value="https://vtutopcenter.com/api/products/cabletvs">
 <br>
                <div> <label>Select Cable</label>
                            <div class="mt-2">
                        <select name="network" id="selectLevel" name="network" class="form-control w-full">
                            <option url="img/core-img/logo.png" value="null" selected>-- select a network --</option>
                            <option url="img/core-img/dstv-logo.jpg" value="dstv">DsTv</option>
                            <option url="img/core-img/gotv-logo.png" value="gotv">GoTv</option>
                            <option url="img/core-img/star_times-logo.png" value="startimes">Star times</option>
                        </select>
                    </div>
                </div>
        <input type="hidden" name="desc" value="Cable Tv Subscription">
                <div> <label>Select Data Bundle</label>
                    <div class="mt-2">
                <select name="tv_plan" id="ColorSelect" onchange="javascript:flip();" class="w-full">
                    <option data-value="null" value="" > -- select Data Bundle -- </option>
                    <?php $__empty_1 = true; $__currentLoopData = $bundle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option data-value="<?php echo e($t->network, false); ?>" price="<?php echo e($t->price, false); ?>" value="<?php echo e($t->code, false); ?>"><?php echo e($t->name, false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <option>No Data</option>
                    <?php endif; ?>

                </select>

                </div>

                </div>












     <div class="mt-3">
          <label class="flex flex-col sm:flex-row"> Decoder/IUC Number <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Enter Valid Mobile Number</span> </label>
           <input type="text" name="device_number" class="input w-full border mt-2" placeholder="Enter Dcoder Number" required>
         </div>

     <div class="mt-3">
         <label class="flex flex-col sm:flex-row"> Amount <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, integer only & maximum 3 characters</span> </label>
         <input readonly id="myinput" min="100"  type="number" name="amount" class="input w-full border mt-2" placeholder="Enter Amount" required>
         <input type="hidden" value="30" name="charges">
         <p>Charges: &#8358;30</p>
         </div><br>


      <button type="submit" class="button bg-theme-1 text-white mt-5">Purchase</button>
        <p>Note: Decoder will be activated instantly if you are paying for the existing PACKAGE otherwise, there may be need to call Multichoice or Startimes CUSTOMER CARE for upgrade or downgrade. For instance, if a decoder is on DSTV access and same package is paid for. It works instantly. If you are paying for other package that is different from your existing package, you may need to call Multichoice or Startimes CUSTOMER CARE for upgrade or downgrade.</p>
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