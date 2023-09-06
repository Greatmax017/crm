  <div id="mobile" class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-menu"></i>
                   
                    
                </button>

                
                <div  class="dropdown-menu dropdown-menu-end">
                    @auth
                    
                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                    <a class="dropdown-item" href="/bankdeposit">Deposit & Withdraw</a>
                    <a class="dropdown-item" target="_blank" href="https://trade.neptunefx.net">Web Terminal</a>
                    <a class="dropdown-item" href="https://download.mql5.com/cdn/web/neptune.securities.holdings/mt4/neptunesecurities4setup.exe">Client Download</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                    @else
                    <a class="dropdown-item" href="/login">Member Center</a>
                   
                    @endauth
                    
                </div> 
                   
               
            </div>