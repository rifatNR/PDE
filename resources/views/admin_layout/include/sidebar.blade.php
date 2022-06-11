<style>
  .brand-image {
    max-height: 50px !important;
    float: none !important;
    line-height: .8 !important;
    margin-left: 0px !important;
    margin-right: 0px !important;
    margin-top: 0px !important;
    width: auto !important;
  }

  .blue:hover {
     color: blue !important;
     font-weight: 600 !important;
  }

  .b-text {
    font-size: 25px !important;
    font-weight: 600 !important;
    position: relative;
    top: 3px;
  }

  .user-action {
    position: relative !important;
    top: 20px !important;
  }

  /*.u-img {*/
  /*  width: 45px !important;*/
  /*  height: auto !important;*/
  /*  background: grey !important;*/
  /*}*/

  .u-name {
    /*position: relative !important;*/
    /*top: -7px !important;*/
    text-transform: capitalize !important;
    font-weight: 600;
    font-size: 17px;
  }

  .d-toggle::after {
  /*  display: contents !important;*/
  /*  margin-left: .255em !important;*/
  /*  vertical-align: .255em !important;*/
    content: none !important;
  /*  border-top: .3em solid !important;*/
  /*  border-right: .3em solid transparent !important;*/
  /*  border-bottom: 0 !important;*/
  /*  border-left: .3em solid transparent !important;*/
  /*  position: relative !important;*/
  /*  top: 5px !important;*/
  /*  right: 8px !important;*/
  }

  /*.d-toggle {*/
  /*  background: grey !important;*/
  /*  border-radius: 50% !important;*/
  /*  height: 20px !important;*/
  /*  width: 20px !important;*/
  /*  position: relative !important;*/
  /*  top: 10px !important;*/
  /*}*/

