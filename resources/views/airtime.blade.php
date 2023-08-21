@extends('layouts.d_app')

@section('content')
 <script type="text/javascript" language='javascript'>

      function flip() {
          myimage.src = ColorSelect.children[ColorSelect.selectedIndex].getAttribute('url');
          var x =  ColorSelect.children[ColorSelect.selectedIndex].getAttribute('netdis');


      }

      function getInputValue() {
        // Selecting the input element and get its value

        if (document.getElementById("ColorSelect").value == "mtn") {
          var g = 1;
    }
    if (document.getElementById("ColorSelect").value == "glo") {
      var g = 2;
}
if (document.getElementById("ColorSelect").value == "airtel") {
  var g = 2;
}
if (document.getElementById("ColorSelect").value == "9mobile") {
  var g = 2;
}
        // var g = document.getElementById("ColorSelect").netdis;
        var y = document.getElementById("amount").value;

        // Displaying the value
        document.getElementById('dis').value = y/100 * g ;
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
                                Buy Airtime
                            </h2>
                            <p>Wallet Balance: &#8358;{{ number_format( Auth::user()->balance, 2 )}}</p>
                        </div>
             <form class="validate-form" role="form" method="POST" action="/buy_airtime">
                    {{ csrf_field() }}
                 <img id="myimage" src="/img/core-img/logo.png" style="width:70px; height:70px;display:block; margin:7px;">
                 <p>MTN:1%  GLO:2%   Airtel:2%   9Mobile: 2.0% <p>
                 <!-- <p>MTN:3%  GLO:5%   Airtel:3%   9Mobile: 5.0%  </p> -->
 <div> <label>Select Network</label>
     <div class="mt-2">
         <select id="ColorSelect" name="network" onchange="javascript:flip();" class="select2 w-full">
            <option url="img/core-img/logo.png" >Select Network</option>
            @forelse ($airtime as $a)
             <option url="{{$a->url}}" netdis="8" value="{{$a->network}}">{{$a->network}}</option>

             @empty
             @endforelse
         </select>
        </div>

 </div>
     <div class="mt-3">
          <label class="flex flex-col sm:flex-row"> Mobile Number <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Enter Valid Mobile Number</span> </label>
           <input type="tel" name="mobile" class="input w-full border mt-2" placeholder="Enter Mobile Number" required>

         </div>

     <div class="mt-3">
         <label class="flex flex-col sm:flex-row"> Amount <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, integer only & maximum 3 characters</span> </label>
         <input id="amount" oninput="javascript:getInputValue();" min="50" max="25000" type="number" name="amount" class="input w-full border mt-2" placeholder="Enter Amount" required>
         </div><br>
         <input type="hidden" name="endpoint" value="https://vtutopcenter.com/api/products/buyairtime">
         <input type="hidden" name="desc" value="Airtime Topup">
         <p>Discount:</p>
           <input type="" id="dis" value="" name="dis" class="input w-full border mt-2" readonly>


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
@endsection
