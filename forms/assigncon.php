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
?>