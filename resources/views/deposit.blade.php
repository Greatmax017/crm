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
                                Bank Deposit
                            </h2>
                            <p>Wallet Balance: &#8358;{{ number_format( Auth::user()->balance, 2 )}}</p>
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
                                 @forelse($account as $index => $t)
                                    <tr>
                                        <!-- <td class="border-b">
                                            <div class="font-medium whitespace-no-wrap">Midone HTML Admin Template</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">Regular License</div>
                                        </td> -->

                                         <td class="border-b w-32 font-medium">

             {{$index+1}}</td>


                                         <td class="border-b w-32 font-medium">{{$t->bank}}</td>
                                        <td class=" border-b w-32">{{ $t->number }}</td>
                                        <td class="border-b w-32 font-medium">{{$t->name}}</td>


                                        @empty
                                        <p>No active account</p>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>

            <!-- END: Content -->

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
                                             @forelse($pending_trx as $tr)
                                                <tr>
                                                    <!-- <td class="border-b">
                                                        <div class="font-medium whitespace-no-wrap">Midone HTML Admin Template</div>
                                                        <div class="text-gray-600 text-xs whitespace-no-wrap">Regular License</div>
                                                    </td> -->

                                                     <td class="border-b w-32 font-medium">



                                                      <form action="/paid" method="POST">
                                                        {{csrf_field()}}
                                                        <input name="amount" value="{{$tr->amount}}" type="hidden">
                                                     <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white">@if ($tr->status == 3)Complete @endif</button></td>
                                                   </form>



                                                     <td class="border-b w-32 font-medium">&#8358;{{ number_format($tr->amount, 2) }}</td>
                                                    <td class=" border-b w-32">{{ $tr->created_at->toDayDateTimeString() }}</td>
                                                    <td class="border-b w-32 font-medium">{{ $tr->description }} @if ($tr->beneficiary !=null) to {{ $tr->beneficiary }} @endif</td>


                                                    @empty
                                                    <p>No pending transaction,</p>
                                                </tr>
                                                @endforelse

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
@endsection
