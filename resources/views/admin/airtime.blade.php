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
  <div class="modal fade" id="send" role="dialog">
    <div class="modal-dialog">
                <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
         <form class="for-control" role ="form" method="POST" action="/admin/add_bundle" >
		 {{ csrf_field() }}
		 <label> Product Name </label>
		 <input id="text" placeholder="enter Product Name" type="text" name="name" required><br>
         <label> Enter Product newtwork</label>
		 <input id="network" placeholder="enter network" type="text" name="network" required><br>
		 <label> Enter code </label>
		 <input id="text" placeholder="product Code" type="text" name="code" required><br>
		 <label> Amount to send </label>
		 <input id="price" placeholder="enter price" type="number" name="price" required><br>
		 <center><button type="submit">Add Product</button></center>


		 </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

	<!-- Modal -->
  <div class="modal fade" id="discount" role="dialog">
    <div class="modal-dialog">
                <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Discount</h4>
        </div>
        <div class="modal-body">
         <form class="for-control" role ="form" method="POST" action="/admin/discount" >
		 {{ csrf_field() }}
		 <label> Network Name </label>
		 <input id="text" placeholder="Product name i.e mtn" type="text" name="network" required><br>

		 <label> Enter discount </label>
		 <input id="text" placeholder="i.e 5" type="text" name="discount" required><br>

		 <center><button type="submit">Update</button></center>


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
										<tr><td><b>Total Networks</b></td><td><b>{{ $product_count }}</b></td>




									</table>
								</div>
							</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Users</div>
						<div class="panel-body">
							<div class="row">

								</div>
							</div>
							<div style="margin:10px; overflow-x:auto;" class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>S/No</th>


											<th>network</th>


											<th>discount</th>
                                            <th>Action</th>
										</tr>
									</thead>


										@forelse($airtime as $index => $u)
                                                                                         <!-- The Modal -->




										<tr @if($u->suspended) class="danger" @elseif(!$u->activated) class="warning" @endif>
											<td class="col-md-1"><b>{{ $index+1 }}</b></td>


											<td class="col-md-2">
											{{ $u->network }}

                      <form class="form" role="form" method="POST" action="/admin/update_airtime">
                        {{ csrf_field() }}
                        <input type="hidden" class="" id="discount" value="{{$u->id}}" name="id">
											</td>


											<td class="col-md-2">



																								<input type="text" class="" id="discount" value="{{$u->discount}}" name="discount">

											</td>

                                            <td class="col-md-2">

                                            <button type="submit" >Update</button>
                                                </form>

											</td>


										</tr>

										@empty
										<tr>
											<td colspan="2"><center><i>No product exist</i></center></td>
										</tr>


									</tbody>
								</table>



                                @endforelse

							</div>
						</div>
                    </div>
                </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
