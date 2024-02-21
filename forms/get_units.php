<?php

include '../config/connect.php';

// Get property ID from AJAX POST data
$propertyId = $_POST['propertyId'];

// Fetch units based on the selected property
$unitsQuery = "SELECT id, unit_number, available FROM units_two WHERE property_id = $propertyId AND available = 'Yes'";
$unitsResult = $con->query($unitsQuery);

// Build HTML options for the unit select
if ($unitsResult) {
    $options = '<option value="" selected disabled>Select Unit</option>';
    while ($unit = $unitsResult->fetch_assoc()) {
        $options .= '<option value="' . $unit['id'] . '">' . $unit['unit_number'] . '</option>';
    }

    echo $options;
} else {
    // Display an error message if the query fails
    echo "Error: " . $con->error;
}

?>
