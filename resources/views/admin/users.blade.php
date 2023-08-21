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
				<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Promote a user to Amin</h4>
        </div>
        <div class="modal-body">
         <form class="for-control" role ="form" method="POST" action="/admin/create_admin" >
		 {{ csrf_field() }}

		 <label> Enter User email </label>
		 <input id="emial" placeholder="enter an email" type="email" name="email" required><br>
		 <center><button type="submit">Make Admin</button></center>
		 


		 </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="send" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crypto Wallet Addresses</h4>
        </div>
        <div class="modal-body">
         <form class="for-control" role ="form" method="POST" action="/admin/send_money" >
		 {{ csrf_field() }}

		 <label> USDT TRC20 </label>
		 <input id="phone" placeholder="Paste TRC20 address" value type="text" name="TRC20" ><br>
		 <label> BITCOIN</label>
		 <input id="amount" placeholder="enter BTC address" type="text" name="ERC20" ><br>
		 <center><button type="submit">Save</button></center>


		 </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
              <div class="row">
                <div class="col-md-12">
					  <div class="col-lg-12">
                    	<div class="panel panel-default">
							<div class="panel-heading">Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
										<tr><td><b>Total Users</b></td><td><b>{{ $users_count }}</b></td></tr>
										<tr class="success"><td><b>Active Users</b></td><td><b>{{ $active_users_count }}</b></td></tr>
										<tr class="danger"><td><b>Suspended Users</b></td><td><b>{{ $suspended_users_count }}</b></td></tr>
										<tr class=""><td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Create Admin</button></td>
										 <tr class=""><td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#send">Crypto Wallets</button></tr> 
									</table>
								</div>
							</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Users</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6 col-lg-offset-6">
								<form method="get" action="{{ url('/admin/users') }}">
								    <div class="input-group">
								      <input type="text" name="search" class="form-control" value="{{ app('request')->input('search') }}" placeholder="Name, Email or Phone">
								      <span class="input-group-btn">
									<button class="btn btn-sm btn-default" type="submit">Search</button>
								      </span>
								    </div>
								    </form>
								  </div>
								</div>
							</div>
							<div style="margin:10px; overflow-x:auto;" class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>S/No</th>

											<th>Name</th>
											<th>Email</th>
											<th>Role</th>
											<th>Wallet</th>
										</tr>
									</thead>
									<tbody>
										@forelse($users as $index => $u)
										<tr @if($u->suspended) class="danger" @elseif(!$u->activated) class="warning" @endif>
											<td class="col-md-1"><b>{{ $index+1 }}</b></td>

											<td class="col-md-2">
												<a href="{{ url('/admin/user/'.$u->id) }}">{{ $u->fname }} {{ $u->surname }}</a>
											</td>
											<td class="col-md-2">
											{{ $u->email }}
											</td>
											<td class="col-md-1">
												@if($u->role != 2)
													<span>User</span>
												@else
													<b>Admin</b>
												@endif
											</td>
											<td class="col-md-2">
												<strong>${{ $u->balance }}</strong><br>
											</td>
										</tr>
										@empty
										<tr>
											<td colspan="2"><center><i>No users exist</i></center></td>
										</tr>
										@endforelse
									</tbody>
								</table>
								{{ $users->links() }}
							</div>
						</div>
                    </div>
                </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
