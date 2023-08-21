@extends('layouts.base')
@section("custom_css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@stop

@section('content')

@if (session('address'))
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center>{!! session('address') !!}</center>
            </div>
        </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                <center> {{ session('success-status') }}</center>
            </div>
        </div>
        @endif
<script>
function myFunction() {
  
  var amount = document.getElementById("amount").value;
 
  submitOK = "true";

  

  if (isNaN(amount) || amount < 200000 || amount > 5000000) {
    alert("The minimum investment amount is 200,000 and Maximum is 5,000,000");
    submitOK = "false";
  }

 

  if (submitOK == "false") {
    return false;
  }
}
</script>

<div class="content">
    <div class="container-fluid">
        <div class="mb-0 d-flex justify-content-between align-items-center page-title">
            <div class="h4"><i data-feather="file-text" class="icon-dual"></i> Manage Investments</div>
            
        </div>
           <div id="newSubscription" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">New Investment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="investment-form" action="{{ url('/investment-request') }}" onsubmit="return myFunction()" method="post">
                                    {{ csrf_field() }}
                                     <center>
                                  
                                    <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-check-label"> Enter Amount
                                            <input type="number" id="amount" name="amount" class="form-control" placeholder="&#8358; 200,000 " />
                                        </label>
                                    </div>
                                    </div>
                                      <div class="clearfix"></div><br>
                                    </center>
                                      


                                    <div class="form-group">
                                        <center>
                                            <hr>
                                            <b><span>Min: &#8358;200,000 | Max: &#8358;5,000,000</span> </b>
                                            <hr>
                                        </center>
                                    </div>
                                    <p style="text-align:justify;font-size:12px;">
                                        <b>Note:</b>You will be provided with four methods to deposit/transfer your investment amount,
                                        you are expected to pay within 24hrs or you will need to restart the process.
                                        
                                    </p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button  type="button" class="btn btn-primary" onclick="submitFormById('investment-form');">Proceed</button>
                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
  <!--Skrill modal-->
                    <div id="Skrill" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pay Via Skrill</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="investment-form" action="{{ url('/investment-request') }}" method="post">
                                    {{ csrf_field() }}
                                     <center>
                                  
                                    <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-check-label"> Skrill ID:<br><br>
                                        Alstomfx@gmail.com
                                           
                                        </label>
                                    </div>
                                    </div>
                                      <div class="clearfix"></div><br>
                                    </center>
                                      


                                   
                                    <p style="text-align:justify;font-size:12px;">
                                        <b>Note:</b>You are required to make transfer to the above ID Within 24hrs.
                                    </p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                
                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Skrill Modal-->


                <!--Neteller Modal-->
              
                    <div id="Neteller" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pay Via Neteller</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="investment-form" action="{{ url('/investment-request') }}" method="post">
                                    {{ csrf_field() }}
                                     <center>
                                  
                                    <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-check-label"> Neteller ID:<br><br>
                                        Alstomfx@gmail.com
                                           
                                        </label>
                                    </div>
                                    </div>
                                      <div class="clearfix"></div><br>
                                    </center>
                                      


                                   
                                    <p style="text-align:justify;font-size:12px;">
                                        <b>Note:</b>You are required to make transfer to the above ID Within 24hrs.
                                    </p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                
                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Neteller Modal-->

                  <!--Pm modal-->
                    <div id="PM" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pay Via Perfect Money</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="investment-form" action="{{ url('/investment-request') }}" method="post">
                                    {{ csrf_field() }}
                                     <center>
                                  
                                    <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-check-label"> Perfect Money ID:<br><br>
                                       U25091635
                                           
                                        </label>
                                    </div>
                                    </div>
                                      <div class="clearfix"></div><br>
                                    </center>
                                      


                                   
                                    <p style="text-align:justify;font-size:12px;">
                                        <b>Note:</b>You are required to make transfer to the above ID Within 24hrs.
                                    </p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                
                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of PM Modal-->
        <div class="card mt-0">
            <div class="card-header">
                <div class="h5">My Investents</div>
                <a href="#newSubscription" data-toggle="modal" data-target="#newSubscription" class="btn btn-sm btn-info"><i class="fa fa-plus"></i>New Investment</a> 
            </div>
            <div class="card-body">
                <div class="table-responsive table-data">
                    <table id="transactionTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Worth</th>
                                <th scope="col">Desc</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                              @forelse($active_shares as $t)
                            <tr>
                                <td>{{ substr($t->id, 0, 13) }}</td>
                                <td>&#8358; {{ number_format($t->amount, 2) }}
                                @if($t->status == 0)
                                Pay via <br>
                                <a  href="/make-payment" class="btn btn-sm btn-primary">Bank Transfer/Debit Card</a><br>
                                 <a href="#Skrill" data-toggle="modal" data-target="#Skrill" class="btn btn-sm btn-primary">Skrill</a><br>

                          

                                            <a href="#Neteller" data-toggle="modal" data-target="#Neteller" class="btn btn-sm btn-primary">Neteller</a><br> <a href="#PM" data-toggle="modal" data-target="#PM" class="btn btn-sm btn-primary">Perfect Money</a>
                                @endif
                                </td>
                                <td>&#8358; {{ number_format($t->current_value, 2) }} </td>
                                <td>{{ $t->description }}</td>
                                <td>{{ $t->created_at->toDayDateTimeString() }}</td>
                                <td>
                                    <b>
                                             @if($t->status == 0)
                                            <span class="badge badge-warning">Confirmation Requested</span>
                                            @elseif($t->status == 1)
                                            <span class="badge badge-warning">active ({{ $t->days }})</span>
                                            @elseif($t->status == 2)
                                           <form method="post" action="{{ url('/withdraw/'.$uc->id) }}">
                                                @csrf
                                            <button class="btn btn-sm btn-info" type="submit">Withdraw</button>
                                            </form>
                                            @elseif($t->status == 3)
                                            <span class="badge badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-danger">Failed</span>
                                            @endif
                                    </b>
                                </td>
                            </tr>
                             @empty
                                    <tr>
                                        <td <center><i>No Transactions yet</i></center></td>
                                    </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("javascript")

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="/backend/assets/build/js/intlTelInput.js"></script>
    <script>
        $(document).ready(function () {
            $('#transactionTable').DataTable();
        });

    </script>
 @stop
