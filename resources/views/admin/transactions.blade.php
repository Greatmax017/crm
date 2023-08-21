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
              <div class="row">
              		<div class="col-md-12">
						<div class="col-md-12">
	              			<div class="panel panel-default">
								<div class="panel-heading">Statistics</div>
								<div class="panel-body">
									<div class="col-md-12">
										<table class="table table-condensed">
											<tr><td><b>Transactions Count</b></td><td><b>{{ $transactions_count }}</b></td></tr>
											
											<tr><td><b>Transactions Today</b></td><td><b>{{ $transactions_today_count }}</b></td></tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">All Transactions</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-6 col-lg-offset-6">
										    <form method="GET" action="{{ url('/admin/transactions') }}">
											    <div class="input-group">
											      <input type="text" name="search" class="form-control" value="{{ app('request')->input('search') }}" placeholder="Transaction ID or Email">
											      <span class="input-group-btn">
												<button class="btn btn-sm btn-default" type="submit">Search</button>
											      </span>
											    </div>
										    </form>
										  </div>
										</div>
									</div>

									<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
	                                            <th>Amount</th>
	                                            <th>user</th>
												<th>Detail</th>
												<th>Date</th>
	                                            <th>Status</th>
	                                            
											</tr>
										</thead>
										<tbody>
											@forelse($transactions as $t)
											<tr>
												<td class="col-md-2">NFS{{ $t->id or '' }}</td>
												<td  class="col-md-1">
													<b>${{ number_format($t->amount, 2) }}</b><br>
												</td>
												<td class="col-md-2">
												    
												    <a href="{{ url('/admin/user/'.$t->id) }}">{{ $t->id or "" }}</a>
											
												
												
												
												<br><i>{{ $t->description }}</i>
												</td>
	                                            <td class="col-md-3">
	                                            
		                                            <b> Deposit {{ $t->network }} </b><br>
		                                           
		                                           
												</td>
												<td class="col-md-2">{{ $t->created_at->toDayDateTimeString() }}</td>
	                                            <td class="col-md-2"><b>
												{{ $t->status }}
													
												</td>
												<td class="col-md-2"><b>
											    <form method="POST" action="status_update">
											        {{csrf_field()}}
											        <input type="hidden" name="id" value="{{$t->id}}">
												<select class="" name="status">
											
												    <option value="Pending Audit">Pending Audit</option>
												    <option value="Not Audited">Not Audited</option>
												    <option value="Audited">Audited</option>
												    
												</select>
												<button type="submit" class="btn btn-primary">Update</button>
												</form>	
												</td>
	                                            
											</tr>
											@empty
											<tr>
												<td colspan="3"><center><i>No Transactions</i></center></td>
											</tr>
											@endforelse
										</tbody>
									</table>
									</div>
									{{ $transactions->links() }}
								</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
