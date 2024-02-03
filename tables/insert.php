<?php 
include '../config/connect.php';

extract($_POST);


// insert landlords
if(isset($_POST['landlordName']) && isset($_POST['landlordPhone']) && isset($_POST['landlordEmail'])) {
    $sql = "INSERT INTO landlords (name, phone_number, email) VALUES ('$landlordName', '$landlordPhone', '$landlordEmail')";

    $result = mysqli_query($con, $sql);

    
}

// insert tenants
if(isset($_POST['tenantName']) && isset($_POST['tenantPhone']) && isset($_POST['tenantEmail'])&& isset($_POST['tenantId'])) {
    $sql = "INSERT INTO tenants_two (name, email, phone_number, id_number) VALUES ('$tenantName', '$tenantPhone', '$tenantEmail', '$tenantId')";

    $result = mysqli_query($con, $sql);

    
}

// insert properties

if(isset($_POST['name']) && isset($_POST['location']) && isset($_POST['type'])&& isset($_POST['landlord']) && isset($_POST['active'])) {
    $sql = "INSERT INTO properties (name, location, landlord_id, type_id, active_status) VALUES('$name', '$location', '$landlord', '$type', '$active')";

    $result = mysqli_query($con, $sql);

    
}

// insert users
if(isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userRole'])&& isset($_POST['userPassword'])) {
    $sql = "INSERT INTO users (role, user_name, user_email, user_password) VALUES('$userRole', '$userName', '$userEmail', '$userPassword'";

    $result = mysqli_query($con, $sql);

    if(!$result){
        die(mysqli_error($con));
    }

    
} else {
    die(mysqli_error($con));
}

//  insert new account
if(isset($_POST['accountNumber']) && isset($_POST['accountDescription']) && isset($_POST['accountType'])) {
    $sql = "INSERT INTO chart_of_accounts (account_no, description, type) VALUES('$accountNumber', '$accountDescription', '$accountType'";

    $result = mysqli_query($con, $sql);

    if(!$result){
        die(mysqli_error($con));
    }

    
} else {
    die(mysqli_error($con));
}

?>