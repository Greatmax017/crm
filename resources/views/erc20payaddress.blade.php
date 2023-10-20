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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Neptune</a></li>
                        <li class="breadcrumb-item active ng-binding">Deposit &amp; Withdraw</li>
                    </ol>
    <div class="page-content-wrapper">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="/bankdeposit" role="tab" ui-sref-active="active" ui-sref="center.manage.BankDeposit">
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
                            <a class="nav-link " data-bs-toggle="tab" href="/records" role="tab" ui-sref-active="active" ui-sref="center.manage.PaymentRecords">
                                <span class="d-block d-sm-none"><i class="fas fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit  Records</span>
                            </a>
                        </li>
                    </ul>

                    <!-- uiView: --><div ui-view="" class="tab-content ng-scope">

                    <section class="mt-5 twitter-bs-wizard ng-scope">
    <div class="w-box sign-in-wr bg-5">

        <!-- ngIf: deposit.stepClass == 'step1' -->

        <!-- ngIf: deposit.stepClass == 'step2' -->

        <!-- ngIf: deposit.stepClass == 'step3' --><div ng-if="deposit.stepClass == &#39;step3&#39;" valid="" id="form-body" class="formdatas ng-scope" novalidate="novalidate">
            <form valid="" id="fomrssd" class="mt-3 ng-pristine ng-valid" name="forms" novalidate="novalidate">
                <!-- ngIf: deposit.moneyType =='WireTransfer' --></form>



                <!-- ngIf: deposit.moneyType !='WireTransfer' --><div ng-if="deposit.moneyType !=&#39;WireTransfer&#39;" class="ng-scope">
                    <div class="clearfloat">
                        <!-- ngIf: deposit.moneyType!='otcpaysdigital_BTC'
                             && deposit.moneyType!='otcpaysdigital_USDT-OMNI'
                             && deposit.moneyType!='otcpaysdigital_USDT-ERC20'
                             && deposit.moneyType!='otcpaysdigital_USDT-TRC20'
                             && deposit.moneyType!='otcpaysdigital_ETH-ERC20'
                             && deposit.moneyType!='otcpaysdigital_DOGE-COIN' -->
                            <div class="mb-3 col-lg-3">

                                <label class="ng-binding">Send {{$trx->network}} to the address below:</label> <br />
                                <label class="mt-3 font-size-14 text-white ng-binding">Wallet Address: @if ($trx->network == 'BTC') {{$a->bitcoin_wallet_id}} @elseif ($trx->network == "ERC20") {{$a->ERC20}} @else {{$a->TRC20}} @endif </label><br>
                                <label class="mt-3 font-size-14 text-white ng-binding">Amount: {{$trx->amount}}</label><br>

                                <form action="/hash" method="POST" role="form">
                                   @csrf
                                    <label class="mt-3 font-size-14 text-white ng-binding">Please paste the transaction hash </label><br> <br>
                                    <input type="text" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" placeholder="paste hash here" name="hash" required>
                                    <input type="hidden" name="id" value="{{$trx->id}}">
                            </div>
                            <div class="mb-3 col-lg-3" style="display: none">
                                <!-- ngIf: deposit.moneyType == 'starpayrmb' -->

                                <!-- ngIf: deposit.moneyType == 'starpayusd' || deposit.moneyType == 'otcpaysusd' --><div class="mt-3 text-danger ng-binding ng-scope" ng-if="deposit.moneyType == &#39;starpayusd&#39; || deposit.moneyType == &#39;otcpaysusd&#39;">
                                    1USD≈0.9756USDT
                                </div><!-- end ngIf: deposit.moneyType == 'starpayusd' || deposit.moneyType == 'otcpaysusd' -->

                                <!-- ngIf: deposit.moneyType == 'starpayeur' || deposit.moneyType == 'starpaycad' || deposit.moneyType == 'starpaygbp' -->

                                <!-- ngIf: deposit.moneyType == 'otcpayseur' || deposit.moneyType == 'otcpayscad' || deposit.moneyType == 'otcpaysgbp' || deposit.moneyType == 'otcpaysaud' -->
                            </div>
                        </div><!-- end ngIf: deposit.moneyType!='otcpaysdigital_BTC'
                             && deposit.moneyType!='otcpaysdigital_USDT-OMNI'
                             && deposit.moneyType!='otcpaysdigital_USDT-ERC20'
                             && deposit.moneyType!='otcpaysdigital_USDT-TRC20'
                             && deposit.moneyType!='otcpaysdigital_ETH-ERC20'
                             && deposit.moneyType!='otcpaysdigital_DOGE-COIN' -->
                        <!-- ngIf: deposit.moneyType=='otcpaysdigital_BTC'
                             || deposit.moneyType=='otcpaysdigital_USDT-OMNI'
                             || deposit.moneyType=='otcpaysdigital_USDT-ERC20'
                             || deposit.moneyType=='otcpaysdigital_USDT-TRC20'
                             || deposit.moneyType=='otcpaysdigital_ETH-ERC20'
                             || deposit.moneyType=='otcpaysdigital_DOGE-COIN' -->
                    </div>

                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                        
                        <li class=""><button type="submit" class="btn btn-primary"> Next <i class="mdi mdi-arrow-right ms-1"></i><!-- end ngIf: true --></button></li>
                    </ul>
                        </form>
                </div><!-- end ngIf: deposit.moneyType !='WireTransfer' -->
            
        </div><!-- end ngIf: deposit.stepClass == 'step3' -->
    </div>

</section>
<!-- ngIf: loading -->
<div class="pay-box ng-scope">
    <div class="box-s">
        <div class="sute">支付成功？</div>
        <div class="suere">
            <a class="color-583bd4 sucess" style="" href="/PaymentRecords">成功</a>
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
@endsection

