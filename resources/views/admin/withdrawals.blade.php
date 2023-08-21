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
											<tr class="success"><td><b>Total Paid Amount</b></td><td><b>&#8358;{{ number_format($paid_withdrawals, 2) }}</b></td></tr>
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
	                                            <th>Action</th>
											</tr>
										</thead>
										<tbody>
											@forelse($transactions as $t)
											<tr>
												<td class="col-md-2">{{ $t->id or '' }}</td>
												<td  class="col-md-1">&#8358;{{ number_format($t->amount, 2) }} <br>
													
												</td>
	                                            <td class="col-md-3">
													<b>Name:</b> <a href="/admin/user/{{ $t->sender }} ">{{ $t->sender_data->name or '' }}</a> <br />
													<b>Withdrawal Method:</b>{{ $t->sender_data->withdrwal_method }}<br />
		                                            <b>Bank:</b> {{ $t->sender_data->bank or '' }} <br />
													<b>Account Number:</b> {{ $t->sender_data->accountno or '' }} <br />
		                                            <b>Phone:</b> {{ $t->sender_data->phone or '' }}
												</td>
												<td class="col-md-2">{{ $t->created_at->toDayDateTimeString() }}</td>
	                                            <td class="col-md-2"><b>
													@if($t->status == 0)
													<span class="label label-warning">Confirmation Requested</span>
													@elseif($t->status == 1)
													<span class="label label-warning">Yielding Interest ({{ $t->days }})</span>
													@elseif($t->status == 2)
													<span class="label label-primary">Payout Requested</span>
													@elseif($t->status == 3)
													<span class="label label-success">Paid</span>
													@else
													<span class="label label-danger">Failed</span>
													@endif
													</b>
												</td>
	                                            <td>
	                                                @if($t->status == 2)
	                                                <a onclick="submitForm(this);" form-id="confirm-payment-form-{{ $t->id }}" form-action="confirm payment of ${{ number_format($t->amount, 2) }}" style="margin-top:5px; margin-bottom:5px;" class="btn btn-sm btn-info">
													    Confirm Payment
													</a>
	                                                <form style="display:none;" id="confirm-payment-form-{{ $t->id }}" class="form" role="form" method="POST" action="{{ url('/confirm_ph') }}">
	            										{{ csrf_field() }}
	            										<input type="hidden" value="{{ $t->id }}" name="transaction" >
	            									</form>
	                                                 @endif
	                                             </td>
											</tr>
											@empty
											<tr>
												<td colspan="6"><center><i>No Payouts Requested</i></center></td>
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
