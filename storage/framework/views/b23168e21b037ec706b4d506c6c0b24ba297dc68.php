<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sections/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <li class="breadcrumb-item active ng-binding">KYC Verification</li>
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

                    <h4 class="header-title ng-binding">KYC Verification</h4>

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light" ng-click="tile=&#39;profile&#39;">
                            <a class="nav-link active" data-bs-toggle="tab" href="#" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block ng-binding">Personal Profile</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light" ng-click="tile=&#39;KYC&#39;">
                            <a class="nav-link" data-bs-toggle="tab" href="#" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block ng-binding">KYC Verification</span>
                            </a>
                        </li>
                        <!--<li class="nav-item waves-effect waves-light" ng-click="tile='Other'">
                            <a class="nav-link" data-bs-toggle="tab" href="#attach-1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                
                            </a>
                        </li>-->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="home-1" role="tabpanel">
<?php if(session('error-status')): ?>
                                <center>
                                <div class="btn btn-danger">

                                 
                                  <b>Error: &nbsp </b> <?php echo e(session('error-status'), false); ?>

                                </div>
                            </div>
                            </center>
                                <?php endif; ?>

                                <?php if(session('success-status')): ?>
                                <center>
                                <div class="btn btn-success">

                                   
                                  <?php echo e(session('success-status'), false); ?>

                                </div>
                                </center>
                            </div>
                        <?php endif; ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="ng-binding">Full name：</label>

                                                <input class="form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" disabled="" type="text" ng-model="resInfo.RealName" value="<?php echo e($user->fname, false); ?> <?php echo e($user->surname, false); ?>" name="sname"  required="" data-msg-required="This field is required" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="ng-binding">Phone：</label>
                                            <div class="mb-3">
                                                <input class="form-control ng-pristine ng-untouched ng-valid-minlength ng-valid-maxlength ng-not-empty ng-valid ng-valid-required" disabled="" autocomplete="off" value="<?php echo e($user->phone, false); ?>" data-rule-phonemobile="true" data-msg-phonemobile="* The cell phone number is not valid" minlength="8" maxlength="16" required="" data-msg-required="* The phone number cannot be empty" name="mobile" type="text" ng-model="resInfo.PhoneNumber">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="ng-binding">Email：</label>

                                                <input class="form-control ng-pristine ng-untouched ng-valid-email ng-not-empty ng-valid ng-valid-required" disabled="" id="email" autocomplete="off" type="email" name="email" value="<?php echo e($user->email, false); ?>" ng-model="resInfo.Email" required="" data-msg-required=" *Mailbox is required" email="" data-msg-email=" Illegal email address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="ng-binding">Certificate Card Type：</label>
                                      <form method="POST" id="kyc" enctype="multipart/form-data" action="/kyc">
                                            <?php echo e(csrf_field(), false); ?>

                                            <!-- ngIf: Language=='zh' -->
                                            <!-- ngIf: Language!='zh' -->
                                            <select  required="" data-msg-required="This field is required" name="cardtype"  ng-if="Language!=&#39;zh&#39;" class="form-select ng-pristine ng-untouched ng-scope ng-not-empty ng-valid ng-valid-required" id="sfz" name="sfz" >
                                                <option value=""><?php echo e($user->cardtype, false); ?></option>
                                                <option value="Identity Card">Identity Card</option>
                                                <option value="Hong Kong and Macao id card">Hong Kong and Macao id card</option>
                                                <option value="Passport">Passport</option>
                                                <option value="license">Driver's license</option>
                                            </select><!-- end ngIf: Language!='zh' -->
                                        
                                    </div>
                                    <div class="row mb-3">
                                        <label class="ng-binding">Certificate Card Number：</label>
                                        <div class="mb-3">
                                            <input class="form-control ng-pristine ng-untouched ng-valid-minlength ng-valid-maxlength ng-not-empty ng-valid ng-valid-required" value="<?php echo e(Auth::user()->cardnumber, false); ?>" name="cardnumber" autocomplete="off" type="text" ng-model="resInfo.CertificateCardNumber" name="number" id="hm" minlength="7" data-msg-minlength="Cardnumber length no less than 7 characters" maxlength="18" data-msg-maxlength="Cardnumber length is not more than 20 characters" data-rule-card="true" data-msg-card="Consisting of numbers and letters" required="" data-msg-required="This field is required">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="ng-binding"> Front view of ID card：<br /> (Click image to upload)</label>

                                                <label for="cardfront" language="en" class="cardfront ng-isolate-scope" file-upload="commondialogOption" data-config="{&quot;card&quot;:&quot;CardNumber1&quot;,&quot;type&quot;:&quot;imgchoose&quot;,&quot;max-size&quot;:&quot;&quot;,&quot;shows&quot;:&quot;.imga&quot;,&quot;triggerCls&quot;:&quot;.show_btn&quot;,&quot;fileClass&quot;:&quot;.front&quot;}">
                                                    <!-- ngIf: !resInfo.CardNumber1 -->
                                                    <!-- ngIf: resInfo.CardNumber1 --><img ng-if="resInfo.CardNumber1" class="img-fluid ng-scope" ng-src="" height="315" width="315" src="<?php if(Auth::user()->cardfront != null): ?>/images/<?php echo e(Auth::user()->cardfront, false); ?> <?php else: ?> imgs/logo.png <?php endif; ?>"><!-- end ngIf: resInfo.CardNumber1 -->
                                                </label>
                                                <input style="opacity: 0;pointer-events: none;" class="front form-control file-opacity ng-pristine ng-untouched ng-valid ng-not-empty" name="cardfront" id="cardfront" type="file" ng-model="resInfo.CardNumber1" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="ng-binding"> Back view of the ID card： <br /> (Click image to upload)</label>

                                                <label for="cardnagitive" language="en" class="cardnagitive ng-isolate-scope" file-upload="commondialogOption" data-config="{&quot;card&quot;:&quot;CardNumber2&quot;,&quot;type&quot;:&quot;imgchoose&quot;,&quot;max-size&quot;:&quot;&quot;,&quot;shows&quot;:&quot;.imgas&quot;,&quot;triggerCls&quot;:&quot;.cardshow_btn&quot;,&quot;fileClass&quot;:&quot;.nagitive&quot;}">
                                                    <!-- ngIf: !resInfo.CardNumber2 -->
                                                    <!-- ngIf: resInfo.CardNumber2 --><img ng-if="resInfo.CardNumber2"  class="img-fluid ng-scope" height="315" width="315" src="<?php if(Auth::user()->cardback != null): ?>/images/<?php echo e(Auth::user()->cardback, false); ?> <?php else: ?> imgs/logo.png <?php endif; ?>" ><!-- end ngIf: resInfo.CardNumber2 -->
                                                </label>
                                                <input style="opacity: 0;pointer-events: none;" class="nagitive form-control ng-pristine ng-untouched ng-valid ng-not-empty" type="file" ng-model="resInfo.CardNumber2" name="cardback" id="cardnagitive">
                                            </div>
                                        </div>
                                        
                                        <button type="submit" value="Submit" class="btn btn-secondary ng-binding" onclick="myFunction()">Submit <font id="demo"></font></button>
                                    </form>
                                    </div>

