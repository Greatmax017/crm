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
                <div class="alert alert-danger">

                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
                    <b>Error: &nbsp </b> {{ session('error-status') }}
                </div>
            </div>
        @endif
        @if (session('success-status'))
                <div class="alert alert-success">

                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
                    {{ session('success-status') }}
                </div>
            </div>
        @endif



            <!-- BEGIN: Personal Information -->
             <div class="flex items-center p-5 border-b border-gray-200">
                            <h2 class="font-medium text-base mr-auto">
                               Electricity Bill:
                            </h2>

                            <p>Wallet Balance: &#8358;{{number_format(Auth::user()->balance)}}</p>
                        </div>
             <form class="validate-form" role="form" method="POST" action="/buy_airtime">
                 {{ csrf_field() }}
                <input type="hidden" name="endpoint" value="https://vtutopcenter.com/api/products/buyelectricity">
 <div> <label>Select Disco</label>
     <div class="mt-2">
         <select id="ColorSelect" name="disco" class="select2 w-full">
            <option value="">-- Select --</option>


                                    <option value='dc001'>IBEDC Prepaid</option>
                                    <option value='dc002'>IBEDC Postpaid</option>
                                    <option value='dc003'>Ikeja Prepaid</option>
                                    <option value='dc004'>Ikeja Postpaid	</option>
                                    <option value='dc005'>Eko Prepaid</option>
                                    <option value='dc006'>Eko Postpaid</option>
                                    <option value='dc007'>Port Harcourt Prepaid</option>
                                    <option value='dc008'>Port Harcourt Postpaid</option>
                                    <option value='dc009'>Abuja Prepaid</option>
                                    <option value='dc010'>Abuja Postpaid</option>
                                    <option value='dc011'>Enugu Prepaid</option>
                                    <option value='dc012'>Enugu Postpaid</option>
                                    <option value='dc013'>Jos Prepaid</option>
                                    <option value='dc014'>Jos Postpaid	</option>
                                    <option value='dc015'>Kaduna Prepaid</option>
                                    <option value='dc016'>Kaduna Postpaid</option>
                                    <option value='dc017'>Kano Prepaid</option>
                                    <option value='dc018'>Kano Postpaid</option>



             </select>
        </div>

 </div>

     <div class="mt-3">
          <label class="flex flex-col sm:flex-row">Meter Number <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"> Meter Number</span> </label>
           <input type="number" name="meter_number" class="input w-full border mt-2" placeholder="Meter number" required>
         </div>
          <div class="mt-3">
          <label class="flex flex-col sm:flex-row">Customer Mobile Number <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"> Customer Mobile Number</span> </label>
           <input type="number" name="mobile" class="input w-full border mt-2" placeholder="Customer Mobile Number" required>
         </div>
          <div class="mt-3">
          <label class="flex flex-col sm:flex-row">Customer full Number <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"> Customer Name</span> </label>
           <input type="text" name="customer_name" class="input w-full border mt-2" placeholder="Optional Customer Name" >
         </div>
         <div class="mt-3">
          <label class="flex flex-col sm:flex-row">Customer Address <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"> Customer Address</span> </label>
           <input type="text" name="customer_address" class="input w-full border mt-2" placeholder="Optional Customer Address" >
         </div>

     <div class="mt-3">
         <label class="flex flex-col sm:flex-row"> Amount <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, integer only & maximum 3 characters</span> </label>
         <input min="100"  max="25000" type="number" name="amount" class="input w-full border mt-2" placeholder=" Amount" required>
         <input type="hidden" value="80" name="charges">
         <p>Charges: &#8358;80</p>
         </div><br>


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
@endsection
