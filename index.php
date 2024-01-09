<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: sign-in');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Property Manager
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link rel="icon" type="image/png" href="./assets/img/icons/logo.png">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="../../assets/css/material-dashboard.css" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/styles.css" />

</head>

<body class="g-sidenav-show  bg-gray-200">
  <?php include('includes/sidebar2.php'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include('includes/navbar.php'); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-lg-12 position-relative z-index-2">
              <div class="card card-plain mb-4">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="d-flex flex-column h-100">
                      </div>

                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-lg-3 col-sm-5">
                    <div class="card  mb-2">
                      <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                          <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                          <p class="text-sm mb-0 text-capitalize">Bookings</p>
                          <h4 class="mb-0">281</h4>
                        </div>
                      </div>

                      <hr class="dark horizontal my-0">
                      <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-5">
                    <div class="card  mb-2">
                      <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                          <i class="material-icons opacity-10">leaderboard</i>
                        </div>
                        <div class="text-end pt-1">
                          <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                          <h4 class="mb-0">2,300</h4>
                        </div>
                      </div>

                      <hr class="dark horizontal my-0">
                      <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
                      </div>
                    </div>

                  </div>
                  <div class="col-lg-3 col-sm-5 mt-sm-0 mt-4">
                    <div class="card  mb-2">
                      <div class="card-header p-3 pt-2 bg-transparent">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                          <i class="material-icons opacity-10">store</i>
                        </div>
                        <div class="text-end pt-1">
                          <p class="text-sm mb-0 text-capitalize ">Revenue</p>
                          <h4 class="mb-0 ">34k</h4>
                        </div>
                      </div>

                      <hr class="horizontal my-0 dark">
                      <div class="card-footer p-3">
                        <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">+1% </span>than yesterday</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-5">
                    <div class="card ">
                      <div class="card-header p-3 pt-2 bg-transparent">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                          <i class="material-icons opacity-10">person_add</i>
                        </div>
                        <div class="text-end pt-1">
                          <p class="text-sm mb-0 text-capitalize ">Followers</p>
                          <h4 class="mb-0 ">+91</h4>
                        </div>
                      </div>

                      <hr class="horizontal my-0 dark">
                      <div class="card-footer p-3">
                        <p class="mb-0 ">Just updated</p>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-12">
                    <div class="card mb-4 ">
                      <div class="d-flex">
                        <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                          <i class="material-icons opacity-10" aria-hidden="true">language</i>
                        </div>
                        <h6 class="mt-3 mb-2 ms-3 ">Sales by Country</h6>
                      </div>
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-lg-12 col-md-7">
                            <div class="table-responsive">
                              <table class="table align-items-center ">
                                <tbody>
                                  <tr>
                                    <td class="w-30">
                                      <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                          <img src="./assets/img/icons/flags/US.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                          <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                          <h6 class="text-sm font-weight-normal mb-0 ">United States</h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">2500</h6>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">$230,900</h6>
                                      </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                      <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">29.9%</h6>
                                      </div>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td class="w-30">
                                      <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                          <img src="./assets/img/icons/flags/DE.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                          <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                          <h6 class="text-sm font-weight-normal mb-0 ">Germany</h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">3.900</h6>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">$440,000</h6>
                                      </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                      <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">40.22%</h6>
                                      </div>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td class="w-30">
                                      <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                          <img src="./assets/img/icons/flags/GB.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                          <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                          <h6 class="text-sm font-weight-normal mb-0 ">Great Britain</h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">1.400</h6>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">$190,700</h6>
                                      </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                      <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">23.44%</h6>
                                      </div>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td class="w-30">
                                      <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                          <img src="./assets/img/icons/flags/BR.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                          <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                          <h6 class="text-sm font-weight-normal mb-0 ">Brasil</h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">562</h6>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">$143,960</h6>
                                      </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                      <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                                        <h6 class="text-sm font-weight-normal mb-0 ">32.14%</h6>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-5">
                            <div id="map" class="mt-0 mt-lg-n4"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <?php include('includes/footer.php'); ?>