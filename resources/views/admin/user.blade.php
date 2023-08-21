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
							<div class="panel-heading">User Detail</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr><td><b>Full Name</b></td><td> {{ $user->fname or 'none' }} {{ $user->surname or 'none' }}<br /> <a href="/manual/login/{{ $user->id }}" class="btn btn-xs btn-success">Login to account</a></td>
											
											</tr>
											<tr><td><b>One-Click Access</b></td><td> <br /> <a href="https://trade.neptunefx.net/manual/login/{{ $user->id }}" class="btn btn-xs btn-primary">Login to Terminal</a></td></tr>
											<tr><td><b>Email:</b></td><td><b>{{ $user->email }}</b>

												<!-- @if(!$user->suspended)
												<a href="/admin/user/{{ $user->id }}/suspend" class="btn btn-xs btn-danger">Suspend</a>
												@else
												<a  href="/admin/user/{{ $user->id }}/release" class="btn btn-xs btn-success">UnSuspend</a>
												@endif -->
											</td></tr>


											<tr><td><b>Phone:</b></td><td><b>{{ $user->phone or '' }}</b></td></tr>

											<tr><td><b>Account:</b></td><td><b>{{ $user->mt4 or 'none' }}</b>
											<form method="POST" action="/admin/mt4">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="mt4" type="number" placeholder="enter account" required>
												<button type="submit" class="btn btn-xs btn-success">Save</button>
											</form>
											</td>
										</tr>
										<tr><td><b>Account mode:</b></td><td><b>{{ $user->live or 'none' }}</b>
											<form method="POST" action="/admin/mt4password">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="live" type="text" value="{{$user->live}}" required>
												<button type="submit" class="btn btn-xs btn-success">Save</button>
											</form>
											</td>
										</tr>

											
											<tr><td><b>Referred:</b></td><td><b>{{ \App\User::where('referrer_id', $user->id)->count() }}</b></td></tr>
                                            <!-- <tr><td><b>Total Transaction:</b></td><td>${{ number_format(\App\Transaction::where('sender', $user->id)->where('status', 1)->sum('amount'), 2) }}</td></tr> -->
											<tr><td><b>Wallet Balance:</b></td><td>${{ number_format($user->balance, 2) }}
												<form method="POST" action="/admin/balance">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="balance" type="tel" placeholder="enter new balance" required>
												<button type="submit" class="btn btn-xs btn-success">save</button>
											</form>
											</td></tr>
											<tr><td><b>Net Asset:</b></td><td>${{ number_format($user->net, 2) }}
												<form method="POST" action="/admin/net">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="net" type="tel" placeholder="enter new net" required>
												<button type="submit" class="btn btn-xs btn-success">save</button>
											</form>
											</td></tr>
											<tr><td><b>Margin:</b></td><td>${{ number_format($user->margin, 2) }}
												<form method="POST" action="/admin/margin">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="margin" type="text" placeholder="enter new margin" required>
												<button type="submit" class="btn btn-xs btn-success">save</button>
											</form>
											</td></tr>
											<tr><td><b>Commission:</b></td><td>${{ number_format($user->bonus, 2) }}
												<form method="POST" action="/admin/bonus">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="bonus" type="tel" placeholder="enter new commission" required>
												<button type="submit" class="btn btn-xs btn-success">save</button>
											</form>
											</td></tr>
											
											<tr><td><b>Historical total income:</b></td><td>${{ number_format($user->t_income, 2) }}
												<form method="POST" action="/admin/t_income">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="t_income" type="text" placeholder="Total Income" required>
												<button type="submit" class="btn btn-xs btn-success">save</button>
											</form>
											</td></tr>
											
											<tr><td><b>Floating profit and loss:</b></td><td>${{ number_format($user->pnl, 2) }}
												<form method="POST" action="/admin/pnl">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="pnl" type="text" placeholder="Open PnL" required>
												<button type="submit" class="btn btn-xs btn-success">save</button>
											</form>
											</td></tr>
											
											<tr><td><b>Total rate of return %:</b></td><td>{{ number_format($user->return_new, 2) }}
												<form method="POST" action="/admin/return">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="return_new" type="text" placeholder="Return over 100" required>
												<button type="submit" class="btn btn-xs btn-success">save</button>
											</form>
											</td></tr>
											
											<tr><td><b>Number of Transactions:</b></td><td>{{ number_format($user->transact) }}
												<form method="POST" action="/admin/transact">
													{{csrf_field()}}
													<input type="hidden" name="email" value="{{$user->email}}">
													<input name="transact" type="text" placeholder="number of transactions" required>
												<button type="submit" class="btn btn-xs btn-success">save</button>
											</form>
											</td></tr>
											
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<a href="/admin/transactions?search={{ $user->email }}" class="btn btn-sm btn-primary">
										    View Transactions
										</a><br /><br />
									    </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 text-center">
										<a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
										    Return back
										</a><br /><br />
									    </div>
									</div>
								</div>
							</div>
						</div>
							<div class="panel panel-default">
								<div class="panel-heading">Referred Users</div>
								<div class="panel-body">
									<div style="margin:10px; overflow-x:auto;" class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>S/No</th>
													<th>Name</th>
													<th>Email</th>

													<th>Wallet Balance</th>
													@if(Auth::user()->isAdmin())
														<th>Action</th>
													@endif
												</tr>
											</thead>
											<tbody>
												@forelse($users as $index => $u)
												<tr @if($u->suspended) class="danger" @endif>
													<td class="col-md-1"><b>{{ $index+1 }}</b></td>
													<td class="col-md-2"><a href="{{ url('/admin/user/'.$u->id) }}">{{ $u->name }}</a></td>
													<td class="col-md-2">{{ $u->email }}</td>

													<td class="col-md-2">
														<strong>${{ number_format($u->balance, 2) }}</strong>
													</td>
													@if(Auth::user()->isAdmin())
													<td class="col-md-1">
														<a onclick="submitUserForm(this);" id="{{ $u->id }}" class="btn btn-sm btn-primary">
															Save
														</a>
														@if(!$u->isAdmin() && ($u->status_id == 4 || $u->status_id == 5))
														<a onclick="submitForm(this);" form-id="delete-form-{{ $u->id }}" form-action="DELETE this user" class="btn btn-sm btn-primary">
															<i style="color:red;" class="fa fa-trash" aria-hidden="true"></i>
														</a>
														<form id="delete-form-{{ $u->id }}" action="{{ url('/delete_user') }}" method="POST" style="display: none;">
															{{ csrf_field() }}
															<input type="hidden" name="user" value="{{ $u->id }}" />
														</form>
														@endif
													</td>
													@endif
												</tr>
												@empty
												<tr>
													<td colspan="6"><center><i>No users exist</i></center></td>
												</tr>
												@endforelse
											</tbody>
										</table>
										{{ $users->links() }}
									</div>
								</div>
					</div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection