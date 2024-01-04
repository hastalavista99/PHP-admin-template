<?php

include '../config/connect.php';


// UPDATE LANDLORDS
// retrieve information
if (isset($_POST['updateid'])) {
    $update = $_POST['updateid'];

    $sql = "SELECT * FROM landlords WHERE id=$update";
    $result = mysqli_query($con, $sql);
    $response = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid or data not found";
}

// update landlords query
if (isset($_POST['hiddendata'])) {
    $userid = $_POST['hiddendata'];
    $name = $_POST['updatename'];
    $email = $_POST['updateemail'];
    $mobile = $_POST['updatemobile'];



    $sql = "UPDATE landlords SET name='$name', phone_number='$mobile', email='$email' WHERE id=$userid";

    $result = mysqli_query($con, $sql);
}


// UPDATE TENANTS
// retrieve information
if (isset($_POST['updateTenantid'])) {
    $update = $_POST['updateTenantid'];

    $sql = "SELECT * FROM tenants_two WHERE id=$update";
    $result = mysqli_query($con, $sql);
    $response = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid or data not found";
}

// update tenants query
if (isset($_POST['hiddentenantdata'])) {
    $userid = $_POST['hiddentenantdata'];
    $name = $_POST['updatetenantname'];
    $email = $_POST['updatetenantemail'];
    $mobile = $_POST['updatetenantmobile'];
    $id_number = $_POST['updateId'];



    $sql = "UPDATE tenants_two SET name='$name', email='$email', phone_number='$mobile', id_number='$id_number' WHERE id=$userid";

    $result = mysqli_query($con, $sql);
}