@extends('layouts.d_app')

@section('content')
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
                                Wallet Funding
                            </h2>
                            <p>Wallet Balance: &#8358;{{ number_format( Auth::user()->balance, 2 )}}</p>
                        </div>



@if ($pending != 0 )
                    <div class="px-5 sm:px-16 py-10 sm:py-20">
                        <div class="overflow-x-auto">
                            <table class="table">
                               <h2 class="text-lg font-medium truncate mr-auto">Pending Transactions</h2>
                                <thead>
                                    <tr>
                                        <!-- <th class="border-b-2 whitespace-no-wrap">DESCRIPTION</th> -->

                                        <th class="border-b-2 whitespace-no-wrap">ACTION</th>
                                        <th class="border-b-2 whitespace-no-wrap">AMOUNT</th>
                                        <th class="border-b-2 whitespace-no-wrap">DATE</th>
                                        <th class="border-b-2 whitespace-no-wrap">DESC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @forelse($pending_trx as $t)
                                    <tr>
                                        <!-- <td class="border-b">
                                            <div class="font-medium whitespace-no-wrap">Midone HTML Admin Template</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">Regular License</div>
                                        </td> -->

                                         <td class="border-b w-32 font-medium">

        <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
        <input type="hidden" name="public_key" value="{{$pub_key}}" />
        <input type="hidden" name="customer[email]" value="{{Auth::user()->email}}" />
        <input type="hidden" name="customer[phone_number]" value="{{Auth::user()->phone}}" />
        <input type="hidden" name="customer[name]" value="{{Auth::user()->name}}" />
        <input type="hidden" name="tx_ref" value="{{$t->id}}" />
        <input type="hidden" name="amount" value="{{ $t->amount }}">
        <input type="hidden" name="currency" value="NGN" />
        <input type="hidden" name="meta[token]" value="54" />
        <input type="hidden" name="redirect_url" value="https://mobilevtuplus.com/dashboard" />






                                         <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white">@if ($t->status == 3)Complete @endif</button></td>


        </form>



                                         <td class="border-b w-32 font-medium">&#8358;{{ number_format($t->amount, 2) }}</td>
                                        <td class=" border-b w-32">{{ $t->created_at->toDayDateTimeString() }}</td>
                                        <td class="border-b w-32 font-medium">{{ $t->description }} @if ($t->beneficiary !=null) to {{ $t->beneficiary }} @endif</td>

                                      </tr>
                                        @empty
                                        <tr>
                                          <td>
                                        <p>No pending transaction</p>
                                      </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>

            <!-- END: Content -->


@endif







             <form class="validate-form" role="form" method="POST" action="/paynew">
                 {{ csrf_field() }}


         <div class="mt-3">

         <label class="flex flex-col sm:flex-row"> Amount <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, integer only & maximum 3 characters</span> </label>
         <input min="1200" type="number" name="amount" class="input w-full border mt-2" placeholder="Enter Amount" required>

         </div>
         <div class="mt-3">
          <select data-hide-search="true" name="method" class="select2 w-full" required>
            <option value="1">Bank Deposit</option>
            <option value="2">Online Payment</option>

            </select>
          </div>
    <br>

         <p id="info">Funding via Bank Deposit or Transfer attracts ₦50 stamp duty on every deposit. And minimum funding is ₦1200 </p>

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
