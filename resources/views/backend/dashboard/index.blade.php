@extends('layout.base')

@section("custom_css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

@stop



@section('content')
    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Dashboard</h4>
              
            </div>
            
        </div>

        <!-- content -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold" > <i class="fa fa-money  text-purple"></i>  Dashboard Balance </span>
                                <h2 class="mb-0 my-balance">
                                    
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold "><i class="fa fa-database text-purple"></i> Total profit</span>
                                <h2 class="mb-0 my-profit">
                                    
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold "> <i class="fa fa-database text-purple"></i> Referral Bonus</span>
                                <h2 class="mb-0 my-bonus">
                                    
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold "><i class="fa fa-users text-purple"></i>  Downlines</span>
                                <h2 class="mb-0 my-debtors"> 
                              
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- products -->
        <div class="row">
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-body pt-2">
                      <h5 class="mb-4 header-title text-purple">Recent Transactions</h5>       
                      <div style="display:flex; justify-content:center; text-align:center; width:100%" class='mt-2 mb-3 trans-error'>
                        
                      </div>

                        <div class="table-responsive mt-4 trans-table ">

                            <table class="table table-hover table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody class="my-transactions">
                                    <tr>
                                        <td>1</td>
                                        <td>Deposit</td>
                                        <td>$2000</td>
                                        <td>14/2/2020</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Withdraw</td>
                                        <td>$1000</td>
                                        <td>14/2/2020</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive-->
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->

            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body pt-2">
                        <h5 class="mb-4 header-title text-purple">Recent Downlines</h5>       
                        <div style="display:flex; justify-content:center; text-align:center; width:100%" class='mt-2 mb-3 debts-error'>
                          
                        </div>

                        <div class="table-responsive mt-4 trans-table ">

                            <table class="table table-hover table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Amount Invested</th>
                                        <th scope="col">Your bonus</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody class="my-downlines">
                                    <tr>
                                        <td>1</td>
                                        <td>Felix Deji</td>
                                        <td>$2000</td>
                                        <td>$20</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Peter james</td>
                                        <td>$1000</td>
                                        <td>$10</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive-->

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection

@section("javascript")
   

@stop



