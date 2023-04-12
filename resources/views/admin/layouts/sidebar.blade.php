 <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/avatar-4.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>

        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ Request::is('penonton','admin*','proses-edit-penonton*','data') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('penonton','proses-edit-penonton*','data') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route ('konser') }}"  class="nav-link {{ Request::is('penonton','proses-edit-penonton*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Penonton</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route ('data') }}"  class="nav-link {{ Request::is('data') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>


            </ul>
          </li>

      
          {{-- <li class="nav-item {{ Request::is('orderan','bukti-tf') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('orderan','bukti-tf') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Pesanan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('show_order')}}" class="nav-link {{ Request::is('orderan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orderan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('trx')}}" class="nav-link {{ Request::is('bukti-tf') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bukti Transfer</p>
                </a>
              </li>

        </ul>

              <li class="nav-item">
                <a href="{{ url('/report')}}" class="nav-link {{ Request::is('report') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>



            </ul>
          </li> --}}
      </nav>
      <!-- /.sidebar-menu -->
    </div>
