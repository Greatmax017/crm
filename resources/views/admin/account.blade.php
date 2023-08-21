@extends('layouts.admapp')

@section('content')
<body>
	<div id="wrapper">
		@include('sections.d_header')
		@include('sections.adminsidebar')
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
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
              <div class="row">
              		<div class="col-md-8 col-md-offset-2">
                    	<div class="panel panel-default">
							<div class="panel-heading">{{$currency}} Account Detail</div>
							<div class="panel-body">
								<div class="table-responsive">
								    
								    @if ($currency == 'usd')
									<table class="table">
										<tbody>
										    <form method="POST" action="/admin/update_account">
										        	{{csrf_field()}}
											<tr><td><b>Account Name:</b> {{$account->usdaccountname}} </td><td><input name="accountname"  type="text" placeholder="enter account name" > <br /> </td></tr>
											<tr><td><b>Account Number:</b>{{$account->usdaccountnumber}}</td><td><b> </b>
                                            <input type="hidden" name="id" value="{{$currency}}">
											<input name="accountnumber"  type="text" placeholder="enter account number" >
											</td></tr>


											<tr><td><b>BIC/SWIFT Code:</b>{{$account->usdswiftcode}}</td><td><input name="swiftcode"  type="text" placeholder="enter swiftcode" ></td></tr>

											<tr><td><b>Bank Name:</b>{{$account->usdbankname}}</td><td><b> </b>
											<input name="bankname"  type="text" placeholder="enter bank name" >
											</td>
										</tr>
										<tr><td><b>Bank Address:</b>{{$account->usdbankaddress}}</td><td><b> </b>
											<input name="bankaddress"  type="text" placeholder="enter bank address" >
											</td>
										</tr>

											
											<tr><td><b>Beneficiary Address:</b>{{$account->usdbenaddress}}</td><td><b></b>
											<input name="benaddress"  type="text" placeholder="enter beneficiary address"></td></tr>
                                            
											
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<button type="submit"  class="btn btn-sm btn-primary">
										    Save all
										</button><br /><br />
									    </div>
									</div>
									</form>
								</div>
								
								@elseif ($currency == 'gbp')
								
								<table class="table">
										<tbody>
										    <form method="POST" action="/admin/update_account">
										        	{{csrf_field()}}
											<tr><td><b>Account Name:</b> {{$account->gbpaccountname}} </td><td><input name="accountname"  type="text" placeholder="enter account name" > <br /> </td></tr>
											<tr><td><b>Account Number:</b>{{$account->gbpaccountnumber}}</td><td><b> </b>
                                            <input type="hidden" name="id" value="{{$currency}}">
											<input name="accountnumber"  type="text" placeholder="enter account number" >
											</td></tr>


											<tr><td><b>BIC/SWIFT Code:</b>{{$account->gbpswiftcode}}</td><td><input name="swiftcode"  type="text" placeholder="enter swiftcode" ></td></tr>

											<tr><td><b>Bank Name:</b>{{$account->gbpbankname}}</td><td><b> </b>
											<input name="bankname"  type="text" placeholder="enter bank name" >
											</td>
										</tr>
										<tr><td><b>Bank Address:</b>{{$account->gbpbankaddress}}</td><td><b> </b>
											<input name="bankaddress"  type="text" placeholder="enter bank address" >
											</td>
										</tr>

											
											<tr><td><b>Beneficiary Address:</b>{{$account->gbpbenaddress}}</td><td><b></b>
											<input name="benaddress"  type="text" placeholder="enter beneficiary address"></td></tr>
                                            
											
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<button type="submit"  class="btn btn-sm btn-primary">
										    Save all
										</button><br /><br />
									    </div>
									</div>
									</form>
								</div>
								
								@else 
								
								<table class="table">
										<tbody>
										    <form method="POST" action="/admin/update_account">
										        	{{csrf_field()}}
											<tr><td><b>Account Name:</b> {{$account->euraccountname}} </td><td><input name="accountname"  type="text" placeholder="enter account name" > <br /> </td></tr>
											<tr><td><b>Account Number:</b>{{$account->euraccountnumber}}</td><td><b> </b>
                                            <input type="hidden" name="id" value="{{$currency}}">
											<input name="accountnumber"  type="text" placeholder="enter account number" >
											</td></tr>


											<tr><td><b>BIC/SWIFT Code:</b>{{$account->eurswiftcode}}</td><td><input name="swiftcode"  type="text" placeholder="enter swiftcode" ></td></tr>

											<tr><td><b>Bank Name:</b>{{$account->eurbankname}}</td><td><b> </b>
											<input name="bankname"  type="text" placeholder="enter bank name" >
											</td>
										</tr>
										<tr><td><b>Bank Address:</b>{{$account->eurbankaddress}}</td><td><b> </b>
											<input name="bankaddress"  type="text" placeholder="enter bank address" >
											</td>
										</tr>

											
											<tr><td><b>Beneficiary Address:</b>{{$account->eurbenaddress}}</td><td><b></b>
											<input name="benaddress"  type="text" placeholder="enter beneficiary address"></td></tr>
                                            
											
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<button type="submit"  class="btn btn-sm btn-primary">
										    Save all
										</button><br /><br />
									    </div>
									</div>
									</form>
								</div>
								
								@endif
								<!--<div class="col-md-6">-->
								<!--	<div class="form-group">-->
								<!--	    <div style="margin-top:20px;" class="col-md-6 text-center">-->
								<!--		<a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">-->
								<!--		    Return back-->
								<!--		</a><br /><br />-->
								<!--	    </div>-->
								<!--	</div>-->
								<!--</div>-->
							</div>
						</div>
							
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