</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('index') }}" class="brand-link text-center">
         <img src="{{ asset('assets/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: 10;"> <!--removed-class: img-circle elevation-3 -->
        <span class="brand-text b-text">PDE</span>
    </a>
    <!-- Sidebar -->
 
    @if(Auth::user()->hasRole('admin'))
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex overflow-not-hidden justify-content-between user-action">
                <div>
                    <div class="image">
                      @if(isset(auth()->user()->profile->pro_image))
                        <img src="{{ asset('profile_image'. '/' . auth()->user()->profile->pro_image)}}" class="img-circle elevation-2 user-panel-img u-img" alt="User Image">
                      @else
                        <img src="{{ asset('images/admin.jpg')}}" class="img-circle elevation-2 img u-img" alt="User Image">
                      @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block u-name">{{ auth()->user()->name }}</a>
                    </div>
                </div>
                <div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle d-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-chevron-circle-down" style="color: white;"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            {{-- <a class="dropdown-item" href="#">Profile</a> --}}
                            <a class="dropdown-item blue"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="">
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            {{-- <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div> --}}

            <!-- Sidebar Menu -->
            <nav class="">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{ route('admin.indexx') }}" class="nav-link @if(Route::currentRouteName() == 'admin.indexx') active @endif">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ route('admin.header.index') }}" class="nav-link  @if(Route::currentRouteName() == 'admin.header.index') active @endif">
                      <i class="nav-icon fas fa-heading"></i>
                        <p>
                          Header Tags
                        </p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ route('admin.users.index') }}" class="nav-link  @if(Route::currentRouteName() == 'admin.users.index' || Route::currentRouteName() == 'admin.user.info') active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                          Users
                        </p>
                      </a>
                    </li>

                    {{-- <li class="nav-item">
                      <a href="{{ route('admin.freeorder.index') }}" class="nav-link  @if(Route::currentRouteName() == 'admin.freeorder.index' || Route::currentRouteName() == 'admin.free-trial.info') active @endif">
                        <i class="nav-icon fas fa-certificate"></i>
                        <p>
                          Free Trial
                        </p>
                      </a>
                    </li> --}}

                    <li class="nav-item" id="FreeLi">
                      <a href="#" id="toggle" onclick="toggle3()" class="nav-link 
                          @if(Route::currentRouteName() == 'admin.freeorder.index' || Route::currentRouteName() == 'admin.free-trial.info')
                            active 
                          @endif">
                          <i class="nav-icon fas fa-certificate"></i>
                          <p>
                            Free Trial
                            <i class="right fas fa-angle-left" id="icon3"></i>
                          </p>
                      </a>
                      <ul class="nav ml-3" id="FreeLink">
                        <li class="nav-item">
                            <a href="{{ route('admin.freeorder.index', ['status'=>'all']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/all') !== false) text-primary @endif">
                              <i class="nav-icon fas fa-globe"></i>
                              <p>All Free Trial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.freeorder.index', ['status'=>'new']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/new') !== false) text-primary @endif">
                              <i class="nav-icon fas fa-folder-open"></i>
                              <p>New Free Trial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.freeorder.index', ['status'=>'accepted']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/accepted') !== false) text-primary @endif">
                              <i class="nav-icon fas fa-vote-yea text-success"></i>
                              <p>Accepted Free Trial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.freeorder.index', ['status'=>'rejected']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/rejected') !== false) text-primary @endif">
                              <i class="nav-icon fas fa-times-circle text-danger"></i>
                              <p>Rejected Free Trial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.freeorder.index', ['status'=>'processing']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/processing') !== false) text-primary @endif">
                              <i class="nav-icon fas fa-spinner fa-spin text-info"></i>
                              <p>Processing Free Trial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.freeorder.index', ['status'=>'qc']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/qc') !== false) text-primary @endif">
                              <i class="nav-icon fas fa-clipboard-list"></i>
                              <p>QC Free Trial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('admin.freeorder.index', ['status'=>'completed']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/completed') !== false) text-primary @endif">
                            <i class="nav-icon fas fa-check-double"></i>
                            <p>Completed Free Trial</p>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="nav-item" id="orderLi">
                      <a href="#" id="toggle" onclick="toggle()" class="nav-link 
                          @if(Route::currentRouteName() == 'admin.order.all' || Route::currentRouteName() == 'admin.order.new' || Route::currentRouteName() == 'admin.order.accepted' || Route::currentRouteName() == 'admin.order.rejected' || Route::currentRouteName() == 'admin.order.processing' || Route::currentRouteName() == 'admin.order.qc' || Route::currentRouteName() == 'admin.order.completed' || Route::currentRouteName() == 'admin.order.info')
                            active 
                          @endif">
                        <i class="nav-icon fas fa-luggage-cart"></i>
                        <p>
                          Orders
                          <i class="right fas fa-angle-left" id="icon"></i>
                        </p>
                      </a>
                      <ul class="nav ml-3" id="orderLink">
                        <li class="nav-item">
                            <a href="{{ route('admin.order.all') }}" class="nav-link @if(Route::currentRouteName() == 'admin.order.all') text-primary @endif">
                              <i class="nav-icon fas fa-globe"></i>
                              <p>All Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order.new') }}" class="nav-link @if(Route::currentRouteName() == 'admin.order.new') text-primary @endif">
                              <i class="nav-icon fas fa-folder-open"></i>
                              <p>New Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order.accepted') }}" class="nav-link @if(Route::currentRouteName() == 'admin.order.accepted') text-primary @endif">
                              <i class="nav-icon fas fa-vote-yea text-success"></i>
                              <p>Accepted Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order.rejected') }}" class="nav-link @if(Route::currentRouteName() == 'admin.order.rejected') text-primary @endif">
                              <i class="nav-icon fas fa-times-circle text-danger"></i>
                              <p>Rejected Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order.processing') }}" class="nav-link @if(Route::currentRouteName() == 'admin.order.processing') text-primary @endif">
                              <i class="nav-icon fas fa-spinner fa-spin text-info"></i>
                              <p>Processing Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order.qc') }}" class="nav-link @if(Route::currentRouteName() == 'admin.order.qc') text-primary @endif">
                              <i class="nav-icon fas fa-clipboard-list"></i>
                              <p>QC Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('admin.order.completed') }}" class="nav-link @if(Route::currentRouteName() == 'admin.order.completed') text-primary @endif">
                            <i class="nav-icon fas fa-check-double"></i>
                            <p>Completed Order</p>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link @if(Route::currentRouteName() == 'admin.invoice.all' || Route::currentRouteName() == 'admin.invoice.new') active @endif" id="toggle" onclick="toggle1()">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                          Invoice
                          <i class="right fas fa-angle-left" id="icon1"></i>
                        </p>
                      </a>
                      <ul class="nav ml-3" id="invoiceLink">
                        <li class="nav-item">
                          <a href="{{ route('admin.invoice.new') }}" class="nav-link  @if(Route::currentRouteName() == 'admin.invoice.new') text-primary @endif"">
                            <i class="nav-icon fas fa-plus-square"></i>
                            <p>Create New Invoice</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('admin.invoice.all') }}" class="nav-link  @if(Route::currentRouteName() == 'admin.invoice.all') text-primary @endif"">
                            <i class="nav-icon fas fas fa-receipt"></i>
                            <p>All Invoice</p>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="service nav-item">
                      <a href="{{ route('admin.service.index') }}"  id="serviceNav"
                        class="nav-link 
                        @if(Route::currentRouteName() == 'admin.service.index' || Route::currentRouteName() == 'admin.service.add' || Route::currentRouteName() == 'admin.service.edit') 
                          active 
                        @endif">
                          <i class="nav-icon far fa-images"></i>
                          {{-- <i class="nav-icon fas fa-th"></i> --}}
                          {{-- <img id="serviceImg" class="filter-grey nav-icon service-icon" src="https://img.icons8.com/ios-filled/50/000000/service.png"/> --}}
                          <p>
                            Services
                          </p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ route('admin.portfolio.index') }}" class="nav-link @if(Route::currentRouteName() == 'admin.portfolio.index') active @endif">
                          {{-- <i class="nav-icon fas fa-th"></i> --}}
                          <i class="nav-icon fas fa-briefcase"></i>
                          <p>
                            Portfolio
                          </p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ route('admin.pricing.index') }}" class="nav-link @if(Route::currentRouteName() == 'admin.pricing.index') active @endif"">
                          <i class="nav-icon fas fa-tags"></i>
                          <p>
                            Pricing
                          </p>
                      </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ route('admin.placeorder.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Place Order
                            </p>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="{{ route('admin.freeorder.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Free Order
                            </p>
                        </a>
                    </li> --}}
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    @else       
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex overflow-not-hidden justify-content-between user-action">
                <div>
                    <div class="image">
                      @if(isset(auth()->user()->profile->pro_image))
                        <img src="{{ asset('profile_image'. '/' . auth()->user()->profile->pro_image)}}" class="img-circle elevation-2 img u-img" alt="User Image">
                      @else
                        <img src="{{ asset('images/no-pic.png')}}" class="img-circle elevation-2 img u-img" alt="User Image">
                      @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block u-name">{{ auth()->user()->name }}</a>
                    </div>
                </div>
                <div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle d-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-chevron-circle-down" style="color:white;"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item blue" href="{{ route('user.dashboard.profile') }}">Profile</a>
                            <a class="dropdown-item blue"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="">
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            {{-- <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div> --}}

            <!-- Sidebar Menu -->
            <nav class="">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                      <li class="nav-item">
                          <a href="{{ route('user.dashboard') }}" class="nav-link @if(Route::currentRouteName() == 'user.dashboard') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>

                      <li class="nav-item" id="FreeLi">
                        <a href="#" id="toggle" onclick="toggle3()" class="nav-link 
                            @if(Route::currentRouteName() == 'user.free.index' || Route::currentRouteName() == 'user.free.info')
                              active 
                            @endif">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>
                              Free Trial
                              <i class="right fas fa-angle-left" id="icon3"></i>
                            </p>
                        </a>
                        <ul class="nav ml-3" id="FreeLink">
                          <li class="nav-item">
                              <a href="{{ route('user.free.index', ['status'=>'all']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/all') !== false) text-primary @endif">
                                <i class="nav-icon fas fa-globe"></i>
                                <p>All Free Trial</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('user.free.index', ['status'=>'new']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/new') !== false) text-primary @endif">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>New Free Trial</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('user.free.index', ['status'=>'accepted']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/accepted') !== false) text-primary @endif">
                                <i class="nav-icon fas fa-vote-yea text-success"></i>
                                <p>Accepted Free Trial</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('user.free.index', ['status'=>'rejected']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/rejected') !== false) text-primary @endif">
                                <i class="nav-icon fas fa-times-circle text-danger"></i>
                                <p>Rejected Free Trial</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('user.free.index', ['status'=>'processing']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/processing') !== false) text-primary @endif">
                                <i class="nav-icon fas fa-spinner fa-spin text-info"></i>
                                <p>Processing Free Trial</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('user.free.index', ['status'=>'qc']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/qc') !== false) text-primary @endif">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>QC Free Trial</p>
                              </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('user.free.index', ['status'=>'completed']) }}" class="nav-link @if (strpos(url()->current(), 'free-trial/completed') !== false) text-primary @endif">
                              <i class="nav-icon fas fa-check-double"></i>
                              <p>Completed Free Trial</p>
                            </a>
                          </li>
                        </ul>
                      </li>

                        <li class="nav-item has-treeview">
                            <a href="#" id="toggle" onclick="toggle" class="nav-link 
                            @if(Route::currentRouteName() == 'user.dashboard.order.all' || Route::currentRouteName() == 'user.dashboard.order.new' || Route::currentRouteName() == 'user.dashboard.order.accepted' || Route::currentRouteName() == 'user.dashboard.order.rejected' || Route::currentRouteName() == 'user.dashboard.order.processing' || Route::currentRouteName() == 'user.dashboard.order.qc' || Route::currentRouteName() == 'user.dashboard.order.completed' || Route::currentRouteName() == 'user.dashboard.order.info') 
                            active 
                            @endif">
                              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                              <i class="nav-icon fas fa-luggage-cart"></i>
                              <p>
                                Orders
                                <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview ml-3" id="order" style="
                            @if(Route::currentRouteName() == 'user.dashboard.order.all' || Route::currentRouteName() == 'user.dashboard.order.new' || Route::currentRouteName() == 'user.dashboard.order.accepted' || Route::currentRouteName() == 'user.dashboard.order.rejected' || Route::currentRouteName() == 'user.dashboard.order.processing' || Route::currentRouteName() == 'user.dashboard.order.qc' || Route::currentRouteName() == 'user.dashboard.order.completed' || Route::currentRouteName() == 'user.dashboard.order.info') 
                            display: block
                            @else
                            display: none;
                            @endif
                            ">
                              <li class="nav-item">
                                <a href="{{ route('user.dashboard.order.all') }}" class="nav-link @if(Route::currentRouteName() == 'user.dashboard.order.all') text-primary @endif">
                                  <i class="nav-icon fas fa-globe"></i>
                                  <p>All Orders</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('user.dashboard.order.new') }}" class="nav-link @if(Route::currentRouteName() == 'user.dashboard.order.new') text-primary @endif"">
                                  <i class="nav-icon fas fa-folder-open"></i>
                                  <p>New Orders</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('user.dashboard.order.accepted') }}" class="nav-link @if(Route::currentRouteName() == 'user.dashboard.order.accepted') text-primary @endif"">
                                  <i class="nav-icon fas fa-vote-yea text-success"></i>
                                  <p>Accepted Orders</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('user.dashboard.order.rejected') }}" class="nav-link @if(Route::currentRouteName() == 'user.dashboard.order.rejected') text-primary @endif"">
                                    <i class="nav-icon fas fa-times-circle text-danger"></i>
                                  <p>Rejected Orders</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('user.dashboard.order.processing') }}" class="nav-link @if(Route::currentRouteName() == 'user.dashboard.order.processing') text-primary @endif"">
                                  <i class="nav-icon fas fa-spinner fa-spin text-info"></i>
                                  <p>Processing Orders</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('user.dashboard.order.qc') }}" class="nav-link @if(Route::currentRouteName() == 'user.dashboard.order.qc') text-primary @endif"">
                                  <i class="nav-icon fas fa-clipboard-list"></i>
                                  <p>QC Orders</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('user.dashboard.order.completed') }}" class="nav-link @if(Route::currentRouteName() == 'user.dashboard.order.completed') text-primary @endif"">
                                  <i class="nav-icon fas fa-check-double"></i>
                                  <p>Completed Orders</p>
                                </a>
                              </li>
                            </ul>
                        </li>
                        
                    <li class="nav-item">
                        <a href="{{ route('user.dashboard.invoice.all') }}" class="nav-link 
                          @if(Route::currentRouteName() == 'user.dashboard.invoice.all' || Route::currentRouteName() == 'user.dashboard.invoice.paid' || Route::currentRouteName() == 'user.dashboard.invoice.unpaid' || Route::currentRouteName() == 'user.dashboard.invoice.overdue' || Route::currentRouteName() == 'user.dashboard.invoice.view')
                              active 
                          @endif">
                          <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>
                                Invoice
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('admin.placeorder.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Place Order
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.freeorder.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Free Order
                            </p>
                        </a>
                    </li> --}}
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    @endif
    
    <!-- /.sidebar -->
</aside>
