<!-- Topbar Start -->
<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="<?php echo e(url('home'), false); ?>" class="navbar-brand mr-0 mr-md-2 logo">
            <span class="logo-lg">
                <img src="<?php echo e(('/frontend/assets/img/alstomfx-logo.png'), false); ?>" alt="" height="180" />
            </span>
            <span class="logo-sm">
                <img src="/backend/assets/img/alstomfx-logo.png" alt="" height="90">
            </span>
        </a>

        <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
            <li class="">
                <button class="button-menu-mobile open-left disable-btn">
                    <i data-feather="menu" class="menu-icon"></i>
                    <i data-feather="x" class="close-icon"></i>
                </button>
            </li>
        </ul>

        <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
            <li class="d-none d-sm-block">
                <div class="app-search">
                    <button class="btn btn_purora back-home-button">
                        <a href="<?php echo e(url('dashboard'), false); ?>" style="color: white">Back to Home</a>
                    </button>
                </div>
            </li>
            <li>
                <div class="media user-profile mt-2 mb-2">
                    <img src="/backend/assets/images/users/default.png" class="avatar-sm rounded-circle mr-2" alt=""/>
                <div class="media-body">
                        <h6 class="pro-user-name mt-0 mb-0"><?php echo e(Auth::user()->name, false); ?></h6>
                        
                    </div>
                    <div class="dropdown align-self-center profile-dropdown-menu">
                        <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                           aria-expanded="false">
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <a href="<?php echo e(url('profile'), false); ?>" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>My Profile</span>
                            </a>
            
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo e(url('logout'), false); ?>" class="dropdown-item notify-item">

                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                            	<form id="logout-form" action="<?php echo e(url('/logout'), false); ?>" method="POST" style="display: none;">
					    <?php echo e(csrf_field(), false); ?>

					</form>
            
                        </div>
                    </div>
                </div>
            </li>

            
           
        </ul>
    </div>

</div>
<!-- end Topbar -->
