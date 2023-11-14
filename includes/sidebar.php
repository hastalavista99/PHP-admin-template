<aside class="sidenav sidebar close navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <span class="ms-1 font-weight-bold text-white text-uppercase h5">Property Finder</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active" href="../index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white " href="tables/tenants_view.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">groups</i>
            </div>
            <span class="nav-link-text ms-1">Tenants</span>
          </a>
        </li>
        <li class="nav-item mt-2">
        <a class="nav-link btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#properties-collapse" aria-expanded="false">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group</i>
          </div>
          <span class="nav-link-text ms-1">Properties</span>
        </a>
        <div class="collapse" id="properties-collapse">
          <ul class="btn-toggle-nav list-unstyled">
            <li><a href="property_units.php" class="light-link text-white drop ms-6">Add Property Units</a></li>
            <li><a href="tables/property_view.php" class="light-link text-white drop ms-6">View Property</a></li>
          </ul>
        </div>
        </li>
        <li class="nav-item mt-2">
        <a class="nav-link btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#lease-collapse" aria-expanded="false">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">apartment</i>
          </div>
          <span class="nav-link-text ms-1">Leases / Tenancy</span>
        </a>
        <div class="collapse" id="lease-collapse">
          <ul class="btn-toggle-nav list-unstyled">
            <li><a href="tables/lease_view.php" class="drop light-link text-white ms-6 ">Active Leases</a></li>
            <li><a href="forms/lease_info.php" class="light-link text-white drop ms-6">Edit Leasing Info</a></li>
          </ul>
        </div>
        </li>
        <li class="nav-item mt-2">
        <a class="nav-link btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#inventory-collapse" aria-expanded="false">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">inventory</i>
          </div>
          <span class="nav-link-text ms-1">Inventory</span>
        </a>
        <div class="collapse" id="inventory-collapse">
          <ul class="btn-toggle-nav list-unstyled">
            <li><a href="#" class="light-link text-white drop ms-6">Property Units</a></li>
            <li><a href="#" class="light-link text-white drop ms-6">Create Property</a></li>
          </ul>
        </div>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white " href="forms/rent_payment.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Invoices</span>
          </a>
        </li>
        <li class="nav-item mt-2">
        <a class="nav-link btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#reports-collapse" aria-expanded="false">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">Reports</span>
        </a>
        <div class="collapse" id="reports-collapse">
          <ul class="btn-toggle-nav list-unstyled">
            <li><a href="forms/service_request.php" class="light-link text-white drop ms-6">Service request</a></li>
            <li><a href="#" class="light-link text-white drop ms-6">Create Property</a></li>
          </ul>
        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_activity</i>
            </div>
            <span class="nav-link-text ms-1">Support Tickets</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">event</i>
            </div>
            <span class="nav-link-text ms-1">Calendar Events</span>
          </a>
        </li>
        <!--<li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-up.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>-->
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">

        <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Macrologic systems</a>
      </div>
    </div>
  </aside>