<script>
function myFunction() {
  document.getElementById("demo").innerHTML = '<i id="loader" class="fa fa-spinner fa-spin"></i>';
}
</script>

                                    <!--<ng-form class="formly ng-pristine ng-valid ng-isolate-scope" name="formly_1" role="form" model="changes.dynamicProperties" fields="changeforms[formIdss.PersonalInformation].Fields" options="changeforms[formIdss.PersonalInformation].Options" ng-class="options.templateOptions.className" form="form">-->
           <!--ngRepeat: field in fields --><!-- ngIf: !field.hide -->
           <!--<div formly-field="" ng-repeat="field in fields " ng-if="!field.hide" class="formly-field ng-scope ng-isolate-scope formly-field-group" options="field" model="field.model || model" original-model="model" fields="fields" form="theFormlyForm" form-id="formly_1" form-state="options.formState" form-options="options" index="$index"><ng-form class="row formly ng-pristine ng-valid ng-scope ng-isolate-scope" name="formly_2" role="form" ng-class="options.templateOptions.className" model="model" fields="options.fieldGroup" options="options.options" form="options.form" is-field-group="">-->-->
           <!--ngRepeat: field in fields -->
          <div ng-transclude="" class="">
          </div>
        </ng-form></div><!-- end ngIf: !field.hide --><!-- end ngRepeat: field in fields -->
          <div ng-transclude="" class="">
                                    </div>
        </ng-form>
                                    <!-- ngIf: Nomt4=='nomts' -->
                                
                        </div>
                        <!--<div class="tab-pane" id="profile-1" role="tabpanel">-->
                            <!-- ngIf: tile=='KYC' -->
                        <!--</div>-->
                        <!--<div class="tab-pane" id="attach-1" role="tabpanel">-->
                        <!--    <div>-->
                        <!--        <div class="row">-->
                        <!--            <div class="mb-3">-->
                        <!--                <label class="ng-binding">Describe：</label>-->

                        <!--                <input class="form-control" id="describe" type="text" value="">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="row">-->
                        <!--            <div class="mb-3">-->
                        <!--                <label class="ng-binding">Enclosure：</label>-->

                        <!--                <input id="Enclosurefiles" type="file" value="">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div>-->
                        <!--            <span class="btn btn-success ng-binding" ng-click="changeFU()">Click to upload</span>-->
                        <!--        </div>-->
                        <!--        <div class="ng-binding">The attachment list has been uploaded:</div>-->
                        <!--        <div class="table-responsive">-->
                        <!--            <table class="table mb-0">-->
                        <!--                <tbody><tr>-->
                        <!--                    <th class="ng-binding">Describe</th>-->
                        <!--                    <th class="ng-binding">Details</th>-->
                                            <!-- <> -->
                                        </tr>
                                        <!-- ngRepeat: sf in attrment track by $index -->
                                    </tbody></table>
    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div></div>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>