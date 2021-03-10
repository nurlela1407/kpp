  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminE-CommerceKP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('asset/dist/img/nah.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin KP</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{  Request::is('home*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>  
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>

          <li class="nav-item has-treeview {{  Request::is('master*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{  Request::is('master*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-dumpster"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('vendor.index') }}" class="nav-link {{  Request::is('master/vendor*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link {{  Request::is('master/product*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('howtobuy.index') }}" class="nav-link {{  Request::is('master/howtobuy*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>How to Buy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('location.index') }}" class="nav-link {{  Request::is('master/location*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Store Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('aboutus.index') }}" class="nav-link {{  Request::is('master/aboutus*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ekspedisi.index') }}" class="nav-link {{  Request::is('master/ekspedisi*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expedition</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link {{  Request::is('master/product*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>City and District</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link {{  Request::is('master/product*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Postal Fee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bank.index') }}" class="nav-link {{  Request::is('master/bank*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link {{  Request::is('master/product*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Panduan Ukuran</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview {{  Request::is('transaction*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{  Request::is('transaction*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Transaction
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route ('purchase-order.index') }}" class="nav-link {{  Request::is('transaction/purchase-order*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock</p>
                </a>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Reports</p>
                </a>
              </li>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>