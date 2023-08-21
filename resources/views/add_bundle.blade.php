@extends('layouts.d_app')

@section('content')
 <script type="text/javascript" language='javascript'>

    function flip() {
          myinput.value = ColorSelect.children[ColorSelect.selectedIndex].getAttribute('price');
          myimage.src = ColorSelect.children[ColorSelect.selectedIndex].getAttribute('url');
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
                               Add New Bundle: 
                            </h2>
                            
                            <p>Wallet Balance: &#8358;0.00</p>
                        </div>
             <form class="validate-form" role="form" method="POST" action="/add_bundle">
                 {{ csrf_field() }}
                <img id="myimage" src="/img/core-img/mtn-logo.jpg" style="width:70px; height:70px;display:block; margin:7px;">
               
                

                
                    <div class="mt-2"> 
               
                </div>
                        
                </div>
 
     <div class="mt-3">
          <label class="flex flex-col sm:flex-row">Bundle Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"> Quantity</span> </label>
           <input type="text" name="name" class="input w-full border mt-2" placeholder="Enter Name" required>
         </div>
         
     <div class="mt-3"> 
         <label class="flex flex-col sm:flex-row"> Code <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> 
         <input   type="text" name="code" class="input w-full border mt-2" placeholder="bundle Code" required>
         </div><br>
         <div class="mt-3"> 
         <label class="flex flex-col sm:flex-row"> Price <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> 
         <input   type="number" name="price" class="input w-full border mt-2" placeholder="bundle Price" required>
         </div><br>
         
     
      <button type="submit" class="button bg-theme-1 text-white mt-5">Add</button>
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
