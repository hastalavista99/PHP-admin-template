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
              <h4 class="row text-capitalize ps-3">Properties</h4>
            </div>
          </div>
          <div class="col-md-2 pt-3">
            <div>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#propertyModal">
                Add Property
              </button>
            </div>
          </div>
          
        </div>
        <div class="card-body px-0 pb-2">
          <div class="row d-flex justify-content-between align-items-center ms-2 me-2">
            <div class="col-sm-12 col-md-6 mt-1">

            </div>
          </div>
          <div id="propertyViewTable" class="table-responsive p-0">

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

<!-- Property Modal -->
<div class="modal" id="propertyModal">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">New Property</h5>
        <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <div class="row g-3 my-1">
          <input type="hidden" id="propertyId" name="propertyId" value="">
          <div class="col-md-6">
            <label for="propertyName" class="form-label">Name</label>
            <input type="text" class="form-control ps-2" id="propertyName" name="name" autocomplete="off">
          </div>
          <div class="col-md-6">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control ps-2" id="location" name="location" autocomplete="off">
          </div>
          <div class="col-md-4">
            <label for="propertyType" class="form-label">Property Type</label>
            <select id="propertyType" name="typeSelect" class="form-select ps-2">
              <option value="" selected>-- Select Type --</option>
              <?php
              // Fetch property types from the database and populate the dropdown


              $conn = new mysqli('localhost', 'jack', '.kJgIRNMbIEKKi](', 'property');

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT id, name FROM property_types";
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
            <label for="landlord" class="form-label">Landlord</label>
            <select id="landlord" name="landlordSelect" class="form-select ps-2">
              <option value="" selected>-- Select Landlord --</option>
              <?php
              // Fetch landlords from the database and populate the dropdown


              $conn = new mysqli('localhost', 'jack', '.kJgIRNMbIEKKi](', 'property');

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT id, name FROM landlords";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
              } else {
                echo "<option value='' disabled>No landlords found</option>";
              }

              $conn->close();
              ?>
            </select>
          </div>
          <div class="col-md-4 mt-5">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="activeCheck" name="propertyStatus" value="active">
              <label class="form-check-label" for="activeCheck">
                active
              </label>
            </div>
          </div>

          <div class="col-12">
            <button type="button" name="property" class="btn btn-primary" onclick="addProperty()">Create</button>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<!-- Update Property Modal -->
<div class="modal" id="updatePropertyModal">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Edit Property</h5>
        <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <div class="row g-3 my-1">
          <input type="hidden" id="propertyId" name="propertyId" value="">
          <div class="col-md-6">
            <label for="propertyName" class="form-label">Name</label>
            <input type="text" class="form-control ps-2" id="updatePropertyName" name="name" autocomplete="off">
          </div>
          <div class="col-md-6">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control ps-2" id="updatePropertyLocation" name="location" autocomplete="off">
          </div>
          <div class="col-md-4">
            <label for="propertyType" class="form-label">Property Type</label>
            <select id="updatePropertyType" name="typeSelect" class="form-select ps-2">
              <option value="" selected>-- Select Type --</option>
              <?php
              // Fetch property types from the database and populate the dropdown


              $conn = new mysqli('localhost', 'jack', '.kJgIRNMbIEKKi](', 'property');

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT id, name FROM property_types";
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
            <label for="landlord" class="form-label">Landlord</label>
            <select id="updatePropertyLandlord" name="landlordSelect" class="form-select ps-2">
              <option value="" selected>-- Select Landlord --</option>
              <?php
              // Fetch landlords from the database and populate the dropdown


              $conn = new mysqli('localhost', 'jack', '.kJgIRNMbIEKKi](', 'property');

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT id, name FROM landlords";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
              } else {
                echo "<option value='' disabled>No landlords found</option>";
              }

              $conn->close();
              ?>
            </select>
          </div>
          <div class="col-md-4 mt-5">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="updactiveCheck" name="propertyStatus" value="active">
              <label class="form-check-label" for="activeCheck">
                active
              </label>
            </div>
          </div>

          <div class="col-12">
            <button type="button" name="property" class="btn btn-primary" onclick="addProperty()">Create</button>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
<?php include '../includes/js_links.php' ?>
<script>
  $(document).ready(function() {
    // console.log("Document is ready.");
    displayPropertyData();

  });


  // display function
  function displayPropertyData() {
    var displayProperty = "true";
    $.ajax({
      url: "display.php",
      type: 'post',
      data: {
        displayProperty: displayProperty
      },
      success: function(data, status) {
        $('#propertyViewTable').html(data);

      }
    });

  }
 const propertyModal = new bootstrap.modal('#propertyModal');
  function addProperty() {
    var name = $('#propertyName').val();
    var location = $('#location').val();
    var type = $('#propertyType').val();
    var landlord = $('#landlord').val();
    var activeCheck = $('#activeCheck').val();


    $.ajax({
      url: "insert.php",
      type: 'post',
      data: {
        name: name,
        location: location,
        type: type,
        landlord: landlord,
        active: activeCheck
      },
      success: function(data, status) {
        // function to display data
        // console.log(status);
       
        propertyModal.hide();
        displayPropertyData();
      }
    })
  }

  // delete property
  function deleteProperty(deleteid) {
    $.ajax({
      url: "delete.php",
      type: 'post',
      data: {
        deleteProperty: deleteid
      },
      success: function(data, status) {
        displayPropertyData();
      }
    });
  }

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
  function updatePropertyDetails() {
    var updatename = $('#updatePropertyName').val();
    var updateemail = $('#updatePropertyEmail').val();
    var updatemobile = $('#updatePropertyPhone').val();
    var updateId = $('#updatePropertyId').val();
    var hiddenpropertydata = $('#hiddenPropertyData').val();

    $.post("update.php", {
      updatepropertyname: updatename,
      updatepropertyemail: updateemail,
      updatepropertymobile: updatemobile,
      updateId: updateId,
      hiddenpropertydata: hiddenpropertydata
    }, function(data, status) {
      updatePropertyModal.hide();
      displayPropertyData();
    });
  }
</script>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

<?php include('../includes/footer.php') ?>