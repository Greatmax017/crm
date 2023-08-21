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
              		
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">Pending kyc</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-6 col-lg-offset-6">
										    <form method="GET" action="{{ url('/admin/transactions') }}">
											    <div class="input-group">
											     
											  
											    </div>
										    </form>
										  </div>
										</div>
									</div>

									<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>User</th>
	                                            <th>Email</th>
	                                            <th>ID</th>
												<th>Detail</th>
												
	                                            <th>Action</th>
	                                            
											</tr>
										</thead>
										<tbody>
											@forelse($users as $t)
											<tr>
												<td class="col-md-2">{{ $t->fname }}</td>
												<td  class="col-md-1">
													<b>{{ $t->email }}</b><br>
												</td>
												<td class="col-md-2">{{$t->cardtype}}</a>
												
											
												
												
												
											
												</td>
	                                            
	                                            <td class="col-md-2"><a target="_blank" href="/images/{{$t->cardfront }}">{{ $t->cardfront }}</a><br>
												<a target="_blank" href="/images/{{$t->cardback }}">{{ $t->cardback }}</a>
												</td>
												
	                                            <td class="col-md-2"><b>
												<form method="POST" action="/admin/kyc_approve">
                    {{csrf_field()}}
                
                <input type="hidden" name="id" value="{{$t->id}}" >
                <button type="submit"  class="btn btn-sm btn-primary">
										    Approve
										</button>
										
									    </form>
													
												</td>
	                                            
											</tr>
											@empty
											<tr>
												<td colspan="3"><center><i>No Pending kyc to verify</i></center></td>
											</tr>
											@endforelse
										</tbody>
									</table>
									</div>
								
								</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
