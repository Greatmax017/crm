<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="<?php echo e(url('dashboard'), false); ?>">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

            
                <li>
                    <a href="">
                        <i class="fa fa-money"></i>
                        <span>invest</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('withdraw.index'), false); ?>">
                        <i class="fa fa-usd"></i>
                        <span>withdraw</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('transaction.index'), false); ?>">
                        <i data-feather="credit-card"></i>
                        <span >Transactions </span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo e(url('referral.index'), false); ?>">
                        <i class="fa fa-users   "></i>
                        <span >Referral Bonus</span>
                    </a>
                </li>
                
                
                <li>
                    <a href="<?php echo e(url('setting'), false); ?>">
                        <i class="fa fa-user"></i>
                        <span class="second"> Profile </span>
                    </a>
                </li>

            </ul>

            	<?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
			    <li>
				<a class="<?php echo e(Request::is('admin*') ? 'active' : '', false); ?>" href="#"><i class="fa fa-edit "></i>Admin Panel<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
				  <li><a class="<?php echo e(Request::is('admin') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin'), false); ?>">General</a></li>
				  <li><a class="<?php echo e(Request::is('admin/users') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/users'), false); ?>">Users</a></li>
          <li><a class="<?php echo e(Request::is('admin/coupon') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/admincoupon'), false); ?>">Coupon</a></li>
				  <li><a class="<?php echo e(Request::is('admin/withdrawals') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/withdrawals'), false); ?>">Withdrawals</a></li>
          <li><a class="<?php echo e(Request::is('admin/withdrawn') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/withdrawn'), false); ?>">Withdrawn</a></li>
                  <li><a class="<?php echo e(Request::is('admin/blog') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/blog'), false); ?>">Blog</a></li>
                      <li><a class="<?php echo e(Request::is('admin/deleted') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/deleted'), false); ?>">Deleted</a></li>
                  <li><a class="<?php echo e(Request::is('admin/messagebox') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/messagebox'), false); ?>">Support(<b><?php echo e(Auth::user()->received_messages_admin()->where('message_read', 0)->count(), false); ?></b>)</a></li>
				</ul>
			    </li>
			    <?php endif; ?>

                
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
