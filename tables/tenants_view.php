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
              <h4 class="row text-capitalize ps-3">Tenants</h4>
            </div>
          </div>
          <div class="col-md-2 pt-3">
            <div>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                New Tenant
              </button>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="row d-flex justify-content-between align-items-center ms-2 me-2">
            
            </div>
          </div>
          <div class="table-responsive p-0">
            <table class="table table-striped table-hover align-items-center mb-0" id="tenantsView">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tenant id</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id number</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit number</th>

                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">operations</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $sql = "SELECT
                        tenants_two.id AS id,
                        tenants_two.name AS name,
                        tenants_two.email AS email,
                        tenants_two.phone_number AS phone_number,
                        tenants_two.id_number AS id_number,
                        tenants_two.tenant_status AS tenant_status,
                        tenants_two.unit_id AS unit_id,
                        properties.name AS property_name,
                        units_two.unit_number AS unit_number
                      FROM 
                        tenants_two 
                      LEFT JOIN
                        properties ON tenants_two.property_id = properties.id 
                      LEFT JOIN 
                        units_two ON tenants_two.unit_id = units_two.id";

                $result = $con->query($sql);



                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {


                    echo '<tr>';
                    echo '<td scope="row" class="text-center">' . $row["id"] . '</td>';
                    echo ' <td class="text-center">' . $row["name"] . '</td>';
                    echo '<td class="text-center">' . $row["email"] . '</td>';
                    echo ' <td class="text-center">' . $row["phone_number"] . '</td>';
                    echo ' <td class="text-center">' . $row["id_number"] . '</td>';
                    echo '<td class="text-center">' . $row["tenant_status"] . '</td>';

                    echo '<td class="text-center">' . $row["property_name"] . '</td>';
                    echo '<td class="text-center">' . $row["unit_number"] . '</td>';



                    if ($row["tenant_status"] == 'unassigned') {
                      echo '<td class="text-center">
                                  <button type="button" class="btn btn-info btn-sm my-1 assign_btn"  ><a href="../forms/assign_tenant.php?assign_id=' . $row["id"] . '" class="text-white">Assign</a></button>';
                    } else {
                      echo '<td class="text-center">
                          <button type="button" class="btn btn-warning btn-sm my-1" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row["id"].'">
                          VACATE
                        </button>';
                    }
                    

                    echo '<div class="modal fade" id="exampleModal'.$row["id"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Vacate Tenant</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="../config/dbcon.php" method="get" autocomplete="off">
                                <div class="mb-3">
                                  <lable class="form-label" for="vacate_comment">Reason for Vacating Tenant:</lable>
                                  <textarea class="form-control px-2" name="comment" id="vacate_comment" rows="3" required></textarea>
                                </div>
                                <input type="hidden" name="vacateid" value="'.$row["id"].'">
                                <button type="button" class="btn btn-info btn-sm mx-2" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-warning vacate_btn btn-sm" name="vacate_tenant_id">Vacate</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>';



                    // echo '<a style="color: red;" class="ms-2" name="delete_property_id" href="../config/dbcon.php?delete_tenant_id=' . $row["id"] . '"><i class="material-icons opacity-10">delete</i></a></td>';
                    echo '</tr>';
                  }
                } else {
                  echo "<tr><td colspan='6'>No units found</td></tr>";
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

<!-- Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">New Tenant</h5>
        <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form class="row g-3 my-1" action="../config/dbcon.php" method="post">
          <div class="col-md-12">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control ps-2" id="name" name="name" autocomplete="off">
          </div>

          <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email:</label>
            <input type="email" class="form-control ps-2" id="inputEmail" name="email" autocomplete="off">
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Phone Number:</label>
            <input type="text" class="form-control ps-2" id="inputAddress" name="phone_number" autocomplete="off">
          </div>

          <div class="col-md-3">
            <label for="inputId" class="form-label">Identity No / Passport:</label>
            <input type="text" class="form-control ps-2" id="inputId" name="id_number" autocomplete="off">
          </div>
          <!-- <div class="col-md-4">
              <label for="type" class="form-label">Property Name</label>
              <select id="type" name="property_Select" class="form-select ps-2">
              <option value="" selected>-- Select Property --</option>
                <?php
                // Fetch property types from the database and populate the dropdown


                $conn = new mysqli('localhost', 'jack', '.kJgIRNMbIEKKi](', 'property');

                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, name FROM properties";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                  }
                } else {
                  echo "<option value='' disabled>No types found</option>";
                }

                $conn->close();
                ?>
              </select>
          </div>
          <div class="col-md-4">
              <label for="type" class="form-label">Unit Name</label>
              <select id="type" name="unitSelect" class="form-select ps-2">
              <option value="" selected>-- Select Unit --</option>
                <?php
                // Fetch property types from the database and populate the dropdown


                $conn = new mysqli('localhost', 'jack', '.kJgIRNMbIEKKi](', 'property');

                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, unit_number FROM units";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["unit_number"] . "</option>";
                  }
                } else {
                  echo "<option value='' disabled>No types found</option>";
                }

                $conn->close();
                ?>
              </select>
          </div> -->


          <div class="col-12">
            <button type="submit" name="tenant" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>

