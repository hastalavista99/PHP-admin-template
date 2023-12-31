<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    PHP E-COMMERCE
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css" rel="stylesheet" />
  <style>
    <?php include('../assets/css/material-dashboard.css'); ?>
  </style>
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
          <a class="nav-link text-white active" href="../tables/landlords_view.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Landlords</span>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white" href="../tables/tenants_view.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">groups</i>
            </div>
            <span class="nav-link-text ms-1">Tenants</span>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white " href="../tables/property_view.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">other_houses</i>
            </div>
            <span class="nav-link-text ms-1">Properties</span>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-white " href="../tables/units_view.php">
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
            <li><a href="../tables/lease_view.php" class="drop light-link text-white ms-6 ">Active Leases</a></li>
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
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>

        </div>
      </div>
    </nav>

    <div class="container">
        <div class="row bg-white border-radius-lg shadow-primary me-2 ms-2 my-3">
            <div class="col-md-12">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h5 class="text-white text-capitalize ps-3">Lease Info</h5>
              </div>
            </div>
                <form class="row g-3 my-1">
                <div class="col-md-3">
                    <label for="inputState" class="form-label">Lease Type</label>
                    <select id="inputState" class="form-select ps-2">
                    <option selected>Choose...</option>
                    <option value="">Personal Lease</option>
                    <option value="">Corporate Lease</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="applicationFee" class="form-label">Application Fee</label>
                    <input type="number" class="form-control ps-2" id="applicationFee" value="$">
                </div>
                <div class="col-md-4">
                    <label for="securityDeposit" class="form-label">Security Deposit</label>
                    <input type="number" class="form-control ps-2" id="securityDeposit">
                </div>
                <div class="col-md-4">
                    <label for="lease1mrent" class="form-label">1 - Month Lease Rent</label>
                    <input type="number" class="form-control ps-2" id="lease1mrent">
                </div>
                <div class="col-md-4">
                    <label for="lease6mrent" class="form-label">6 - Month Lease Rent</label>
                    <input type="number" class="form-control ps-2" id="lease6mrent">
                </div>
                <div class="col-md-3">
                    <label for="lease12mrent" class="form-label">12 - Month Lease Rent</label>
                    <input type="number" class="form-control ps-2" id="lease12mrent">
                </div>
                <div class="col-md-12">
                  <label for=""></label>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Sub-leasing Allowed
                    </label>
                    </div>
                </div>
                <div class="col-md-5">
                <label for=""></label>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Lease Termination Allowed
                    </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="terminationCost" class="form-label">Termination Cost</label>
                    <input type="number" class="form-control ps-2" id="terminationCost">
                </div>
                <div class="col-md-6">
                    <label for="leasingClause" class="form-label">Additional Leasing Clauses</label>
                    <textarea type="text" class="form-control ps-2" id="leasingClause"></textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php include('../includes/footer.php'); ?>
