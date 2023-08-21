@extends('layouts.d_app')

@section('content')
<body>

	<div id="wrapper">

	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
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




 <!-- BEGIN: Content -->

        <div class="content">

            <h2 class="intro-y text-lg font-medium mt-10">

            </h2>
            <h2 class="intro-y text-lg font-medium mt-10">
               Total downlines:
            </h2>

            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">



                    <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 14 of 14 downlines</div>
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">

                    </div>
                </div>
                <!-- BEGIN: Users Layout -->

                    @forelse($users as $m)
                <div class="intro-y col-span-12 md:col-span-6">
                    <div class="box">
                        <div class="flex flex-col lg:flex-row items-center p-5">
                            <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-12.jpg">
                            </div>
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium">{{$m->name}}</a>
                                <div class="text-gray-600 text-xs">{{$m->email}}</div>
                            </div>
                            <div class="flex mt-4 lg:mt-0">
                                <a href="https://wa.me/{{ $m->phone }}" class="button button--sm text-white bg-theme-1 mr-2">Message</a>
                                <button class="button button--sm text-gray-700 border border-gray-300">referral</button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                                        <p colspan="3"><center><i>You have not referred anyone. share your referral link to get referral bonus</i></center></p>

                @endforelse


                                     <script>  function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Link Copied! ");
} </script>

								@if (Auth::user()->balance > 1)

                                            <input id="myInput" value="{{ url('/register').'?ref='.Auth::user()->phone}}">
                                              <!-- The button used to copy the text -->
                                            <button class="button w-24 mr-1 mb-2 bg-theme-9 text-white" onclick="myFunction()">Copy Link</button>
								@endif
																		                <!-- BEGIN: Users Layout -->
@endsection
