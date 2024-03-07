<?php
// concon.php

include '../config/connect.php';
// Read the raw POST data from the request
$jsonData = file_get_contents('php://input');

// Decode the received JSON data
$requestData = json_decode($jsonData, true);

// Extract the array from the request
$dataArray = $requestData['dataArray'];



// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Iterate through each item in the array and insert into the database
foreach ($dataArray as $item) {
    $tenant = $con->real_escape_string($item['tenant']);
    $rent = $con->real_escape_string($item['rent']);
    $utilities = $con->real_escape_string($item['utilities']);
    $month = $con->real_escape_string($item['month']);
    $year = $con->real_escape_string($item['year']);

    // Perform the database insertion query
    $sql = "INSERT INTO rent_receivable (tenant_id, month, year, rent_amount) VALUES ('$tenant', '$month', '$year', '$rent')";
    

    if ($con->query($sql) !== TRUE) {
        // Handle database insertion error
        http_response_code(500); // Internal Server Error
        echo json_encode(array('status' => 'error', 'message' => 'Failed to insert data into the database: ' . $con->error));
        $con->close();
        exit();
    }

    // If rent insertion is successful, proceed to execute the utilities query
    $utilityQuery = "INSERT INTO utilities (tenant_id, amount, month, year) VALUES ('$tenant', '$utilities', '$month', '$year')";

    // Execute the utilities insertion query
    if ($con->query($utilityQuery) !== TRUE) {
        // Handle database insertion error for utilities
        http_response_code(500); // Internal Server Error
        echo json_encode(array('status' => 'error', 'message' => 'Failed to insert utilities data into the database: ' . $con->error));
        $con->close();
        exit();
    }
}

// Close the database conection
$con->close();

// Respond with a JSON success message
$response = array('status' => 'success', 'message' => 'Data received successfully');
echo json_encode($response);


?>