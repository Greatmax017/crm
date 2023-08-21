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
                <center><?php echo e(session('success-status'), false); ?></center>
            </div>
        </div>
        <?php endif; ?>
      <style>
* {
  box-sizing: border-box;
}

.row {
  display: flex;
}

/* Create three equal columns that sits next to each other */
.column {
  flex: 33.33%;
  padding: 5px;
}
</style>
                                    
                   
            <!-- BEGIN: Personal Information -->
             <div class="flex items-center p-5 border-b border-gray-200">
                            <h2 class="font-medium text-base mr-auto">
                                Select Network
                            </h2>
                            <p>Wallet Balance: &#8358;<?php echo e(number_format(Auth::user()->balance, 2), false); ?></p>
                        </div>
             <form class="validate-form" role="form" method="POST" action="/">
                 <?php echo e(csrf_field(), false); ?>





            <div class="row">
            <div class="column">
                 <a href="/mtn_data">
                                  <img id="myimage" src="/img/core-img/mtn-logo.jpg" style="width:70px; height:70px;display:block; margin:7px;">
                 </a>
            </div>
            <div class="column">
                 <a href="/glo">
                                  <img id="myimage" src="/img/core-img/glo-logo.jpg" style="width:70px; height:70px;display:block; margin:7px;">
                 </a>
            </div>
            <div class="column">
                <a href="/aitel">
                                  <img id="myimage" src="/img/core-img/airtel-logoTwo.png" style="width:70px; height:70px;display:block; margin:7px;">
                 </a>
            </div>
            <div class="column">
                <a href="/ninemobile">
                                  <img id="myimage" src="/img/core-img/ninemobile-logo.png" style="width:70px; height:70px;display:block; margin:7px;">
                 </a>
            </div>

    </div>
                 <p> Check data Baln : MTN SME: *461*4#,    MTN CORP: *460*260#   or *131*4# GLO: #127*0#   AIRTEL: *140#   9MOBILE :*229*9#</p>
 
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