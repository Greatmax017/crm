<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">AlstomFx</li>
                <li>
                    <a href="{{ url('dashboard') }}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

            
                 <li>
                    <a href="{{ url('invest') }}">
                        <i data-feather="credit-card"></i>
                        <span >My Investments </span>
                    </a>
                </li>
              
                <li>
                    <a href="{{ url('transaction_history') }}">
                        <i data-feather="activity"></i>
                        <span >Transactions </span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('referred_bonus') }}">
                        <i class="fa fa-users   "></i>
                        <span >Referral Bonus</span>
                    </a>
                </li>
                
                
                <li>
                    <a href="{{ url('profile') }}">
                        <i class="fa fa-user"></i>
                        <span class="second"> Profile </span>
                    </a>
                </li>

                
            	@if(Auth::user()->isAdmin() || Auth::user()->isReader())
			    <li>
                    <a href="{{ url('admin') }}">
                        <i class="fa fa-edit"></i>
                        <span class="">Admin Panel</span>
                    </a>
				
			    </li>
			    @endif
                 <li>
                    <a href="{{ url('logout') }}">
                        <i class="fa fa-sign-out"></i>
                        <span class="second"> Logout </span>
                    </a>
                    	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
					    {{ csrf_field() }}
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
