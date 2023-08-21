@extends('layouts.d_app')

@section('content')
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
        @if (session('error-status'))
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center><b>Error:</b> {{ session('error-status') }}</center>
            </div>
        </div>
        @endif
        @if (session('success-status'))
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center>{{ session('success-status') }}</center>
            </div>
        </div>
        @endif
      
                                    
                   
            <!-- BEGIN: Personal Information -->
             <div class="flex items-center p-5 border-b border-gray-200">
                            <h2 class="font-medium text-base mr-auto">
                               Buy Bulk Mtn Data Bundle
                            </h2>
                            <p>Wallet Balance: &#8358;0.00</p>
                        </div>
             <form class="validate-form" role="form" method="POST" action="/">
                 {{ csrf_field() }}
                 <img id="myimage" src="/img/core-img/mtn-logo.jpg" style="width:70px; height:70px;display:block; margin:7px;">
                 <p>Check data Baln : MTN: *461*4# </p>
 <div> <label>Select Network</label>
 <input type="hidden" name="endpoint" value="https://vtutopcenter.com/api/products/mtndata">
     <div class="mt-2"> 
         <select id="datatype" name="network" onchange="javascript:flip();" class="select2 w-full">
            <option url="img/core-img/logo.png" >Select Data Type</option>
             <option value="133">MTN 3.0GB/30 days SME</option>
             <option value="78">MTN 1.0GB/30days SME</option>
             <option value="77">MTN 2.0GB/30days SME</option>
             <option value="76">MTN 5.0GB/30days SME</option>
             <option value="75">MTN 110GB /30 days Corps</option>
             <option value="74">MTN 20GB /30 days Corps</option>
             <option value="73">MTN 19GB /30 days Corps</option>
             <option value="72">MTN 18GB /30 days Corps</option>
             <option value="71">MTN 40GB/30days Corps</option>
             <option value="70">MTN 2GB/30days Corps</option>
             <option value="69">MTN 1.5GB/30days Corps</option>
             <option value="68">MTN 16GB /30 days Corps</option>
             <option value="67">MTN 9GB /30 days Corps</option>
             <option value="65">MTN 5GB /30 days Corps</option>
             <option value="64">MTN 4GB /30 days  Corps</option>
             <option value="63">MTN 6GB/Weekly Corps</option>
             <option value="62">MTN 7GB /30 days Corps</option>
             <option value="61">MTN 6GB/30days Corps</option>
             <option value="60">MTN 3GB /30 days Corps</option>
             <option value="59">MTN 1GB /30 days  Corps</option>
             <option value="58">MTN 8GB/30days Corps</option>
             <option value="57">MTN 4.5GB/30days Corps</option>
             <option value="56">MTN 10GB/30days Corps</option>
             <option value="55">MTN 15GB/30days Corps</option>
             <option value="54">MTN 75GB/30days Corps</option>
             
         </select> 
        </div>
         
 </div>
     <div class="mt-3">
          <label class="flex flex-col sm:flex-row"> Mobile Numbers separated with commas (,) <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Enter Valid Mobile Number</span> </label>
           <textarea class="input w-full border mt-2" name="phones" placeholder="Input Mobile Numbers separated with commas (,) " minlength="10" required></textarea> </div>
         </div>
     
     <div class="mt-3"> 
         <label class="flex flex-col sm:flex-row"> Amount <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, integer only & maximum 3 characters</span> </label> 
         <input id="amount" min="50" max="25000" type="number" name="amount" class="input w-full border mt-2" placeholder="Enter Amount" required>
         </div><br>
         <input type="hidden" name="amountTopPay" value="" id="amountToPay" >
         <!-- <p>Amount To Pay:</p> -->
         <!-- <p class="flex flex-col sm:flex-row" onkeyup="calculate()" id="amountToPay"> 0</p>  -->
     
      <button type="submit" class="button bg-theme-1 text-white mt-5">Continue</button>
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
@endsection
