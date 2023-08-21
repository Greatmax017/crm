<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">AlstomFx</li>
                <li>
                    <a href="<?php echo e(url('dashboard'), false); ?>">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

            
                 <li>
                    <a href="<?php echo e(url('invest'), false); ?>">
                        <i data-feather="credit-card"></i>
                        <span >My Investments </span>
                    </a>
                </li>
              
                <li>
                    <a href="<?php echo e(url('transaction_history'), false); ?>">
                        <i data-feather="activity"></i>
                        <span >Transactions </span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo e(url('referred_bonus'), false); ?>">
                        <i class="fa fa-users   "></i>
                        <span >Referral Bonus</span>
                    </a>
                </li>
                
                
                <li>
                    <a href="<?php echo e(url('profile'), false); ?>">
                        <i class="fa fa-user"></i>
                        <span class="second"> Profile </span>
                    </a>
                </li>

                
            	<?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
			    <li>
                    <a href="<?php echo e(url('admin'), false); ?>">
                        <i class="fa fa-edit"></i>
                        <span class="">Admin Panel</span>
                    </a>
				
			    </li>
			    <?php endif; ?>
                 <li>
                    <a href="<?php echo e(url('logout'), false); ?>">
                        <i class="fa fa-sign-out"></i>
                        <span class="second"> Logout </span>
                    </a>
                    	<form id="logout-form" action="<?php echo e(url('/logout'), false); ?>" method="POST" style="display: none;">
					    <?php echo e(csrf_field(), false); ?>

					</form>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
