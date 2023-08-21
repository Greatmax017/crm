@extends('layouts.d_app')

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
											<tr><td><b>Withdrawals Count</b></td><td><b>{{ $transactions_count }}</b></td></tr>
											<tr><td><b>Withdrawals Today</b></td><td><b>{{ $transactions_today_count }}</b></td></tr>
											<tr class="success"><td><b>Total Paid Amount</b></td><td><b>{{ number_format($paid_withdrawals) }}</b></td></tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">Withdrawal Transactions</div>
								<div class="panel-body">
									<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
	                                            <th>Amount</th>
												<th>Detail</th>
												<th>Date</th>
	                                            <th>Status</th>
											</tr>
										</thead>
										<tbody>
											@forelse($transactions as $t)
											<tr @if($t->status == 1) class="success" @elseif ($t->status == 2) class="danger" @else class="warning" @endif >
												<td class="col-md-2">{{ $t->id or '' }}</td>
												<td  class="col-md-1"><b>{!! $t->receiver_data->currency or $t->sender_data->currency !!}{{ number_format($t->amount) }}</b></td>
	                      <td class="col-md-3"><a href="/admin/user/{{ $t->receiver }}">{{ $t->receiver_data->email or "" }}</a><br><small>{{ $t->receiver_data->name or "" }}</small>
												</td>
												<td class="col-md-2">
                          {{ $t->updated_at->toDayDateTimeString() }}<br><small>{{ $t->created_at->toDayDateTimeString() }}</small>
                        </td>
	                                            <td class="col-md-2"><b>
	                                            	    @if($t->status == 1)
															<span style="color:green;">Completed</span>
														@elseif($t->status == 0)
															<span style="color:orange;">Pending</span>
														@else
															<span style="color:red;">Failed</span>
														@endif
													</b>
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
