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
              
			  @if(Auth::user()->isAdmin())
			  <div class="row">
              		<div class="col-md-10 col-md-offset-1">
						 <div class="panel panel-primary">
							<div class="panel-heading">Notification
								<label class="label label-default pull-right">{{ $queue }} Left in queue</label>
							</div>
							<div class="panel-body">
								<form id="notify-form" class="form" role="form" method="POST" action="{{ url('/admin_notify') }}">
								{{ csrf_field() }}

								<div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
									<label class="control-label">Notification Type:</label>
									<select class="form-control" name="type">
										<option value="">-- Select Type --</option>
										<option value="1">SMS Notification</option>
										<option value="2">Email Notification</option>
									</select>
									@if ($errors->has('type'))
									    <span class="label label-danger">
										<strong>{{ $errors->first('type') }}</strong>
									    </span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('bitcoin_wallet_id') ? ' has-error' : '' }}">
									<label class="control-label">Message:</label>
									<textarea name="message"  rows="5" class="form-control"></textarea>
									@if ($errors->has('message'))
									    <span class="label label-danger">
										<strong>{{ $errors->first('message') }}</strong>
									    </span>
									@endif
								</div>


									<div class="form-group">
									    <div class="col-sm-6 col-sm-offset-3">
										<center>
											<a onclick="submitForm(this);" form-id="notify-form" form-action="Send notification to everyone" style="margin-top:20px;" type="submit" class="btn btn-primary">
											    Send
											</a><br />
										</center>
									    </div>
									</div>
							    </form>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
			  @endif
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
