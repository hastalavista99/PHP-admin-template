<!-- This is where the tenant goes after signing in, it includes all his/her rent transactions -->

<?php
include '../config/dbcon.php';
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../sign-in');
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
  <link rel="icon" type="image/png" href="../assets/img/icons/logo.png">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/material-dashboard.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/material-dashboard.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/styles.css" />
  <!-- <style>
    <?php include('../assets/css/material-dashboard.css'); ?>
    <?php include('../assets/css/styles.css'); ?>
  </style> -->

</head>

<body class="g-sidenav-show  bg-gray-200">

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container py-4">
      <div class="col-12">
        <div class="d-flex align-content-end justify-content-end me-4">
          <a href="../tenant-sign-in"><i class="material-icons opacity-10 text-danger fs-2">exit_to_app</i></a>
        </div>
        <div class="card my-4 text-center">

          <h1 class="">Welcome, <?php
                                $name = $_SESSION['username'];
                                $id = $_SESSION['id'];
                                echo $name; ?>
          </h1>
          <p class="text-bold fs-5">Below is your rent report</p>

          <?php

          $sql = "SELECT id FROM tenants_two WHERE id_number = $id";
          $result = mysqli_query($con, $sql);
          if ($result) {
            $row = mysqli_fetch_assoc($result);
            $tid = $row['id'];
            $sql2 = "SELECT * FROM rent_receivable  WHERE tenant_id = $tid";
            $result2 = mysqli_query($con, $sql2);
            $row = mysqli_fetch_assoc($result2);
          }


          ?>

          <div class="row">
            <div>
              <table class="table table-hover align-items-center mb-0" id="tenantReportView">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rent amount</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">utilities</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>

                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Period</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">paid on</th>
                  </tr>
                </thead>

                <tbody>
                  
                    <?php

                    $sql = "SELECT id FROM tenants_two WHERE id_number = $id";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                      $row = mysqli_fetch_assoc($result);
                      $tid = $row['id'];
                      $sql2 = "SELECT * FROM rent_receivable  WHERE tenant_id = $tid";
                      $result2 = mysqli_query($con, $sql2);
                      $sql3 = "SELECT amount FROM utilities WHERE tenant_id = $tid";
                      $result3 = mysqli_query($con, $sql3);
                      $number = 1;
                      while ($row = mysqli_fetch_assoc($result2)) {
                        $row2 = mysqli_fetch_assoc($result3);
                        $rent = number_format($row['rent_amount'], 0, '.', ',');
                        $utilities = number_format($row2['amount'], 0, '.', ',');
                        $total = number_format($row['rent_amount'] + $row2['amount'], 0, '.',',');
                        echo '<tr>
<td class="text-center">' . $number . '</td>
<td class="text-center"><span class="text-xxs">KES</span> ' . $rent . '</td>
<td class="text-center"><span class="text-xxs">KES</span> ' . $utilities . '</td>
<td class="text-center text-bold"><span class="text-xxs">KES</span> '.$total.'</td>
<td class="text-center">' . $row['month'] . '/' . $row['year'] . '</td>
<td class="text-center">' . $row['time'] . '</td>
  </tr>
';
                        $number++;
                      }
                    }


                    ?>
                  
                </tbody>
              </table>
              
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var table = $('#tenantReportView').DataTable({
      lengthChange: false,
      "pageLength": 50,
      buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
      .appendTo('#tenantReportView_wrapper .col-md-6:eq(0)');
  </script>
  <?php include('../includes/footer.php'); ?>
</body>