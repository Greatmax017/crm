<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <h5 class="centered">{{ Auth::user()->name }}</h5>

                  <li>
                      <a class="{{ Request::is('dashboard') ? 'active' : '' }}"  href="{{ url('/dashboard') }}">
                          <i class="fa fa-desktop"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              	@if(Auth::user()->isAdmin() || Auth::user()->isReader())
			    <li>
				<a class="{{ Request::is('admin*') ? 'active' : '' }}" href="/dashboard"><i class="fa fa-edit "></i>Admin Panel<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
				  <!-- <li><a class="{{ Request::is('admin/products') ? 'active' : '' }}" href="{{ url('/admin/products') }}">General</a></li> -->
				  <li><a class="{{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('/admin/users') }}">Users</a></li>
				  <li><a class="{{ Request::is('admin/transactions') ? 'active' : '' }}" href="{{ url('/admin/transactions') }}">Transactions</a></li>
				  <li><a class="{{ Request::is('admin/withdrawals') ? 'active' : '' }}" href="{{ url('/admin/withdrawals') }}">Withdrawals</a></li>
				   <li><a class="{{ Request::is('admin/kyc') ? 'active' : '' }}" href="{{ url('/admin/kyc') }}">KYC</a></li>

                    <li><a class="{{ Request::is('admin/account/usd') ? 'active' : '' }}" href="{{ url('/admin/account/usd') }}">USD account</a></li>
                    <li><a class="{{ Request::is('admin/account/gbp') ? 'active' : '' }}" href="{{ url('/admin/account/gbp') }}">GBP account</a></li>
                    <li><a class="{{ Request::is('admin/account/eur') ? 'active' : '' }}" href="{{ url('/admin/account/eur') }}">EUR account</a></li>
                      <!--<li><a class="{{ Request::is('admin/blog') ? 'active' : '' }}" href="{{ url('/admin/blog') }}">Blog</a></li> -->


				</ul>
			    </li>
			    @endif
                  <li class="sub-menu">
					<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					    <i class="fa fa-sign-out" aria-hidden="true"></i>
					    Logout
					</a>
					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
					    {{ csrf_field() }}
					</form>
				  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
