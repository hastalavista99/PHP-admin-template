<?php
include '../config/connect.php';


// DISPLAY LANDLORD
if (isset($_POST['displayLandlord'])) {
  $table = '<table class="table table-hover align-items-center mb-0" id="landlordView">
    <thead>
      <tr>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone No</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">properties</th>
        
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">operations</th>
      </tr>
    </thead>
    <tbody>';

  // $sql = "SELECT * FROM landlords";
  $sql = "SELECT landlords.id AS id, landlords.name AS name, landlords.phone_number AS phone_number, landlords.email AS email, COUNT(properties.id) AS number_of_properties FROM landlords LEFT JOIN properties ON landlords.id = properties.landlord_id GROUP BY landlords.id, landlords.name, landlords.phone_number, landlords.email";
  $result = mysqli_query($con, $sql);
  $number = 1;

  while ($row = mysqli_fetch_assoc($result)) {

    $id = $row['id'];
    $name = $row['name'];
    $phone = $row['phone_number'];
    $email = $row['email'];
    $properties = $row['number_of_properties'];
    $table .= '
        <tr>
        <td scope="row" class="text-center">' . $number . '</td>
        <td class="text-center">' . $name . '</td>
        <td class="text-center">' . $phone . '</td>
        <td class="text-center">' . $email . '</td>
        <td class="text-center">' . $properties . '</td>
        <td class="text-center"><button class="btn btn-link text-success btn-sm my-0" onclick="getLandlordDetails(' . $id . ')"><i class="material-icons opacity-10 fs-5">edit</i></button>
  <button class="btn btn-link text-danger btn-sm my-0" onclick="deleteLandlord(' . $id . ')"><i class="material-icons opacity-10 fs-5">delete</i></button>
  </td>
      </tr>
      ';
    $number++;
  }
  $table .= " </tbody></table>";
  echo $table;
}