<!-- assign Modal -->
<div class="modal" id="assignModal">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Assign Unit</h5>
        <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form class="row g-3 my-1" action="" method="post">
          <div class="col-md-4">
            <label for="property" class="form-label">Property Name</label>
            <select id="property" name="property_Select" class="form-select ps-2">
              <option value="" selected>-- Select Property --</option>
              <?php
              $conn = new mysqli('localhost', 'jack', '.kJgIRNMbIEKKi](', 'property');

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT id, name FROM properties";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
              } else {
                echo "<option value='' disabled>No types found</option>";
              }

              $conn->close();
              ?>
            </select>
          </div>
          <div class="col-md-4">
            <label for="unit" class="form-label">Unit Name</label>
            <select id="unit" name="unitSelect" class="form-select ps-2">
              <option value="" selected>-- Select Unit --</option>

            </select>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
              $(document).ready(function() {
                $('#property').change(function() {
                  var propertyId = $(this).val();

                  // If a property is selected, fetch and populate units
                  if (propertyId !== "") {
                    $.ajax({
                      url: 'get_units.php', // Replace with the actual path to get_units.php
                      type: 'POST',
                      data: {
                        propertyId: propertyId
                      },
                      success: function(data) {
                        $('#unit').html(data);
                        $('#unit').prop('disabled', false);
                      }
                    });
                  } else {
                    // If no property is selected, disable unit select
                    $('#unit').html('<option value="" selected disabled>Select Property First</option>');
                    $('#unit').prop('disabled', true);
                  }
                });
              });
            </script>

          </div>
          <div class="col-md-4">
            <label for="type_of" class="form-label">Rent or Lease</label>
            <select name="" id="type_of" class="form-select ps-2">
              <option value="" selected>-- Choose... --</option>
              <option value="rent">Rent</option>
              <option value="lease">Lease</option>
              <option value="hire">Hire</option>
            </select>
          </div>
          <div class="col-12">
            <button type="submit" name="assign" id="submitAssign" class="btn btn-primary">Assign</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../includes/js_links.php' ?>

<script>
  $(document).ready(function() {
    let tenantId;

    // Assign button click event
    $('.assign-btn').click(function() {
      tenantId = $(this).data('tenant-id');
    });

    // Vacate button click event
    $('.vacate-btn').click(function() {
      tenantId = $(this).data('tenant-id');
      vacateTenant(tenantId);
    });

    // Assign button in modal click event
    $('#submitAssign').click(function() {
      assignTenant(tenantId);
    });

    // Additional JavaScript logic for dynamically updating unit options based on property selection
    // ...

    function assignTenant(id) {
      // Perform AJAX request to update status in the database
      $.ajax({
        type: 'POST',
        url: 'test.php', // PHP script to handle assignment
        data: {
          id: id,
          property: $('#property').val(),
          unit: $('#unit').val(),
          type: $('#type_of').val()
        },
        success: function(response) {
          alert(response); // Display success or error message
          $('#assignModal').modal('hide');
        },
        error: function(error) {
          console.error(error);
        }
      });
    }

    function vacateTenant(id) {
      // Perform AJAX request to update status in the database
      $.ajax({
        type: 'POST',
        url: 'vacate_tenant.php', // PHP script to handle vacation
        data: {
          id: id
        },
        success: function(response) {
          alert(response); // Display success or error message
        },
        error: function(error) {
          console.error(error);
        }
      });
    }
  });
</script>
<script>
  function getTenantDetails(tenantid){
    $('#hiddenTenantData').val(vacateid);

    $.ajax({
      url: "../config/dbcon.php",
      type: 'post',
      data: {
        vacateTenantid: vacateid
      },
      success: function(data,status) {
        console.log(vacateid);
      }
    });
  }
</script>

<?php include '../includes/footer.php'; ?>