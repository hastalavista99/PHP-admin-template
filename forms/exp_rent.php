<?php
// BELOW IS GET Tenant Nmae FOR PAY RENT
// Get property ID from AJAX POST data
include '../config/connect.php';
$unitId = $_POST['unitRentId'];

// fetch expected rent based on the selected unit
$rentQuery = "SELECT rent FROM billing_two WHERE unit_id = $unitId";
$rentResult = $con->query($rentQuery);

// Build HTML options for the unit select
if ($rentResult) {
    $options = '';
    while ($rent = $rentResult->fetch_assoc()) {
        $options .= '<option value="' . $rent['rent'] . '" selected disabled>' . $rent['rent'] . '</option>';
    }


    echo $options;
} else {
    // Display an error message if the query fails
    echo "Error: " . $con->error;
}


?>