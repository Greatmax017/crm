<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sections/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Neptune</a></li>
                        <li class="breadcrumb-item active ng-binding">Deposit &amp; Withdraw</li>
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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" href="#" role="tab" ui-sref-active="active" ui-sref="center.manage.BankDeposit">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link"  href="/ApplyWithdrawals" role="tab" ui-sref-active="active" ui-sref="center.manage.ApplyWithdrawals">
                                <span class="d-block d-sm-none"><i class="fas fa-piggy-bank"></i></span>
                                <span class="d-none d-sm-block ng-binding">Apply For Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link"  href="/withrecord" role="tab" ui-sref-active="active" ui-sref="center.manage.RefundRecords">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Withdraw Records</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" href="/record" role="tab" ui-sref-active="active" ui-sref="center.manage.PaymentRecords">
                                <span class="d-block d-sm-none"><i class="fas fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit  Records</span>
                            </a>
                        </li>
                    </ul>

                    <!-- uiView: --><div ui-view="" class="tab-content ng-scope">

<section class="mt-5 twitter-bs-wizard ng-scope">
    <div class="w-box sign-in-wr bg-5">

        <!-- ngIf: deposit.stepClass == 'step1' --><div ng-if="deposit.stepClass == &#39;step1&#39;" class="ng-scope">
            <div class="row">
                <!--<div class="col-xxl-4 col-lg-6 col-md-12" ng-if="ExistWireTransfer">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="credit-card visa" ng-click="selChannel('WireTransfer')">
                    <div class="type-brand">
                        <h4></h4>
                        <img src="/imgs/paymethod/Commonwealth_Bank_2.jpg" alt="">
                    </div>
                    <div class="cc-number">
                        <h6 class="font-size-16"></h6>
                    </div>
                    <div class="cc-holder-exp">
                        <h5><input class="radios" type="radio" value="WireTransfer" name="Channeltype" id="WireTransfer_radio" ng-model="deposit.channelType" /></h5>
                        <div class="exp"><span>BIC/Swift:</span>&nbsp<strong>CTBAAU2S</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

                <!-- ngIf: ExistWireTransfer -->

                <!-- ngIf: ExistOtcpays --><div class="col-xxl-4 col-lg-6 col-md-12 ng-scope" ng-if="ExistOtcpays">
                    <div class="row">
                        <a href="/payoptions">
                        <div class="col-xl-12 col-lg-12">
                            <div class="credit-card master" ng-click="selChannel(&#39;Otcpays&#39;)">
                                <div class="type-brand">
                                    <h4 class="ng-binding">Online Payment Channel</h4>
                                    <img src="./deposit_files/Otcpays.png" alt="">
                                </div>
                                <div class="cc-number">
                                    <h6 class="font-size-16">Otc Pays</h6>
                                </div>
                                <div class="cc-holder-exp">
                                    <h5><input class="radios ng-pristine ng-untouched ng-valid ng-not-empty" type="radio" value="Otcpays" name="Channeltype" id="otcpays_radio" ng-model="deposit.channelType"></h5>
                                    <div class="exp"><span>USDT</span><strong>BTC</strong></div>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div><!-- end ngIf: ExistOtcpays -->

                <!-- ngIf: ExistSkrill -->

                <!-- ngIf: ExistSticpay -->

            </div>
        </div><!-- end ngIf: deposit.stepClass == 'step1' -->

        <!-- ngIf: deposit.stepClass == 'step2' -->

        <!-- ngIf: deposit.stepClass == 'step3' -->
    </div>
    <a id="posthref" target="_blank" ui-sref="payhtml" href="/paymentpage"></a>
</section>
<!-- ngIf: loading -->
<div class="pay-box ng-scope">
    <div class="box-s">
        <div class="sute">支付成功？</div>
        <div class="suere">
            <a class="color-583bd4 sucess" style="" href="#">成功</a>
            <span>失败</span>
        </div>
    </div>
</div></div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>