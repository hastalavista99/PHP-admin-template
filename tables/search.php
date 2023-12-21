<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php include '../config/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Properties
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
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
          <a class="nav-link text-white " href="../index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white" href="landlords_view.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Landlords</span>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white" href="tenants_view.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">groups</i>
            </div>
            <span class="nav-link-text ms-1">Tenants</span>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white " href="property_view.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">other_houses</i>
            </div>
            <span class="nav-link-text ms-1">Properties</span>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white " href="units_view.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">home_work</i>
            </div>
            <span class="nav-link-text ms-1">Units</span>
          </a>
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
              <li><a href="lease_view.php" class="drop light-link text-white ms-6 ">Active Leases</a></li>
              <li><a href="../forms/lease_info.php" class="light-link text-white drop ms-6">Edit Leasing Info</a></li>
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
          <a class="nav-link text-white " href="../tables/invoice_view.php">
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
              <li><a href="#" class="light-link text-white drop ms-6">Property Units</a></li>
              <li><a href="#" class="light-link text-white drop ms-6">Create Property</a></li>
            </ul>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">event</i>
            </div>
            <span class="nav-link-text ms-1">Calendar Events</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">

        <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Macrologic systems</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-material-dashboard">Online Builder</a>
            </li>
            <li class="mt-2">
              <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="d-flex justify-content-between">
              <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
                <div class="pt-1 pb-1">
                  <h4 class="row text-capitalize ps-3">Search Results</h4>
                </div>
              </div>
              
            </div>
            <div class="card-body px-0 pb-2">
              <div class="row d-flex justify-content-between align-items-center ms-2 me-2">
                <div class="col-sm-12 col-md-6 mt-1">
                  <div class="dt-buttons btn-group">
                    <button class="btn btn-secondaty buttons-copy buttons-html5 btn-success" tabindex="0" aria-controls="example" type="button">
                      <span>Copy</span>
                    </button>
                    <a href="#" id="exportExcel" name="landlord_excel" class="btn btn-secondaty buttons-excel buttons-html5 btn-success" tabindex="0" aria-controls="example" type="button">
                      <span>Excel</span>
                    </a>
                    <a href="#" id="exportPDF" name="landlord_pdf" class="btn btn-secondaty buttons-excel buttons-html5 btn-success" tabindex="0" aria-controls="example" type="button">
                      <span>PDF</span>
                    </a>
                    <div class="btn-group">
                      <button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis btn-success" tabindex="0" aria-controls="example" type="button" aria-haspopup="true" aria-expanded="false">
                        <span>Column Visibility</span>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-5">
                  <div id="example-filter" class="dataTables_filter d-flex justify-content-center">
                    <!-- <label for="searchBar" class="pe-2">
                      Search:
                    </label> -->
                    <input type="search" class="form-control form-control-sm" name="search" id="searchBar" aria-controls="example">
                    <button type="submit" class="btn btn-success my-0 ms-2" name="search-btn"><i class="material-icons opacity-10">search</i></button>
                  </div>
                  
                </div>
              </div>
              <div class="table-responsive p-0">
                <table class="table table-striped table-hover align-items-center mb-0">
                    
                  <?php 
                  // LANDLORD SEARCH
                    if (isset($_POST['landlord_search'])) {
                        $search = $_POST['search_landlord'];

                        $sql = "SELECT * FROM landlords WHERE id LIKE '%$search%' OR name LIKE '%$search%'";
                        $result = mysqli_query($con,$sql);

                        if($result){
                            if(mysqli_num_rows($result) > 0){
                                echo '
                                    <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">phone number</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no of properties</th>
                                    </tr>
                                    </thead>
                                ';
                                while($row = mysqli_fetch_assoc($result)){
                                echo '
                                <tbody>
                                    <tr>
                                        <td class="text-center">'.$row['id'].'</td>
                                        <td class="text-center">'.$row['name'].'</td>
                                        <td class="text-center">'.$row['phone_number'].'</td>
                                        <td class="text-center">'.$row['email'].'</td>
                                        <td class="text-center">'.$row['number_of_properties'].'</td>
                                    </tr>
                                </tbody>
                                ';
                                }
                            } else {
                                echo '<h2 class="text-danger ms-4">Data not found</h2>';
                            }
                        }
                    
                    }

                    // PROPERTY SEARCH
                    if (isset($_POST['property_search'])) {
                        $search = $_POST['search_property'];

                        $sql = "SELECT * FROM properties WHERE id LIKE '%$search%' OR name LIKE '%$search%' OR location LIKE '%$search%'";
                        $result = mysqli_query($con,$sql);

                        if($result){
                            if(mysqli_num_rows($result) > 0){
                                echo '
                                    <thead>
                                    <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">location</th>
                                    <!--<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">landlord</th>-->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no of units</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">occupied units</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">vacant units</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no of units</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                ';
                                while($row = mysqli_fetch_assoc($result)){
                                echo '
                                <tbody>
                                    <tr>
                                        <td class="text-center">'.$row['id'].'</td>
                                        <td class="text-center">'.$row['name'].'</td>
                                        <td class="text-center">'.$row['location'].'</td>
                                        
                                        <td class="text-center">'.$row['number_of_units'].'</td>
                                        <td class="text-center">'.$row['occupied_units'].'</td>
                                        <td class="text-center">'.$row['vacant_units'].'</td>
                                        <td class="text-center">'.$row['active_status'].'</td>
                                        <td class="text-center">'.$row['number_of_units'].'</td>
                                    </tr>
                                </tbody>
                                ';
                                }
                            } else {
                                echo '<h2 class="text-danger ms-4">Data not found</h2>';
                            }
                        }
                    
                    }

                    // TENANTS SEARCH
                    if (isset($_POST['tenant_search'])) {
                        $search = $_POST['search_tenant'];

                        // $sql = "SELECT * FROM tenants WHERE id LIKE '%$search%' OR name LIKE '%$search%'";
                        $sql = "SELECT tenants.id, tenants.name, tenants.email, tenants.phone_number, tenants.id_number, properties.id, properties.name AS property_name, tenants.unit_id FROM tenants LEFT JOIN properties ON tenants.property_id = properties.id WHERE properties.name LIKE '%$search%' OR tenants.name LIKE '%$search%'";
                        $result = mysqli_query($con,$sql);

                        if($result){
                            if(mysqli_num_rows($result) > 0){
                                echo '
                                    <thead>
                                    <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tenant id</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id number</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit number</th>
                                    <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                ';
                                while($row = mysqli_fetch_assoc($result)){
                                echo '
                                <tbody>
                                    <tr>
                                        <td class="text-center">'.$row['id'].'</td>
                                        <td class="text-center">'.$row['name'].'</td>
                                        <td class="text-center">'.$row['email'].'</td>
                                        <td class="text-center">'.$row['phone_number'].'</td>
                                        <td class="text-center">'.$row['id_number'].'</td>
                                        <td class="text-center">'.$row['property_name'].'</td>
                                        <td class="text-center">'.$row['unit_id'].'</td>
                                    </tr>
                                </tbody>
                                ';
                                }
                            } else {
                                echo '<h2 class="text-danger ms-4">Data not found</h2>';
                            }
                        }
                    
                    }


                    // UNITS SEARCH
                    if (isset($_POST['unit_search'])) {
                        $search = $_POST['search_unit'];

                        // $sql = "SELECT * FROM tenants WHERE id LIKE '%$search%' OR name LIKE '%$search%'";
                        $sql = "SELECT units.id, units.name, units.unit_number, units.bedrooms, units.bathrooms, properties.id, properties.name AS property_name, units.commission, units.rent, units.deposit, units.available, units.reserved, units.is_occupied, units.availability_date FROM units LEFT JOIN properties ON units.property_id = properties.id WHERE properties.name LIKE '%$search%' OR units.name LIKE '%$search%' OR units.unit_number LIKE '%$search%'";
                        $result = mysqli_query($con,$sql);

                        if($result){
                            if(mysqli_num_rows($result) > 0){
                                echo '
                                    <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property name</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit name</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit no</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">bedrooms</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">bathrooms</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">commission</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rent</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">deposit</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">available</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">reserved</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">occupied</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">availability date</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                ';
                                while($row = mysqli_fetch_assoc($result)){
                                echo '
                                <tbody>
                                    <tr>
                                        <td class="text-center">'.$row['id'].'</td>
                                        <td class="text-center">'.$row['property_name'].'</td>
                                        <td class="text-center">'.$row['name'].'</td>
                                        <td class="text-center">'.$row['unit_number'].'</td>
                                        <td class="text-center">'.$row['bedrooms'].'</td>
                                        <td class="text-center">'.$row['bathrooms'].'</td>
                                        <td class="text-center">'.$row['commission'].'</td>
                                        <td class="text-center">'.$row['rent'].'</td>
                                        <td class="text-center">'.$row['deposit'].'</td>
                                        <td class="text-center">'.$row['available'].'</td>
                                        <td class="text-center">'.$row['reserved'].'</td>
                                        <td class="text-center">'.$row['is_occupied'].'</td>
                                        <td class="text-center">'.$row['availability_date'].'</td>
                                        <td class="text-center"><!--<button class="btn btn-success"><i class="material-icons opacity-10">edit</i></button>-->
                                        <a style="color: red;" name="delete_unit_id" href="../config/dbcon.php?delete_unit_id=' . $row["id"] . '"><i class="material-icons opacity-10">delete</i></a></td>
                                    </tr>
                                </tbody>
                                ';
                                }
                            } else {
                                echo '<h2 class="text-danger ms-4">Data not found</h2>';
                            }
                        }
                        if (isset($_POST['property_search'])) {
                          $search = $_POST['search_property'];
  
                          $sql = "SELECT * FROM properties WHERE id LIKE '%$search%' OR name LIKE '%$search%' OR location LIKE '%$search%'";
                          $result = mysqli_query($con,$sql);
  
                          if($result){
                              if(mysqli_num_rows($result) > 0){
                                  echo '
                                      <thead>
                                      <tr>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property name</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">location</th>
                                      <!--<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">landlord</th>-->
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no of units</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">occupied units</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">vacant units</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no of units</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                      </tr>
                                      </thead>
                                  ';
                                  while($row = mysqli_fetch_assoc($result)){
                                  echo '
                                  <tbody>
                                      <tr>
                                          <td class="text-center">'.$row['id'].'</td>
                                          <td class="text-center">'.$row['name'].'</td>
                                          <td class="text-center">'.$row['location'].'</td>
                                          
                                          <td class="text-center">'.$row['number_of_units'].'</td>
                                          <td class="text-center">'.$row['occupied_units'].'</td>
                                          <td class="text-center">'.$row['vacant_units'].'</td>
                                          <td class="text-center">'.$row['active_status'].'</td>
                                          <td class="text-center">'.$row['number_of_units'].'</td>
                                      </tr>
                                  </tbody>
                                  ';
                                  }
                              } else {
                                  echo '<h2 class="text-danger ms-4">Data not found</h2>';
                              }
                          }
                      
                      }
  
                      // INVOICE SEARCH
                      if (isset($_POST['invoice_search'])) {
                          $search = $_POST['search_invoice'];
  
                          // $sql = "SELECT * FROM tenants WHERE id LIKE '%$search%' OR name LIKE '%$search%'";
                          $sql = "SELECT invoices.id, tenants.name AS tenant_name, landlords.name AS landlord_name, tenants.unit_number AS unit_number, invoices.rent_due, properties.name AS property_name, invoices.unit_id FROM invoices LEFT JOIN properties ON invoices.property_id = properties.id LEFT JOIN landlords ON invoices.landlord_id = landlords.id LEFT JOIN tenants ON invoices.tenant_id = tenants.id WHERE properties.name LIKE '%$search%' OR tenants.name LIKE '%$search%'";
                          $result = mysqli_query($con,$sql);
  
                          if($result){
                              if(mysqli_num_rows($result) > 0){
                                  echo '
                                      <thead>
                                      <tr>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">landlord</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Property</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit number</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rent</th>
                                      
                                      <th class="text-secondary opacity-7"></th>
                                      </tr>
                                      </thead>
                                  ';
                                  while($row = mysqli_fetch_assoc($result)){
                                  echo '
                                  <tbody>
                                      <tr>
                                          <td class="text-center">'.$row['id'].'</td>
                                          <td class="text-center">'.$row['tenant_name'].'</td>
                                          <td class="text-center">'.$row['landlord_name'].'</td>
                                          <td class="text-center">'.$row['property_name'].'</td>
                                          <td class="text-center">'.$row['unit_number'].'</td>
                                          <td class="text-center">'.$row['rent_due'].'</td>
                                          
                                      </tr>
                                  </tbody>
                                  ';
                                  }
                              } else {
                                  echo '<h2 class="text-danger ms-4">Data not found</h2>';
                              }
                          }
                      
                      }
  
                    
                    }
                    
                  
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <?php include('../includes/footer.php') ?>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>


  <!-- EXPORTING TO EXCEL -->
  <script>
    function exportToExcel() {
      // Prevent the default behavior of the link
      event.preventDefault();

      // Send an AJAX request to the server
      var xhr = new XMLHttpRequest();
      xhr.open('GET', '../config/excel.php', true);
      xhr.responseType = 'blob'; // Set the response type to blob
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Create a blob from the response
          var blob = new Blob([xhr.response], {
            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
          });

          // Create a link element and trigger the download
          var link = document.createElement('a');
          link.href = window.URL.createObjectURL(blob);
          link.download = 'landlord_data.xlsx';

          // Append the link to the document and click it
          document.body.appendChild(link);
          link.click();

          // Remove the link from the document
          document.body.removeChild(link);
        }
      };
      xhr.send();
    }

    // Attach the function to the click event of the link
    document.getElementById('exportExcel').addEventListener('click', exportToExcel);
  </script>
  <!-- EXPORT TO PDF -->
  <script>
    function exportToPdf() {
        // Prevent the default behavior of the link
        event.preventDefault();

        // Send an AJAX request to the server
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'pdf.php', true);
        xhr.responseType = 'blob'; // Set the response type to blob
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Create a blob from the response
                var blob = new Blob([xhr.response], { type: 'application/pdf' });

                // Create a link element and trigger the download
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'landlord_data.pdf';

                // Append the link to the document and click it
                document.body.appendChild(link);
                link.click();

                // Remove the link from the document
                document.body.removeChild(link);
            }
        };
        xhr.send();
    }

    // Attach the function to the click event of the link
    document.getElementById('exportPDF').addEventListener('click', exportToPdf);
</script>




  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <!--   Core JS Files   -->

  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>