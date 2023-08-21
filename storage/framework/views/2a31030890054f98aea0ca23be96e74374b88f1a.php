   <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Mobile VTUP lus" class="w-6" src="/img/core-img/logo.png">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-feather="box"></i> </div>
                            <div class="menu__title"> My Account <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                        <ul class="">
                            <li>
                                <a href="/dashboard" class="menu">
                                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                                    <div class="menu__title"> Dashboard  </div>
                                </a>
                            </li>
                            <li>
                                <a href="/add_moneny" class="menu">
                                    <div class="menu__icon"> <i data-feather="plus"></i> </div>
                                    <div class="menu__title"> Add Money </div>
                                </a>
                            </li>
                            <li>
                                <a href="/transaction_history" class="menu">
                                    <div class="menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="menu__title"> All Transactions</div>
                                </a>
                            </li>
                            <li>
                                <a href="/referred_bonus" class="menu">
                                    <div class="menu__icon"> <i data-feather="hash"></i> </div>
                                    <div class="menu__title">Referral Earnings</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon"> <i data-feather="user"></i> </div>
                                    <div class="menu__title"> Aitime Top Up</div>
                                </a>
                            </li>
                        </ul>
                       
                    </li>
                   <a href="/airtime" class="menu <?php echo e(Request::is('airtime') ? 'menu--active' : '', false); ?>">
                            <div class="menu__icon"> <i data-feather="phone"></i></div>
                            <div class="menu__title"> Airtime Top Up </div>
                        </a>
                </li>
                <li>
                        <a href="javascript:;" class="menu <?php echo e(Request::is('data') ? 'menu--active' : '', false); ?> ">
                            <div class="menu__icon"> <i data-feather="globe"></i> </div>
                            <div class="menu__title"> Data Bundle<i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                        <ul class="">
                            <li>
                                <a href="/mtn_data" class="menu">
                                    <div class="menu__icon"> <i data-feather="plus-circle"></i> </div>
                                    <div class="menu__title"> Mtn Data  </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="/mtn_bulk_data" class="menu">
                                    <div class="menu__icon"> <i data-feather="plus-circle"></i> </div>
                                    <div class="menu__title"> Bulk Data </div>
                                </a>
                            </li> -->
                            <li>
                                <a href="/other_gsm_data" class="menu">
                                    <div class="menu__icon"> <i data-feather="plus-circle"></i> </div>
                                    <div class="menu__title"> Other GSM Data</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon"> <i data-feather="globe"></i> </div>
                                    <div class="menu__title">Broadband Data</div>
                                </a>
                            </li>
                            
                        </ul>
                       
                    </li>
                    </li>
                    <li>
                        <a href="/cable" class="menu <?php echo e(Request::is('cable') ? 'menu--active' : '', false); ?>">
                            <div class="menu__icon"> <i data-feather="tv"></i> </div>
                            <div class="menu__title"> Cable TV </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu <?php echo e(Request::is('electricity') ? 'menu--active' : '', false); ?>">
                            <div class="menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="menu__title"> Electricity</div>
                        </a>
                    </li>
                     <li>
                        <a href="#" class="menu <?php echo e(Request::is('education') ? 'menu--active' : '', false); ?>">
                            <div class="menu__icon"> <i data-feather="book-open"></i> </div>
                            <div class="menu__title"> Educatiion</div>
                        </a>
                    </li>
                <li>
                    <a href="/logout" class="menu ">
                        <div class="menu__icon"> <i data-feather="power"></i> </div>
                        <div class="menu__title"> Log Out</div>
                    </a>
                </li>
                <?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
                <!--admin-->
                 <li>
                    <a href="javascript:;" class="menu <?php echo e(Request::is('admin') ? 'menu--active' : '', false); ?>">
                        <div class="menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="menu__title"> Admin Panel </div>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
 <div class="flex">
 <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Mobile VTU Pluss" class="w-6" src="img/core-img/logo.png">
                    <span class="hidden xl:block text-white text-lg ml-3"> Mobile VTU <span class="font-medium">Plus</span> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="javascript:;" class="side-menu <?php echo e(Request::is('dashboard') ? 'side-menu--active' : '', false); ?> ">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> My Account <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                            </a>
                        <ul class="">
                            <li>
                                <a href="/dashboard" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                                    <div class="side-menu__title"> Dashboard  </div>
                                </a>
                            </li>
                            <li>
                                <a href="/add_money" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="plus"></i> </div>
                                    <div class="side-menu__title"> Add Money </div>
                                </a>
                            </li>
                            <li>
                                <a href="/transaction_history" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                                    <div class="side-menu__title"> All Transactions</div>
                                </a>
                            </li>
                            <li>
                                <a href="/referred_bonus" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                                    <div class="side-menu__title">Referral Earnings</div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/profile'), false); ?>" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                                    <div class="side-menu__title"> Profile</div>
                                </a>
                            </li>
                        </ul>
                       
                    </li>
                    <li>
                        <a href="/airtime" class="side-menu <?php echo e(Request::is('airtime') ? 'side-menu--active' : '', false); ?>">
                            <div class="side-menu__icon"> <i data-feather="phone"></i></div>
                            <div class="side-menu__title"> Airtime Top Up </div>
                        </a>
                        
                    </li>
                     <li>
                        <a href="javascript:;" class="side-menu <?php echo e(Request::is('mtn_data', 'broadband', 'other_gsm_data' ) ? 'side-menu--active' : '', false); ?> ">
                            <div class="side-menu__icon"> <i data-feather="globe"></i> </div>
                            <div class="side-menu__title"> Data Bundle<i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                            </a>
                        <ul class="">
                            <li>
                                <a href="/mtn_data" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="plus-circle"></i> </div>
                                    <div class="side-menu__title"> MTN Data  </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="/mtn_bulk_data" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="plus-circle"></i> </div>
                                    <div class="side-menu__title"> Bulk Data </div>
                                </a>
                            </li> -->
                            <li>
                                <a href="/other_gsm_data" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="plus-circle"></i> </div>
                                    <div class="side-menu__title"> Other GSM Data</div>
                                </a>
                            </li>
                            <li>
                                <a href="/broadband" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="globe"></i> </div>
                                    <div class="side-menu__title">Broadband Data</div>
                                </a>
                            </li>
                            
                        </ul>
                       
                    </li>
                    </li>
                    <li>
                        <a href="/cable" class="side-menu <?php echo e(Request::is('cable') ? 'side-menu--active' : '', false); ?>">
                            <div class="side-menu__icon"> <i data-feather="tv"></i> </div>
                            <div class="side-menu__title"> Cable TV </div>
                        </a>
                    </li>
                    <li>
                        <a href="/electricity" class="side-menu <?php echo e(Request::is('electricity') ? 'side-menu--active' : '', false); ?>">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Electricity</div>
                        </a>
                    </li>
                     <li>
                        <a href="/education" class="side-menu <?php echo e(Request::is('education') ? 'side-menu--active' : '', false); ?>">
                            <div class="side-menu__icon"> <i data-feather="book-open"></i> </div>
                            <div class="side-menu__title"> Educatiion</div>
                        </a>
                    </li>
                    
                     <li>
                        <a href="/logout" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="power"></i> </div>
                            <div class="side-menu__title"> Log Out </div>
                        </a>
                    </li>
                    	<?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
                    <li class="side-nav__devider my-6"></li>
                    <li>
                        <a href="javascript:;" class="side-menu <?php echo e(Request::is('admin') ? 'side-menu--active' : '', false); ?>">
                            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                            <div class="side-menu__title"> Admin Panel <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="/admin/users" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="plus-circle"></i> </div>
                                    <div class="side-menu__title">Users  </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="/mtn_bulk_data" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="plus-circle"></i> </div>
                                    <div class="side-menu__title"> Bulk Data </div>
                                </a>
                            </li> -->
                            <li>
                                <a href="/admin/transactions" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="plus-circle"></i> </div>
                                    <div class="side-menu__title"> Transactions</div>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/products" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="globe"></i> </div>
                                    <div class="side-menu__title">Products</div>
                                </a>
                            </li>
                            <li>
                                <a href="/create_admin" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="globe"></i> </div>
                                    <div class="side-menu__title">Create Admin</div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->