<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
        </div>
      </div>
    </div>
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
   
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ route('users.all') }}">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Users</span>
          </a>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ route('foodmenu.all') }}">
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Foods</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ route('chefview.all') }}">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Chefs</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ route('reservation.all') }}">
            <span class="menu-icon">
              <i class="mdi mdi-chart-bar"></i>
            </span>
            <span class="menu-title">Reservation</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ route('orderview.admin') }}">
            <span class="menu-icon">
              <i class="mdi mdi-chart-bar"></i>
            </span>
            <span class="menu-title">Orders</span>
          </a>
        </li>
      </ul>
    </nav>

  </div>