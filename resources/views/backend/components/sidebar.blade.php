<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">W3Tech</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

          <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Reza</a>
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
                <a href="#" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Users</p>
                </a>
          </li>
          <li class="nav-header">For Admin Bus Details</li>
          <li class="nav-item">
            <a href="{{ route('bus.create') }}" class="nav-link">
              <i class="fab fa-sellcast nav-icon"></i>
              <p>Add Bus Trip </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('bus.index') }}" class="nav-link">
              <i class="fab fa-sellcast nav-icon"></i>
              <p>Bus Trip </p>
            </a>
        </li>

          <li class="nav-header">For USER</li>
          <li class="nav-item">
            <a href="{{ route('find.trip') }}" class="nav-link">
              <i class="fab fa-sellcast nav-icon"></i>
              <p>Find Trip</p>
            </a>
        </li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
