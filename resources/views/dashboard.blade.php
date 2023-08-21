@extends('layouts.app')

@section('content')

@include('sections/sidemenu')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content ng-scope">
    <!-- uiView: --><div ui-view="" class="page-content ng-scope">
<div class="page-title-box ng-scope">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>Dashboard</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Neptune</a></li>
                        <li class="breadcrumb-item active ng-binding">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                    <!-- ngIf: Nomt4!='nomts' --><div ng-if="Nomt4!=&#39;nomts&#39;" class="float-end d-sm-block ng-scope">
                        <a href="/bankdeposit" class="btn btn-success ng-binding">Deposit</a>
                        <a href="/ApplyWithdrawals" class="btn btn-secondary ng-binding">Withdraw</a>
                    </div><!-- end ngIf: Nomt4!='nomts' -->
                    <!-- ngIf: Nomt4 == 'nomts' -->

            </div>
        </div>
    </div>
</div>

<div class="container-fluid ng-scope">

    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">



                        <h4 class="header-title mb-4 float-sm-start">Quick Summary</h4>

                        <div class="clearfix"></div>


                        <div class="row align-items-center">

                            <div class="col-xl-6">
                                <div class="dash-info-widget mt-4 mt-lg-0 py-4 px-3 rounded">

                                    <div class="media dash-main-border pb-2 mt-2">
                                        <div class="avatar-sm mb-3 mt-2">
                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                <i class="mdi mdi-currency-inr text-primary font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body ps-3">

                                            <h4 class="font-size-20 ng-binding" style="color:#66ff66;">${{number_format(Auth::user()->balance, 2)}}</h4>
                                            <p class="text-muted ng-binding">
                                                Balance of assets
                                            </p>

                                        </div>

                                    </div>

                                    <div class="media mt-4 dash-main-border pb-2">
                                        <div class="avatar-sm mb-3 mt-2">
                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                <i class="mdi mdi-credit-card-outline text-primary font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body ps-3">
                                            <h4 class="font-size-20 ng-binding" style="color:#66ff66;">${{number_format(Auth::user()->balance, 2)}}</h4>
                                            <p class="text-muted ng-binding">Net asset value</p>
                                        </div>
                                    </div>



                                    <div class="media mt-4 dash-main-border pb-2">
                                        <div class="avatar-sm mb-2 mt-2">
                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                <i class="mdi mdi-eye-outline text-primary font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body ps-3">
                                            <h4 class="font-size-20 ng-binding">${{number_format(Auth::user()->bonus, 2)}}</h4>
                                            <p class="text-muted mb-0 ng-binding">Commission</p>
                                        </div>
                                    </div>

                                    <div class="media mt-4">
                                        <div class="avatar-sm mb-2 mt-2">
                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                <i class="mdi mdi-account-cash text-primary font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body ps-3">
                                            <h4 class="font-size-20 ng-binding">${{number_format(Auth::user()->balance, 2)}}</h4>
                                            <p class="text-muted mb-0 ng-binding">Available margin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="dash-info-widget mt-4 mt-lg-0 py-4 px-3 rounded">

                                    <div class="media dash-main-border pb-2 mt-2">
                                        <div class="avatar-sm mb-3 mt-2">
                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                <i class="mdi mdi-account-convert text-primary font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body ps-3">

                                            <h4 class="font-size-20 ng-binding">{{Auth::user()->transact}}</h4>
                                            <p class="text-muted ng-binding">
                                                Total number of transactions
                                            </p>

                                        </div>

                                    </div>

                                    <div class="media mt-4 dash-main-border pb-2">
                                        <div class="avatar-sm mb-3 mt-2">
                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                <i class="mdi mdi-book text-primary font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body ps-3">
                                            <h4 class="font-size-20 ng-binding">$0.00</h4>
                                            <p class="text-muted ng-binding">Historical total income</p>
                                        </div>
                                    </div>



                                    <div class="media mt-4 dash-main-border pb-2">
                                        <div class="avatar-sm mb-2 mt-2">
                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                <i class="mdi mdi-eye-outline text-primary font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body ps-3">
                                            <h4 class="font-size-20 ng-binding"  >XAUUSD</h4>
                                            <p class="text-muted mb-0 ng-binding">Most Traded asset</p>
                                        </div>
                                    </div>

                                    <div class="media mt-4">
                                        <div class="avatar-sm mb-2 mt-2">
                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                <i class="mdi mdi-eye-outline text-primary font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body ps-3">
                                            <h4 class="font-size-20 ng-binding color-f23244" ng-class="{true:&#39;color-f23244&#39;,false:&#39;color-61cb28&#39;}[AccountInfo.profitrate&gt;=0]" style="color:#66ff66;">{{number_format($percentage, 2)}}%</h4>
                                            <p class="text-muted mb-0 ng-binding">Total rate of return</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>


        </div>


        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Show Data</h4>

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="/#home-1" role="tab" ng-click="Switchs(&#39;invest&#39;)">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block ng-binding">Current position</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="/#profile-1" role="tab" ng-click="Switchs(&#39;histryOrder&#39;)">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block ng-binding">Historical order</span>
                            </a>
                        </li>
                        <!--<li class="nav-item waves-effect waves-light">-->
                        <!--    <a class="nav-link" data-bs-toggle="tab" href="/#messages-1" role="tab" ng-click="Switchs(&#39;report&#39;)">-->
                        <!--        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>-->
                        <!--        <span class="d-none d-sm-block ng-binding">Profits Report</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="home-1" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th title="OrderId" class="ng-binding">OrderId</th>
                                            
                                            <th title="AccountName" class="ng-binding">Account</th>
                                            <th title="Symbol" class="ng-binding">Symbol</th>
                                            <th title="OpenTime" class="ng-binding">OpenTime</th>
                                            <th title="OpenPrice" class="ng-binding">OpenPrice</th>
                                          
                                            <th title="Volume" class="ng-binding">Volume</th>
                                            
                                       
                                            <th title="Commission" class="ng-binding">side</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--cmd不等于6-->
                                        <!-- ngRepeat: pay in NowPos track by $index -->
                                        <!--cmd==6-->
                                        <!-- ngRepeat: pay in NowPos track by $index -->
                                        <!-- ngIf: NowPos.length==0 -->
                                        @forelse($ongoing_trades as $t)
                                            <tr ng-if="NowPos.length==0&amp;&amp;!loading_min" class="ng-scope">
                                            <td>{{$t->id}}</td>
                                            <td>{{Auth::user()->mt4}}</td>
                                            <td>{{$t->created_at}}</td>
                                            <td>{{$t->symbol}}</td>
                                            <td>{{$t->entry_price}}</td>
                                             <td>{{$t->volume}}</td>
                                            <td>{{$t->side}}</td>
                                            
                                            
                                           
                                            
                                           
                                            
                                            </tr>
                                        @empty
                                        
                                        <tr ng-if="NowPos.length==0" class="ng-scope">
                                            <td style="text-align: center;" colspan="12" class="ng-binding">no data</td>
                                        </tr><!-- end ngIf: NowPos.length==0 -->
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile-1" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <td title="OrderId" class="ng-binding">OrderId</td>
                                            <td title="OpenTime" class="ng-binding">OpenTime</td>
                                            <td title="Type" class="ng-binding">Type</td>
                                            
                                            <td title="Volume" class="ng-binding">Volume</td>
                                            <td title="Open Price" class="ng-binding">Open Price</td>
                                            <td title="Exit Price" class="ng-binding">Exit Price</td>
                                            <td title="Profit" class="ng-binding">Profit</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <!--ngRepeat: pay in NowPos track by $index -->
                                         <!--ngIf: NowPos.length==0&&!loading_min -->
                                        
                                        
                                        
                                        
                                            @forelse($trades as $t)
                                            <tr ng-if="NowPos.length==0&amp;&amp;!loading_min" class="ng-scope">
                                            <td>{{$t->id}}</td>
                                            <td>{{$t->created_at}}</td>
                                            <td>{{$t->side}}</td>
                                            
                                            
                                            <td>{{$t->volume}}</td>
                                            <td>{{$t->entry_price}}</td>
                                            <td>{{$t->exit_price}}</td>
                                            <td>{{$t->profit}}</td>
                                            
                                            </tr>
                                            
                                            
                                            
                                            @empty
                                             <tr ng-if="NowPos.length==0&amp;&amp;!loading_min" class="ng-scope">
                                            <td style="text-align: center;" colspan="8" title="" class="ng-binding">no data</td>
                                               </tr>
                                            @endforelse
                                            
                                            <!-- <tr ng-if="NowPos.length==0&amp;&amp;!loading_min" class="ng-scope">-->
                                            <!--<td style="text-align: center;" colspan="8" title="" class="ng-binding">...trade history not available at this moment, please check back later</td>-->
                                            <!--   </tr>-->
                                       <!-- end ngIf: NowPos.length==0&&!loading_min -->
                                        <!-- ngIf: loading_min -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                       

                </div>
            </div>
        </div>

    </div>
</div></div>

@endsection