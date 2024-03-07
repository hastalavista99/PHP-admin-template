<?php
// BELOW IS GET Tenant Nmae FOR PAY RENT
// Get property ID from AJAX POST data
include '../config/connect.php';
$unitId = $_POST['unitRentId'];

// Fetch units based on the selected property
$tenantsQuery = "SELECT id, name, id_number FROM tenants_two WHERE unit_id = $unitId";
$tenantsResult = $con->query($tenantsQuery);

// Build HTML options for the unit select
if ($tenantsResult) {
    $options = '';
    while ($tenant = $tenantsResult->fetch_assoc()) {
        $options .= '<option value="' . $tenant['id'] . '" selected disabled>' . $tenant['name'] . '</option>';
    }


    echo $options;
} else {
    // Display an error message if the query fails
    echo "Error: " . $con->error;
}


?>