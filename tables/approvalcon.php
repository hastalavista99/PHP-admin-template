<?php
include '../config/connect.php';

// Check if the request contains data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectedRowsData"])) {
    // Get the selected rows data from the POST request
    $selectedRowsData = $_POST["selectedRowsData"];

    // Loop through the selected rows data
    foreach ($selectedRowsData as $rowData) {
        // Extract data from each row
        $transId = $rowData['trans id'];
        $tenantId = $rowData['no.'];
        $tenantName = $rowData["name"]; // Adjust the column name accordingly
        $rentAmount = $rowData["rent amount (kes)"]; // Adjust the column name accordingly
        $rentMonth = $rowData["month"]; // Adjust the column name accordingly
        $time = $rowData["time"];
        
        $month = substr($rentMonth, 0,1);
        $year = substr($rentMonth, -4);


        
        // Adjust the column name accordingly


        // Prepare and execute the SQL query to insert data into the rent table
        $sql = "INSERT INTO monthly_rent (tenant_id, month, year, rent_amount) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssss", $tenantId, $month, $year, $rentAmount);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            echo "Record inserted successfully.";
            
            // Prepare and execute the SQL query to delete the record from pending_transactions
            $delQuery = "DELETE FROM pending_transactions WHERE id = ?";
            $stmtDel = $con->prepare($delQuery);
            $stmtDel->bind_param("i", $transId);
            $stmtDel->execute();

            // Check if the deletion was successful
            if ($stmtDel->affected_rows > 0) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . $stmtDel->error;
            }
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectedUtilitiesData"])) {
    // Get the selected rows data from the POST request
    $selectedRowsData = $_POST["selectedUtilitiesData"];

    // Loop through the selected rows data
    foreach ($selectedRowsData as $rowData) {
        // Extract data from each row
        $transId = $rowData['trans id'];
        $tenantId = $rowData['no.'];
        $tenantName = $rowData["name"]; // Adjust the column name accordingly
        $rentAmount = $rowData["rent amount (kes)"]; // Adjust the column name accordingly
        $rentMonth = $rowData["month"]; // Adjust the column name accordingly
        $time = $rowData["time"];
        
        
        $month = substr($rentMonth, 0,1);
        $year = substr($rentMonth, -4);


        
        // Adjust the column name accordingly


        // Prepare and execute the SQL query to insert data into the rent table
        $sql = "INSERT INTO monthly_utilities (tenant_id, amount, month, year) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssss", $tenantId, $rentAmount, $month, $year);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            echo "Record inserted successfully.";

            $delQuery = "DELETE FROM pending_transactions WHERE id = ?";
            $stmtDel = $con->prepare($delQuery);
            $stmtDel->bind_param("i", $transId);
            $stmtDel->execute();

            // Check if the deletion was successful
            if ($stmtDel->affected_rows > 0) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . $stmtDel->error;
            }

        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>