// DISPLAY TENANT
if (isset($_POST['displayTenant'])) {
  $table = '<table class="table table-hover align-items-center mb-0" id="tenantView">
  <thead>
    <tr>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tenant id</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">phone no</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id number</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status </th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property name</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit number</th>

    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">operations</th>
    </tr>
  </thead>
  <tbody>';

  // $sql = "SELECT * FROM landlords";
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
  $result = mysqli_query($con, $sql);
  $number = 1;

  while ($row = mysqli_fetch_assoc($result)) {

    $id = $row['id'];
    $name = $row['name'];
    $phone = $row['phone_number'];
    $email = $row['email'];
    $id_number = $row['id_number'];
    $tenant_status = $row['tenant_status'];
    $unit_number = $row['unit_number'];
    $property_name = $row['property_name'];
    $table .= '
      <tr>
      <td scope="row" class="text-center">' . $number . '</td>
      <td class="text-center">' . $name . '</td>
      <td class="text-center">' . $phone . '</td>
      <td class="text-center">' . $email . '</td>
      <td class="text-center">' . $id_number . '</td>
      <td class="text-center">' . $tenant_status . '</td>
      <td class="text-center">' . $property_name . '</td>
      <td class="text-center">' . $unit_number . '</td>
      <td class="text-center"><button class="btn btn-link text-success btn-sm my-0" onclick="getTenantDetails(' . $id . ')"><i class="material-icons opacity-10 fs-5">edit</i></button>';
    if ($tenant_status == 'unassigned') {
      $table .= '
                    <button type="button" class="btn btn-info btn-sm my-1 assign_btn"  ><a href="../forms/assign_tenant.php?assign_id=' . $row["id"] . '" class="text-white">Assign</a></button>';
    } else {
      $table .= '
            <button type="button" class="btn btn-warning btn-sm my-1" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row["id"] . '">
            VACATE
          </button>';
    }
    echo '<div class="modal fade" id="exampleModal' . $row["id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="vacateid" value="' . $row["id"] . '">
                                <button type="button" class="btn btn-info btn-sm mx-2" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-warning vacate_btn btn-sm" name="vacate_tenant_id">Vacate</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>';

    $number++;
  }
  $table .= "</tr> </tbody></table>";
  echo $table;
}


// DISPLAY PROPERTIES
if (isset($_POST['displayProperty'])) {
  $table = '<table class="table table-hover align-items-center mb-0" id="propertyView">
    <thead>
      <tr>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property name</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">location</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">landlord</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no of units</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">occupied units</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">vacant units</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Operations</th>
      </tr>
    </thead>
    <tbody>';


  $sql = "SELECT properties.id AS property_id, properties.name AS property_name, properties.location, landlords.name AS landlord_name, properties.active_status AS active_status
  FROM properties
  JOIN landlords ON properties.landlord_id = landlords.id";
  $result = mysqli_query($con, $sql);
  $number = 1;



  while ($row = mysqli_fetch_assoc($result)) {

    $propid = $row['property_id'];

    $sql2 = "SELECT COUNT(available) AS vacant_units FROM units_two WHERE property_id = $propid AND available = 'Yes'";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $sql3 = "SELECT COUNT(occupied) AS occupied_units FROM units_two WHERE property_id = $propid AND occupied = 'Yes'";
    $result3 = mysqli_query($con, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $sql4 = "SELECT COUNT(id) AS number_of_units FROM units_two WHERE property_id = $propid";
    $result4 = mysqli_query($con, $sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $property_name = $row['property_name'];
    $landlord_name = $row['landlord_name'];
    $location = $row['location'];
    $occupied_units = $row3['occupied_units'];
    $number_of_units = $row4['number_of_units'];
    $vacant_units = $row2['vacant_units'];
    $active_status = $row['active_status'];
    $table .= '
        <tr>
        <td scope="row" class="text-center">' . $number . '</td>
        <td class="text-center">' . $property_name . '</td>
        <td class="text-center">' . $location . '</td>
        <td class="text-center">' . $landlord_name . '</td>
        <td class="text-center">' . $number_of_units . '</td>
        <td class="text-center">' . $occupied_units . '</td>
        <td class="text-center">' . $vacant_units . '</td>
        <td class="text-center">' . $active_status . '</td>
        <td class="text-center">
  <button class="btn btn-link text-danger btn-sm my-0" onclick="deleteProperty(' . $propid . ')"><i class="material-icons opacity-10 fs-5">delete</i></button>
  </td>
      </tr>
      ';
    $number++;
  }
  $table .= " </tbody></table>";
  echo $table;
}



if (isset($_POST['displayUser'])) {
  $table = '<table class="table table-hover align-items-center mb-0" id="userView">
  <thead>
    <tr>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>

    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">operations</th>
    </tr>
  </thead>
  <tbody>';

  // $sql = "SELECT * FROM landlords";
  $sql = "SELECT
  users.id,
  users.role,
  users.user_name,
  users.user_email
  FROM 
  users ";
  $result = mysqli_query($con, $sql);
  $number = 1;

  while ($row = mysqli_fetch_assoc($result)) {

    $userid = $row['id'];
    $name = $row['user_name'];
    $email = $row['user_email'];
    $role = $row['role'];

    $table .= '
      <tr>
      <td scope="row" class="text-center">' . $number . '</td>
      <td class="text-center">' . $name . '</td>
      <td class="text-center">' . $email . '</td>
      <td class="text-center">' . $role . '</td>
      <td class="text-center">
  <button class="btn btn-link text-danger btn-sm my-0" onclick="deleteUser(' . $userid . ')"><i class="material-icons opacity-10 fs-5">delete</i></button>
  </td>';


    $number++;
  }
  $table .= "</tr> </tbody></table>";
  echo $table;
}


// DISPLAYING ACCOUNTS
if (isset($_POST['displayAccount'])) {
  $table = '<table class="table table-hover align-items-center mb-0" id="accountView">
  <thead>
    <tr>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">account no</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">description</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">type</th>

    </tr>
  </thead>
  <tbody>';

  // $sql = "SELECT * FROM landlords";
  $sql = "SELECT
  *
  FROM 
  chart_of_accounts ";
  $result = mysqli_query($con, $sql);
  $number = 1;

  while ($row = mysqli_fetch_assoc($result)) {

    $accountid = $row['id'];
    $account_no = $row['account_no'];
    $description = $row['description'];
    $type = $row['type'];

    $table .= '
      <tr>
      <td scope="row" class="text-center">' . $number . '</td>
      <td class="text-center">' . $account_no . '</td>
      <td class="text-center">' . $description . '</td>
      <td class="text-center text-capitalize">' . $type . '</td>
  </tr>';


    $number++;
  }
  $table .= " </tbody></table>";
  echo $table;
}
?>

<!-- Include jQuery and DataTables scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script> -->

<?php include '../includes/js_links.php' ?>


<!-- Initialize DataTables on your table -->
<script>
  var table = $('#landlordView').DataTable({
    lengthChange: false,
    "pageLength": 50,
    buttons: ['copy', 'excel', 'pdf', 'colvis']
  });

  table.buttons().container()
    .appendTo('#landlordView_wrapper .col-md-6:eq(0)');

  var table = $('#tenantView').DataTable({
    lengthChange: false,
    "pageLength": 50,
    buttons: ['copy', 'excel', 'pdf', 'colvis']
  });

  table.buttons().container()
    .appendTo('#tenantView_wrapper .col-md-6:eq(0)');


  var proptable = $('#propertyView').DataTable({
    lengthChange: false,
    "pageLength": 50,
    buttons: ['copy', 'excel', 'pdf', 'colvis']
  });

  proptable.buttons().container()
    .appendTo('#propertyView_wrapper .col-md-6:eq(0)');

  var usertable = $('#userView').DataTable({
    lengthChange: false,
    "pageLength": 50,
    buttons: ['copy', 'excel', 'pdf', 'colvis']
  });

  usertable.buttons().container()
    .appendTo('#userView_wrapper .col-md-6:eq(0)');

    var accounttable = $('#accountView').DataTable({
    lengthChange: false,
    "pageLength": 50,
    buttons: ['copy', 'excel', 'pdf', 'colvis']
  });

  accounttable.buttons().container()
    .appendTo('#accountView_wrapper .col-md-6:eq(0)');
</script>