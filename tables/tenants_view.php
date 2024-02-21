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
              <a class="btn btn-primary" href="../forms/pay_rent">
                Pay Rent
              </a>
            </div>
          </div>
          <div class="col-md-2 pt-3">
            <div>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tenantModal">
                New Tenant
              </button>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="row d-flex justify-content-between align-items-center ms-2 me-2">

          </div>
        </div>
        <div id="tenantViewTable" class="table-responsive p-0">

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
<div class="modal" id="tenantModal">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">New Tenant</h5>
        <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <div class="row g-3 my-1">
          <div class="col-md-12">
            <label for="tenantName" class="form-label">Name:</label>
            <input type="text" class="form-control ps-2" id="tenantName" name="name" autocomplete="off">
          </div>

          <div class="col-md-6">
            <label for="tenantEmail" class="form-label">Email:</label>
            <input type="email" class="form-control ps-2" id="tenantEmail" name="email" autocomplete="off">
          </div>
          <div class="col-md-6">
            <label for="tenantPhone" class="form-label">Phone Number:</label>
            <input type="text" class="form-control ps-2" id="tenantPhone" name="phone_number" autocomplete="off">
          </div>

          <div class="col-md-3">
            <label for="tenantId" class="form-label">Identity No / Passport:</label>
            <input type="text" class="form-control ps-2" id="tenantId" name="id_number" autocomplete="off">
          </div>


          <div class="col-12">
            <button type="button" name="tenant" class="btn btn-primary" onclick="addTenant()">Create</button>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>

<!-- update modal -->
<div class="modal" id="updateTenantModal">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Edit Tenant</h5>
        <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <div class="row g-3 my-1">
          <div class="col-md-12">
            <label for="updateTenantName" class="form-label">Name:</label>
            <input type="text" class="form-control ps-2" id="updateTenantName" name="name" autocomplete="off">
          </div>

          <div class="col-md-6">
            <label for="updateTenantEmail" class="form-label">Email:</label>
            <input type="email" class="form-control ps-2" id="updateTenantEmail" name="email" autocomplete="off">
          </div>
          <div class="col-md-6">
            <label for="updateTenantPhone" class="form-label">Phone Number:</label>
            <input type="text" class="form-control ps-2" id="updateTenantPhone" name="phone_number" autocomplete="off">
          </div>

          <div class="col-md-3">
            <label for="updateTenantId" class="form-label">Identity No / Passport:</label>
            <input type="text" class="form-control ps-2" id="updateTenantId" name="id_number" autocomplete="off">
          </div>
          <div class="col-12">
            <button type="button" name="tenant" class="btn btn-primary" onclick="updateTenantDetails()">Update</button>
            <input type="hidden" id="hiddenTenantData">
          </div>
        </div>
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


<!-- pay rent -->
<div class="modal" id="rentModal">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Rent Payment</h5>
        <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <div class="row g-3 my-1">
          <div class="col-md-12">
            <label for="tenantName" class="form-label">Name:</label>
            <select name="rentName" id="rentNameSelect" class="form-select ps-2 fs-6">
              <option value="none">Please select a tenant first.</option>
              <?php
              include '../config/dbcon.php';

              $sql = "SELECT name FROM tenants_two WHERE tenant_status = 'assigned'";
              $result = mysqli_query($con, $sql);
              if ($result) {
                while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                }
              }
              ?>
            </select>
          </div>

          <div class="col-md-4">
            <label for="tenantName" class="form-label">Month:</label>
            <select name="rentName" id="rentNameSelect" class="form-select ps-2">
              <?php
              function generateMonthSelect()
              {
                $currentMonth = date('n'); // Get the current month (1 to 12)


                for ($month = 1; $month <= 12; $month++) {
                  $monthName = date('F', mktime(0, 0, 0, $month, 1));
                  $selected = ($month == $currentMonth) ? 'selected' : '';
                  echo "<option value='$month' $selected>$monthName</option>";
                }
                echo '</select>';
              }

              generateMonthSelect();
              ?>
          </div>

          <div class="col-md-4">
            <label for="tenantName" class="form-label">Year:</label>
            <select name="rentName" id="rentNameSelect" class="form-select ps-2">
              <?php
              function generateYearSelect()
              {
                $currentYear = date('Y'); // Get the current year


                for ($year = $currentYear - 10; $year <= $currentYear + 10; $year++) {
                  $selected = ($year == $currentYear) ? 'selected' : '';
                  echo "<option value='$year' $selected>$year</option>";
                }
                echo '</select>';
              }

              // Example usage
              generateYearSelect();
              ?>
          </div>



          <div class="col-12">
            <button type="button" name="tenant" class="btn btn-primary" onclick="addTenant()">Pay Rent</button>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
<?php include '../includes/js_links.php' ?>

<script>
  const updateTenantModal = new bootstrap.Modal('#updateTenantModal');
  const tenantModal = new bootstrap.Modal('#tenantModal');
  $(document).ready(function() {
    displayTenantData();
  });

  // display function
  function displayTenantData() {
    var displayData = "true";
    $.ajax({
      url: "display.php",
      type: 'post',
      data: {
        displayTenant: displayData
      },
      success: function(data, status) {
        $('#tenantViewTable').html(data);
      }
    })
  }

  function addTenant() {
    var name = $('#tenantName').val();
    var email = $('#tenantEmail').val();
    var mobile = $('#tenantPhone').val();
    var id_number = $('#tenantId').val();


    $.ajax({
      url: "insert.php",
      type: 'post',
      data: {
        tenantName: name,
        tenantEmail: email,
        tenantPhone: mobile,
        tenantId: id_number
      },
      success: function(data, status) {
        // function to display data
        // console.log(status);
        tenantModal.hide();
        displayTenantData();
      }
    })
  }

  // delete record
  // function deleteLandlord(deleteid) {
  //   $.ajax({
  //     url: "delete.php",
  //     type: 'post',
  //     data: {
  //       deleteLandlord: deleteid
  //     },
  //     success: function(data, status) {
  //       displayTenantData();
  //     }
  //   });
  // }
  // update function to get details from the database
  function getTenantDetails(updateid) {
    $('#hiddenTenantData').val(updateid);


    $.post("update.php", {
      updateTenantid: updateid
    }, function(data, status) {
      var userid = JSON.parse(data);
      $('#updateTenantName').val(userid.name);
      $('#updateTenantEmail').val(userid.email);
      $('#updateTenantPhone').val(userid.phone_number);
      $('#updateTenantId').val(userid.id_number);
    });
    updateTenantModal.show();



  }
  // update 
  function updateTenantDetails() {
    var updatename = $('#updateTenantName').val();
    var updateemail = $('#updateTenantEmail').val();
    var updatemobile = $('#updateTenantPhone').val();
    var updateId = $('#updateTenantId').val();
    var hiddentenantdata = $('#hiddenTenantData').val();

    $.post("update.php", {
      updatetenantname: updatename,
      updatetenantemail: updateemail,
      updatetenantmobile: updatemobile,
      updateId: updateId,
      hiddentenantdata: hiddentenantdata
    }, function(data, status) {
      updateTenantModal.hide();
      displayTenantData();
    });
  }
</script>


<?php include '../includes/footer.php'; ?>