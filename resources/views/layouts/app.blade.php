<!DOCTYPE html>

<html lang="en" ng-app="app" class="ng-scope">
  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8, width=device-width, initial-scale=1">
        <style type="text/css">[uib-typeahead-popup].dropdown-menu{display:block;}</style>
        <style type="text/css">.uib-time input{width:50px;}</style>
        <style type="text/css">[uib-tooltip-popup].tooltip.top-left > .tooltip-arrow,[uib-tooltip-popup].tooltip.top-right > .tooltip-arrow,[uib-tooltip-popup].tooltip.bottom-left > .tooltip-arrow,[uib-tooltip-popup].tooltip.bottom-right > .tooltip-arrow,[uib-tooltip-popup].tooltip.left-top > .tooltip-arrow,[uib-tooltip-popup].tooltip.left-bottom > .tooltip-arrow,[uib-tooltip-popup].tooltip.right-top > .tooltip-arrow,[uib-tooltip-popup].tooltip.right-bottom > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.top-left > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.top-right > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.bottom-left > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.bottom-right > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.left-top > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.left-bottom > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.right-top > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.right-bottom > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.top-left > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.top-right > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.bottom-left > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.bottom-right > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.left-top > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.left-bottom > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.right-top > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.right-bottom > .tooltip-arrow,[uib-popover-popup].popover.top-left > .arrow,[uib-popover-popup].popover.top-right > .arrow,[uib-popover-popup].popover.bottom-left > .arrow,[uib-popover-popup].popover.bottom-right > .arrow,[uib-popover-popup].popover.left-top > .arrow,[uib-popover-popup].popover.left-bottom > .arrow,[uib-popover-popup].popover.right-top > .arrow,[uib-popover-popup].popover.right-bottom > .arrow,[uib-popover-html-popup].popover.top-left > .arrow,[uib-popover-html-popup].popover.top-right > .arrow,[uib-popover-html-popup].popover.bottom-left > .arrow,[uib-popover-html-popup].popover.bottom-right > .arrow,[uib-popover-html-popup].popover.left-top > .arrow,[uib-popover-html-popup].popover.left-bottom > .arrow,[uib-popover-html-popup].popover.right-top > .arrow,[uib-popover-html-popup].popover.right-bottom > .arrow,[uib-popover-template-popup].popover.top-left > .arrow,[uib-popover-template-popup].popover.top-right > .arrow,[uib-popover-template-popup].popover.bottom-left > .arrow,[uib-popover-template-popup].popover.bottom-right > .arrow,[uib-popover-template-popup].popover.left-top > .arrow,[uib-popover-template-popup].popover.left-bottom > .arrow,[uib-popover-template-popup].popover.right-top > .arrow,[uib-popover-template-popup].popover.right-bottom > .arrow{top:auto;bottom:auto;left:auto;right:auto;margin:0;}[uib-popover-popup].popover,[uib-popover-html-popup].popover,[uib-popover-template-popup].popover{display:block !important;}</style><style type="text/css">.uib-datepicker-popup.dropdown-menu{display:block;float:none;margin:0;}.uib-button-bar{padding:10px 9px 2px;}</style><style type="text/css">.uib-position-measure{display:block !important;visibility:hidden !important;position:absolute !important;top:-9999px !important;left:-9999px !important;}.uib-position-scrollbar-measure{position:absolute !important;top:-9999px !important;width:50px !important;height:50px !important;overflow:scroll !important;}.uib-position-body-scrollbar-measure{overflow:scroll !important;}</style><style type="text/css">.uib-datepicker .uib-title{width:100%;}.uib-day button,.uib-month button,.uib-year button{min-width:100%;}.uib-left,.uib-right{width:100%}</style><style type="text/css">.ng-animate.item:not(.left):not(.right){-webkit-transition:0s ease-in-out left;transition:0s ease-in-out left}</style><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css" integrity="sha512-uws2d1mzntk5UyAzfDcNN9wAN3OoSsztsVfUzRvq+DOMZYgUZH6HJ97g4y2Nk6TvDlIdd0GBuDjaZ74DoASdig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css" integrity="sha512-fXnjLwoVZ01NUqS/7G5kAnhXNXat6v7e3M9PhoMHOTARUMCaf5qNO84r5x9AFf5HDzm3rEZD8sb/n6dZ19SzFA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="description" class="description" content="neptunefx.net - 海王星证券">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="expires" content="0"> 
    <title class="diy-title">Neptune Securities|NSFX forex</title>
    <link rel="shortcut icon" class="shortcut" href="https://api.neptunefx.com.au/Themes/Uploads/IBImage/657290ce-c7b8-4c82-9e7a-4fba77f55a9a.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <link href="/login_files/bootstrap-dark.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="/login_files/icons.min.css" rel="stylesheet" type="text/css">
  
    <link href="/login_files/app-dark.min.css" id="app-style" rel="stylesheet" type="text/css">
    <link href="/login_files/freestyle.css" id="app-style" rel="stylesheet" type="text/css">
