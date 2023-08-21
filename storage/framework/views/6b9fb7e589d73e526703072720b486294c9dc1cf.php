<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <h5 class="centered"><?php echo e(Auth::user()->name, false); ?></h5>

                  <li>
                      <a class="<?php echo e(Request::is('dashboard') ? 'active' : '', false); ?>"  href="<?php echo e(url('/dashboard'), false); ?>">
                          <i class="fa fa-desktop"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              	<?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
			    <li>
				<a class="<?php echo e(Request::is('admin*') ? 'active' : '', false); ?>" href="/dashboard"><i class="fa fa-edit "></i>Admin Panel<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
				  <!-- <li><a class="<?php echo e(Request::is('admin/products') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/products'), false); ?>">General</a></li> -->
				  <li><a class="<?php echo e(Request::is('admin/users') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/users'), false); ?>">Users</a></li>
				  <li><a class="<?php echo e(Request::is('admin/transactions') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/transactions'), false); ?>">Transactions</a></li>

                   <li><a class="<?php echo e(Request::is('admin/products') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/products'), false); ?>">Products</a></li>
                    <li><a class="<?php echo e(Request::is('admin/airtime') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/airtime'), false); ?>">Airtime</a></li>
                    <li><a class="<?php echo e(Request::is('admin/funding') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/funding'), false); ?>">Funding</a></li>
                      <li><a class="<?php echo e(Request::is('admin/blog') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/blog'), false); ?>">Blog</a></li>


				</ul>
			    </li>
			    <?php endif; ?>
                  <li class="sub-menu">
					<a href="<?php echo e(url('/logout'), false); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					    <i class="fa fa-sign-out" aria-hidden="true"></i>
					    Logout
					</a>
					<form id="logout-form" action="<?php echo e(url('/logout'), false); ?>" method="POST" style="display: none;">
					    <?php echo e(csrf_field(), false); ?>

					</form>
				  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
