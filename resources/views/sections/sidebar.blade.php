<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <h5 class="centered">{{ Auth::user()->name }}</h5>

                  <li>
                      <a class="{{ Request::is('dashboard') ? 'active' : '' }}"  href="{{ url('/dashboard') }}">
                          <i class="fa fa-desktop"></i>
                          <span><font color="black"> Dashboard</font></span>
                      </a>
                  </li>
              	@if(Auth::user()->isAdmin() || Auth::user()->isReader())
			    <li>
				<a class="{{ Request::is('admin*') ? 'active' : '' }}" href="#"><i class="fa fa-edit "></i>Admin Panel<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
				  <li><a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">General</a></li>
				  <li><a class="{{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('/admin/users') }}">Users</a></li>
          <li><a class="{{ Request::is('admin/coupon') ? 'active' : '' }}" href="{{ url('/admin/admincoupon') }}">Coupon</a></li>
				  <li><a class="{{ Request::is('admin/withdrawals') ? 'active' : '' }}" href="{{ url('/admin/withdrawals') }}">Withdrawals</a></li>
          <li><a class="{{ Request::is('admin/withdrawn') ? 'active' : '' }}" href="{{ url('/admin/withdrawn') }}">Withdrawn</a></li>
                  <li><a class="{{ Request::is('admin/blog') ? 'active' : '' }}" href="{{ url('/admin/blog') }}">Blog</a></li>
                      <li><a class="{{ Request::is('admin/deleted') ? 'active' : '' }}" href="{{ url('/admin/deleted') }}">Deleted</a></li>
                  <li><a class="{{ Request::is('admin/messagebox') ? 'active' : '' }}" href="{{ url('/admin/messagebox') }}">Support(<b>{{ Auth::user()->received_messages_admin()->where('message_read', 0)->count() }}</b>)</a></li>
				</ul>
			    </li>
			    @endif

				<li>
                      <a class="{{ Request::is('mytree') ? 'active' : '' }}"  href="{{ url('/mytree') }}">
                          <i class="fa fa-"></i>
                          <font color="black"> My Tree</font></span>
                      </a>
                  </li>
				  <li>
                      <a class="{{ Request::is('profile') ? 'active' : '' }}"  href="{{ url('/profile') }}">
                          <i class="fa fa-"></i>
                          <font color="black"> Profile</font></span>
                      </a>
                  </li>

				  <li>
                      <a class="{{ Request::is('earnings') ? 'active' : '' }}"  href="{{ url('/earnings') }}">
                          <i class="fa fa-"></i>
                          <font color="black"> Earnings</font></span>
                      </a>
                  </li>
				  <li>
                      <a class="{{ Request::is('new_message') ? 'active' : '' }}"  href="{{ url('/messagebox') }}">
                          <i class="fa fa-"></i>
                          <font color="black"> Support</font></span>
                      </a>
                  </li>
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
