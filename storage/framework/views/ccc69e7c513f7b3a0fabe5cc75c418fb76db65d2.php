<?php $__env->startSection('content'); ?>

<?php echo $__env->make('sections/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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

                                            <h4 class="font-size-20 ng-binding" style="color:#66ff66;">$<?php echo e(number_format(Auth::user()->balance, 2), false); ?></h4>
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
                                            <h4 class="font-size-20 ng-binding" style="color:#66ff66;">$<?php echo e(number_format(Auth::user()->net, 2), false); ?></h4>
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
                                            <h4 class="font-size-20 ng-binding">$<?php echo e(number_format(Auth::user()->bonus, 2), false); ?></h4>
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
                                            <h4 class="font-size-20 ng-binding">$<?php echo e(number_format(Auth::user()->margin, 2), false); ?></h4>
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

                                            <h4 class="font-size-20 ng-binding">0</h4>
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
                                            <h4 class="font-size-20 ng-binding color-f23244" ng-class="{true:&#39;color-f23244&#39;,false:&#39;color-61cb28&#39;}[AccountInfo.floatprofit&gt;=0]">$0.00</h4>
                                            <p class="text-muted mb-0 ng-binding">Floating profit and loss</p>
                                        </div>
                                    </div>

                                    <div class="media mt-4">
                                        <div class="avatar-sm mb-2 mt-2">
                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                <i class="mdi mdi-eye-outline text-primary font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body ps-3">
                                            <h4 class="font-size-20 ng-binding color-f23244" ng-class="{true:&#39;color-f23244&#39;,false:&#39;color-61cb28&#39;}[AccountInfo.profitrate&gt;=0]">0%</h4>
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
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="/#messages-1" role="tab" ng-click="Switchs(&#39;report&#39;)">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Profits Report</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="home-1" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th title="OrderId" class="ng-binding">OrderId</th>
                                            <th title="Login" class="ng-binding">Login</th>
                                            <th title="AccountName" class="ng-binding">AccountName</th>
                                            <th title="Symbol" class="ng-binding">Symbol</th>
                                            <th title="OpenTime" class="ng-binding">OpenTime</th>
                                            <th title="OpenPrice" class="ng-binding">OpenPrice</th>
                                            <th title="CmdName" class="ng-binding">CmdName</th>
                                            <th title="Volume" class="ng-binding">Volume</th>
                                            <th title="CloseTime" class="ng-binding">CloseTime</th>
                                            <th title="ClosePrice" class="ng-binding">ClosePrice</th>
                                            <th title="Commission" class="ng-binding">Commission</th>
                                            <th title="Profit" class="ng-binding">Profit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--cmd不等于6-->
                                        <!-- ngRepeat: pay in NowPos track by $index -->
                                        <!--cmd==6-->
                                        <!-- ngRepeat: pay in NowPos track by $index -->
                                        <!-- ngIf: NowPos.length==0 --><tr ng-if="NowPos.length==0" class="ng-scope">
                                            <td style="text-align: center;" colspan="12" class="ng-binding">no data</td>
                                        </tr><!-- end ngIf: NowPos.length==0 -->

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
                                            <td title="Storage" class="ng-binding">Storage</td>
                                            <td title="Profit" class="ng-binding">Profit</td>
                                            <td title="Number of hands" class="ng-binding">Number of hands</td>
                                            <td title="Trading varieties" class="ng-binding">Trading varieties</td>
                                            <td title="Open the price" class="ng-binding">Open the price</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ngRepeat: pay in NowPos track by $index -->
                                        <!-- ngIf: NowPos.length==0&&!loading_min --><tr ng-if="NowPos.length==0&amp;&amp;!loading_min" class="ng-scope">
                                            <td style="text-align: center;" colspan="8" title="" class="ng-binding">no data</td>
                                        </tr><!-- end ngIf: NowPos.length==0&&!loading_min -->
                                        <!-- ngIf: loading_min -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages-1" role="tabpanel">
                            <!-- ngInclude: '/view/personalCenter/management/History.html' --><div ng-include="&#39;/view/personalCenter/management/History.html&#39;" class="ng-scope"><!--盈利报告-->
<section class="ng-scope">

    <div class="w-section">
        <div class="col-sm-12 col-md-12 col-lg-12 clearfloat mb-4">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <span class="ng-binding">Start Time：</span>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <input class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" type="date" value="" ng-model="repotdata.starttime">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <span class="ng-binding">End Time：</span>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <input class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" type="date" value="" ng-model="repotdata.endtime">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <select class="form-select ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="repotdata.type">
                                <option value="0" class="ng-binding">All</option>
                                <option value="1" class="ng-binding">Year</option>
                                <option value="2" class="ng-binding">Month</option>
                                <option value="3" class="ng-binding">Week</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div type="submit" ng-click="getHistroy()" class="btn btn-info ng-binding">Search</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <!--<th>手数</th>-->
                        <th title="Profit" class="ng-binding">Profit</th>
                        <th title="Maxlots" class="ng-binding">Maxlots</th>
                        <th title="Maxprofit" class="ng-binding">Maxprofit</th>
                        <th title="Maxloss" class="ng-binding">Maxloss</th>
                        <th title="MaxTime" class="ng-binding">MaxTime</th>
                        <th title="ProfitCount" class="ng-binding">ProfitCount</th>
                        <th title="LossCount" class="ng-binding">LossCount</th>
                        <th title="Start Time" class="ng-binding">Start Time</th>
                        <th title="End Time" class="ng-binding">End Time</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ngRepeat: report in repotdata.data track by $index -->
                    <!-- ngIf: !repotdata.data --><tr ng-if="!repotdata.data" class="ng-scope">
                        <!-- ngIf: !repotdata.error --><td ng-if="!repotdata.error" colspan="9" class="ng-binding ng-scope">no data</td><!-- end ngIf: !repotdata.error -->
                        <!-- ngIf: repotdata.error -->
                    </tr><!-- end ngIf: !repotdata.data -->
                </tbody>
            </table>
        </div>
    </div>
</section></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div></div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>