</head>


<body ng-controller="mainController" data-sidebar="dark" style="height: 100vh;" class="ng-scope bg-black" data-new-gr-c-s-check-loaded="14.1077.0" data-gr-ext-installed="">
    <!-- Begin page -->
    <div id="" style="height: 100vh;">
    

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/imgs/logo-square.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/imgs/logo.svg" alt="" height="45">
                    </span>
                </a>
            </div>

         
          

        </div>
        

        <div class="d-flex">

           
            <div title="" ng-if="Language=='en'" class="dropdown d-md-block ms-2">

                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="me-2" src="assets/images/flags/us.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                   
                    <a href="javascript:void(0);" class="dropdown-item notify-item" ng-click="switching('zh');">
                        <img src="assets/images/flags/china.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Chinese </span>
                    </a>
                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item" ng-click="switching('fr');">
                        <img src="assets/images/flags/french.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                    </a>
                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item" ng-click="switching('es');">
                        <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                    </a>
                  
                    <a href="javascript:void(0);" class="dropdown-item notify-item" ng-click="switching('de');">
                        <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                    </a>
                </div>
            </div>

          

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @auth
                    <img class="rounded-circle header-profile-user" src="/images/{{Auth::user()->pic}}"

                    @else    
                    <img class="rounded-circle header-profile-user" src="im/images/user-img.png"
                    @endauth
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">Member Center</span>
                    <i class="mdi mdi-chevron-down d-xl-inline-block"></i>
                    
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                
                    @auth
                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                    <a class="dropdown-item" href="/bankdeposit">Deposit & Withdraw</a>
                    <a class="dropdown-item" href="/Kyc">KYC</a>
                    <a class="dropdown-item" href="https://download.mql5.com/cdn/web/neptune.securities.holdings/mt4/neptunesecurities4setup.exe">Client Download</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                    @else
                    <a class="dropdown-item" href="/login">Member Center</a>
                    @endauth
                    
                   
                   
                </div>
            </div>


        </div>
    </div>
</header>



@yield('content')

@auth
<!--footer-->
    <!-- ngIf: user.isLogin --><!-- ngInclude: '/view/common/footer.html?time=' --><footer class="footer ng-scope" id="footer" ng-if="user.isLogin" ng-show="uivewLoad" ng-include="&#39;/view/common/footer.html?time=&#39;"><div class="container-fluid ng-scope">
	<div class="row">
		<div class="col-sm-6">
			<script>document.write(new Date().getFullYear())</script> © Neptunefx.
		</div>
		<div class="col-sm-6">
			<div class="text-sm-end d-none d-sm-block">
				Crafted with <i class="mdi mdi-heart text-danger"></i> by Neptunefx.net
			</div>
		</div>
	</div>
</div>
@endauth

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>

       
        
<script src="/login_files/angular.min.js.download"></script>
    <script src="/login_files/angular-translate.min.js.download"></script>
    <script src="/login_files/angular-ui-router.min.js.download"></script>
    <script src="/login_files/api-check.js.download" defer=""></script>
    <script src="/login_files/ui-bootstrap-tpls.js.download" defer=""></script>
    <script src="/login_files/formly.js.download" defer=""></script>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-formly-templates-bootstrap/6.5.1/angular-formly-templates-bootstrap.js"></script>
    <script src="/login_files/upload.min.js.download" defer=""></script>
    <script src="/login_files/upload-shim.min.js.download" defer=""></script>
  
   

   
    <script src="/login_files/jquery.min.js.download"></script>
    <script src="/login_files/bootstrap.bundle.min.js.download"></script>
    <script src="/login_files/metisMenu.min.js.download"></script>
    <script src="/login_files/simplebar.min.js.download"></script>
    <script src="/login_files/waves.min.js.download"></script>

   
    <script src="/login_files/jquery.inputmask.min.js.download"></script>
   
    <script src="/login_files/form-mask.init.js.download"></script>


    <script src="/login_files/app.js.download"></script>
   
    <script src="/login_files/jquery.jedate.min.js.download" defer=""></script>

    <script src="/login_files/jquery.validate.min.js.download" defer=""></script>
    <script src="/login_files/additional-methods.min.js.download" defer=""></script>
    <script src="/login_files/index.min.js.download"></script>

    <script src="/login_files/route.config.min.js.download"></script>
    <script src="/login_files/main.js.download"></script>
    <script src="/login_files/ChirderController.js.download" defer=""></script>
