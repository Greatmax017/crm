@extends('layouts.d_app')

@section('content')
 <script type="text/javascript" language='javascript'>

      function fliper() {
          myinput.value = ColorSelect1.children[ColorSelect1.selectedIndex].getAttribute('price');
      }

      function flip() {

          myimage.src = selectLevel.children[selectLevel.selectedIndex].getAttribute('url');
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
                                BroadBand Data
                            </h2>
                            <p>Wallet Balance: &#8358;{{number_format(Auth::user()->balance, 2)}}</p>
                        </div>
             <form class="validate-form" role="form" method="POST" action="/buy_airtime">
                 {{ csrf_field() }}
                 <input type="hidden" name="endpoint" value="https://vtutopcenter.com/api/products/broadbanddata">
                 <img id="myimage" src="/img/core-img/logo.png" style="width:70px; height:70px;display:block; margin:7px;">

 <div> <label>Select Network</label>
     <div class="mt-2">
         <select id="network" name="network" onchange="javascript:flip();"  class="select2 w-full">
            <option url="img/core-img/logo.png" selected >Select Network</option>
             <option url="img/core-img/smile-logo.jpg" value="">Smile 4g LTE</option>
             <!-- <option url="img/core-img/spectranent-logo.jpg" value="glo">Spectranet 4g LTE</option> -->
         </select>
        </div>

 </div>
 <div> <label>Select Data Bundle</label>
     <div class="mt-2">
         <select id="ColorSelect1" name="plan" onchange="javascript:fliper();" class="select2 w-full">
            <option >Select Data Type</option>
             @forelse($bundle as $t)
             <option price="{{$t->price}}" value="{{$t->code}}">{{$t->name}}</option>
              @empty
              @endforelse


         </select>
        </div>

 </div>
     <div class="mt-3">
          <label class="flex flex-col sm:flex-row"> Device Number <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Enter Valid Device Number</span> </label>
           <input type="number" name="device_number" class="input w-full border mt-2" placeholder="Enter Mobile Number" required>
         </div>

     <div class="mt-3">
         <label class="flex flex-col sm:flex-row"> Amount <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, integer only & maximum 3 characters</span> </label>
         <input id="myinput"  readonly  type="text" name="amount" class="input w-full border mt-2" placeholder=" Amount" required>
         </div><br>
      <input type="hidden" name="desc" value="Broadband">

      <button type="submit" class="button bg-theme-1 text-white mt-5">Purchase</button>
 </form>
                    <!-- END: Personal Information -->
        </div><!-- /row -->
    </div>
    </div>
     </body>


</section>
@endsection
