@extends('layouts.app')

@section('content')
@include('sections/sidemenu')

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
                            <a class="nav-link"  href="bankdeposit" role="tab" ui-sref-active="active" ui-sref="center.manage.BankDeposit">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" href="/ApplyWithdrawals" role="tab" ui-sref-active="active" ui-sref="center.manage.ApplyWithdrawals">
                                <span class="d-block d-sm-none"><i class="fas fa-piggy-bank"></i></span>
                                <span class="d-none d-sm-block ng-binding">Apply For Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active"  href="/withrecord" role="tab" ui-sref-active="active" ui-sref="center.manage.RefundRecords">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Withdraw Records</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link " href="/record" role="tab" ui-sref-active="active" ui-sref="center.manage.PaymentRecords">
                                <span class="d-block d-sm-none"><i class="fas fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit  Records</span>
                            </a>
                        </li>
                    </ul>

                    <!-- uiView: --><div ui-view="" class="tab-content ng-scope"><!--入金记录-->
<section add-class="" class="slice bg-3 animate-hover-slide ng-scope">
    <div class="w-section wi100 blog-grid">
        <div class="w-section">
            <div class="row">
                <div class="col-md-12" style="overflow: auto;">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th title="OrderId" class="width_20 ng-binding">OrderId</th>
                                <th title="Amount" class="width_16 ng-binding">Amount</th>
                                <th title="MT4 account" class="width_15 ng-binding">MT4 account</th>
                                <th title="AuditStatus" class="width_15 ng-binding">AuditStatus</th>
                                <th title="AuditTime" class="ng-binding">AuditTime</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- ngRepeat: pay in payment.paydata track by $index -->
                        
                        @forelse ($record as $record)
                        <tr  class="ng-scope">
                            <td title="NS{{$record->id}}" class="ng-binding">NS{{$record->id}}</td>
                           
                            <td title="{{$record->amount}}" class="ng-binding">{{$record->amount}}(USD)</td>
                            <td title="{{$user->mt4}}" class="ng-binding">{{$user->mt4}}</td>
                            <td class="color_red">
                                <!-- ngIf: pay.AuditStatus==true -->
                                <!-- ngIf: pay.AuditStatus==false --><span class="color_red ng-binding ng-scope" >{{$record->status}}</span><!-- end ngIf: pay.AuditStatus==false -->
                            </td>
                            <td title="{{$record->updated_at}}" class="ng-binding">{{$record->updated_at}}</td>
                        </tr><!-- end ngRepeat: pay in payment.paydata track by $index -->
                        @empty
                        <tr>
                            empty
                        </tr>
                        @endforelse
                        
                        <!-- ngIf: payment.paydata.length<=0 -->
                        </tbody>
                    </table>
                    <!-- ngInclude: '/view/common/page.html' --><div ng-include="&#39;/view/common/page.html&#39;" class="ng-scope"><!-- ngIf: pageData.total --><div class="row clearfloat ng-scope" ng-if="pageData.total">
    <!-- ngIf: pageData.totalPage>1 -->
    <!-- ngIf: pageData.totalPage>1 -->
</div><!-- end ngIf: pageData.total -->

</div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection