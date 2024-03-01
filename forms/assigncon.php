<?php

include '../config/connect.php';
 // ASSIGNING units
 if(isset($_POST['assign'])){
    $assign_id = $_GET['assign_id'];
    $property_id = $_POST['property_Select'];
    $unit_id = $_POST['unitSelect'];
    $contract = $_POST['contract'];

    $sql = "UPDATE tenants_two
    SET property_id = $property_id, unit_id = $unit_id, tenant_status = 'assigned', contract = '$contract'
    WHERE id = $assign_id";
 
    $result = mysqli_query($con, $sql);

    $sql2 = "INSERT INTO invoices_two (tenant_id, property_id, unit_id) VALUES ($assign_id, $property_id, $unit_id)";
    $result2 = mysqli_query($con, $sql2);

    $sql3 = "UPDATE units_two
            SET occupied = 'Yes', available = 'No'
            WHERE id = $unit_id";
    $result3 = mysqli_query($con, $sql3);

    
    if($result && $result2 && $result3){
        header("location: assign_tenant.php?assign_id=$assign_id");
    } else {
        die(mysqli_error($con));
    }
}


// Rent Payment
if (isset($_POST['rent_pay'])) {
    $property = $_POST['propertySelect'];
    $unit_id = $_POST['unitSelect'];
    $rent_amount = $_POST['rent'];
    $utilities = $_POST['utilities'];
    $month = $_POST['rentMonth'];
    $year = $_POST['rentYear'];

    // Extract Tenant ID
    $sql = "SELECT id FROM tenants_two WHERE unit_id = $unit_id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $tenantId = $row['id'];

        // Insert into rent_receivable
        $sql4 = "INSERT INTO rent_receivable (tenant_id, month, year, rent_amount, utilities) VALUES ($tenantId, '$month', '$year', $rent_amount, $utilities)";
        $result4 = mysqli_query($con, $sql4);

        if ($result4) {
            header("location: pay_rent");
            exit();
        } else {
            die(mysqli_error($con));
        }
    } else {
        die(mysqli_error($con));
    }
}


?>