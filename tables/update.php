<?php

include '../config/connect.php';

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

// update query
if (isset($_POST['hiddendata'])) {
    $userid = $_POST['hiddendata'];
    $name = $_POST['updatename'];
    $email = $_POST['updateemail'];
    $mobile = $_POST['updatemobile'];



    $sql = "UPDATE landlords SET name='$name', phone_number='$mobile', email='$email' WHERE id=$userid";

    $result = mysqli_query($con, $sql);
}
