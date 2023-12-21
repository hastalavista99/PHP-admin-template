<?php include '../includes/header.php'; ?>
<?php include '../config/connect.php'; ?>
<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="d-flex justify-content-between">
          <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
            <div class="pt-1 pb-1">
              <h4 class="row text-capitalize ps-3">Units For Sale</h4>
            </div>
          </div>
          <div class="col-md-2 pt-3">
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUnitSaleModal">
                Add Units
              </button>
          </div>
          <div class="col-md-2 pt-3">
              <a class="btn btn-primary" href="buyers_view.php">
                Invoiced buyers
              </a>
          </div>

        </div>
        <div class="card-body px-0 pb-2">
          <div class="row d-flex justify-content-between align-items-center ms-2 me-2">
            <div class="col-sm-12 col-md-6 mt-1">
              
            </div>
          </div>
          <div class="table-responsive p-0">
            <table class="table table-striped table-hover align-items-center mb-0 don" id="unitSaleView">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">commission</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">deposit</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">price</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">operation</th>
                  
                  <!-- billing.commission AS commission, billing.rent AS rent, billing.deposit AS deposit, -->
                </tr>
              </thead>
              <tbody>
                <?php

                $sql = "SELECT units_sale.id AS unit_id, property_sale.name AS property_name, units_sale.name AS unit_name, units_sale.booked AS booked, units_sale.price, units_sale.commission, units_sale.deposit
                          FROM units_sale
                          LEFT JOIN property_sale ON units_sale.property_sale_id = property_sale.id";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                  while ($row1 = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td scope="row" class="text-center">' . $row1["unit_id"] . '</td>';
                    echo ' <td class="text-center">' . $row1["property_name"] . '</td>';
                    echo '<td class="text-center">' . $row1["unit_name"] . '</td>';
                    echo '<td class="text-center">' . $row1["commission"] . '</td>';
                    echo '<td class="text-center">' . $row1["deposit"] . '</td>';
                    echo '<td class="text-center">' . $row1["price"] . '</td>';
                    

                    if ($row1['booked'] === 'Yes') {
                      echo '<td class="text-center"><button class="btn btn-danger btn-sm my-2 me-2" disabled>booked</button><a style="color: red;"  name="delete_unit_id" disabled><i class="material-icons opacity-2">delete</i></a></td>';
                    } else {
                       echo '<td class="text-center"><a class="btn btn-success btn-sm my-2 me-2"name="sell_id" href="../forms/sell_units.php?sell_id=' . $row1["unit_id"] . '">book</a><a style="color: red;"  name="delete_unit_id" href="../config/dbcon.php?delete_unit_id=' . $row1["unit_id"] . '"><i class="material-icons opacity-10">delete</i></a></td>';
                    }

                    
                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="8" class="text-center"><h4>No units found</h4></td></tr>';
                }

                ?>

              </tbody>
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
<!-- Unit Modal -->
<div class="modal" id="addUnitSaleModal">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Units For Sale</h5>
        <button type="button" class="btn-close clode me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form class="row g-3 my-1" method="post" action="../config/sale.php">
          <input type="hidden" id="propertyIdInput" name="unit_sale_id" value="">
          <div class="col-md-5">
            <label for="property_select" class="form-label">Property</label>
            <select id="property_select" name="propertySaleSelect" class="form-select ps-2">
              <option value="" selected>-- Select Property --</option>
              <?php
              // Fetch property types from the database and populate the dropdown


              $conn = new mysqli('localhost', 'jack', '.kJgIRNMbIEKKi](', 'property');

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT id, name FROM property_sale";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
              } else {
                echo "<option value='' disabled>No properties found</option>";
              }

              $conn->close();
              ?>
            </select>
          </div>
          <div class="col-md-5">
            <label for="name" class="form-label">Unit Name</label>
            <input type="text" class="form-control ps-2" id="name" name="unit_sale_name" autocomplete="off">
          </div>
          <div class="col-md-3">
            <label for="name" class="form-label">Commission</label>
            <input type="number" class="form-control ps-2" id="name" name="unit_sale_commission" placeholder="$" autocomplete="off">
          </div>
          <div class="col-md-3">
            <label for="name" class="form-label">Deposit</label>
            <input type="number" class="form-control ps-2" id="name" name="unit_sale_deposit" placeholder="$" autocomplete="off">
          </div>
          <div class="col-md-3">
            <label for="name" class="form-label">Price</label>
            <input type="number" class="form-control ps-2" id="name" name="unit_sale_price" placeholder="$" autocomplete="off">
          </div>
          <div class="col-md-7">
            <label for="description" class="form-label">Description & Features</label>
            <textarea type="text" class="form-control ps-2" id="description" name="unit_sale_description"></textarea>
          </div>


          <div class="col-12">
            <button type="submit" name="add_sale_units" class="btn btn-primary">Add Units</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


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