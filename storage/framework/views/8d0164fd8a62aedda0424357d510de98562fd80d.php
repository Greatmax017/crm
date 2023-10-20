        <!-- uiView: -->
        
        <div ui-view="" style="height: 100vh;" class="ng-scope">
        <!-- ========== Left Sidebar Start ========== -->
        
        <div class="vertical-menu ng-scope">
        

<div data-simplebar="init" class="h-100"><div class="simplebar-wrapper nav" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">

    <div  class="user-sidebar  text-center">
        <div class="dropdown">
            <div class="user-img">
                <?php if(Auth::user()->pic != null): ?>
                <img ng-src="/imgs/soft_notice_en.jpg" alt="" class="rounded-circle" src="/images/<?php echo e(Auth::user()->pic, false); ?>">
                <?php else: ?>
                <img ng-src="/imgs/soft_notice_en.jpg" alt="" class="rounded-circle" src="/imgs/soft_notice_en.jpg">
                <?php endif; ?>
                <span class="avatar-online bg-success"></span>
            </div>
            <div class="file-in btn ng-isolate-scope" language="en"  data-config="">
                <form method="POST" id="profile" enctype="multipart/form-data" action="/profilepic">
                    <?php echo e(csrf_field(), false); ?>

                
                <input class="filsd" type="file" name="photo" accept="image/*" style="" id="file" type="file">
                <span class="font-size-13 text-white-50 ng-binding">Click to upload</span>
            </div>
            </form>
            <div class="user-info">
                <h5 class="mt-3 font-size-16 text-white ng-binding"><?php echo e(Auth::user()->fname, false); ?>  <?php echo e(Auth::user()->surname, false); ?></h5>
                <!-- <h5 class="mt-3 font-size-14 text-white ng-binding">MT4 Trading account：<?php echo e(Auth::user()->mt4, false); ?></h5> -->
                
                 <!--<h5 class="mt-3 font-size-14 text-white ng-binding">Type: <?php if(Auth::user()->link == 0): ?>Demo <?php else: ?> Real <?php endif; ?> </h5> -->
                <h5 class="mt-3 font-size-14 text-white ng-binding">KYC vertification：<?php echo e(Auth::user()->kyc, false); ?> </h5>
            </div>
        </div>
    </div>
<script>
    document.getElementById("file").onchange = function() {
    document.getElementById("profile").submit();
}
</script>

    <!--- Sidemenu -->
    <div id="sidebar-menu" nav>
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title ng-binding">Menu</li>

            <li ui-sref-active="current" class="current">
                <a ui-sref="center.AccountInfo" class="waves-effect" href="/dashboard">
                    <i class="dripicons-home"></i>
                    <span class="badge rounded-pill bg-info float-end">2</span>
                    <span class="ng-binding">Dashboard</span>
                </a>
            </li>

            <!-- ngIf: Nomt4!='nomts' -->
            <li ng-if="Nomt4!=&#39;nomts&#39;" ui-sref-active="current" class="ng-scope">
                <a ui-sref="center.manage.BankDeposit" class=" waves-effect" href="/bankdeposit">
                    <i class="dripicons-toggles"></i>
                    <span class="ng-binding">Deposit &amp; Withdraw</span>
                </a>
            </li><!-- end ngIf: Nomt4!='nomts' -->
            
             <li ng-if="Nomt4!=&#39;nomts&#39;" ui-sref-active="current" class="ng-scope">
                <a ui-sref="center.manage.BankDeposit" target="_blank" class=" waves-effect" href="https://trade.neptunefx.net">
                    <i class="dripicons-toggles"></i>
                    <span class="ng-binding">Web Terminal</span>
                </a>
            </li>

            <!-- ngIf: Nomt4=='nomts' -->

            <li ui-sref-active="current" class="">
                <a ui-sref="center.Kyc" class=" waves-effect" href="/Kyc">
                    <i class="dripicons-user-group"></i>
                    <span class="ng-binding">KYC Verification</span>
                </a>
            </li>
            

            <li ui-sref-active="current" class="">
                <a ui-sref="center.Accountset" class=" waves-effect" href="/Accountset">
                    <i class="dripicons-gear"></i>
                    <span class="ng-binding"> Account settings</span>
                </a>
            </li>

            <li ui-sref-active="current" class="">
                <a class=" waves-effect" href="https://download.mql5.com/cdn/web/neptune.securities.holdings/mt4/neptunesecurities4setup.exe" target="_blank">
                    <i class="dripicons-cloud-download"></i>
                    <span class="ng-binding"> Client Downloads</span>
                </a>
            </li>
            <?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
            <li ui-sref-active="current" class="">
                <a class=" waves-effect" href="admin/users"></i>
                    <span class="ng-binding">Admin Panel</span>
                </a>
                

            <?php endif; ?>

            <!--<li ui-sref-active="current">
    <a ui-sref="center.MemberUpgrade" class=" waves-effect">
        <i class="dripicons-lightbulb"></i>
        <span></span>
    </a>
</li>-->

        </ul>
    </div>
    <!-- Sidebar -->
    
</div>

</div>

</div></div>

<div class="simplebar-placeholder" style="width: auto; height: 567px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div></div>
</div>

<!-- Left Sidebar End -->