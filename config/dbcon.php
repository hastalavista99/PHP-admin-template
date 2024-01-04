<?php

include "connect.php";


    //ADD TENANT
if(isset($_POST['tenant']))
{
    $name = $_POST['name'];

    $email = $_POST['email'];
    $mobile = $_POST['phone_number'];
    // $address = $_POST['address'];
    $id_number = $_POST['id_number'];


    $sql ="insert into tenants_two (name, email, phone_number, id_number) values('$name', '$email', '$mobile', '$id_number')";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "Data inserted successfully";
        header('location: ../tables/tenants_view.php');
    } else {
        die(mysqli_error($con));
    }
}

   //VACATING TENANTS
   if(isset($_GET['vacateid'])){
    $vacate_id = $_GET['vacateid'];
    $comment = $_GET['comment'];

    $getUnitIdQuery = "SELECT unit_id FROM tenants_two WHERE id = $vacate_id";
    $unitIdResult = mysqli_query($con, $getUnitIdQuery);

    if (!$unitIdResult) {
        die(mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($unitIdResult);
    $vacate_unit_id = $row['unit_id'];


    $sql = "UPDATE tenants_two 
    SET tenant_status = 'unassigned', property_id = NULL, unit_id = NULL 
    WHERE id=$vacate_id";
    $result = mysqli_query($con, $sql);

    $sql2 = "UPDATE units_two
    SET occupied ='No', available = 'Yes'
    WHERE id = $vacate_unit_id";
    $result2 = mysqli_query($con, $sql2);

    
    $sql3 = "INSERT INTO vacate (tenant_id,comment) VALUES ($vacate_id, '$comment')";
    $result3 = mysqli_query($con, $sql3);


    if(!$result){
        die(mysqli_error($con));
    } else {
        header('Location: ../tables/tenants_view.php');
    }
}

   //DELETING TENANTS
if(isset($_GET['delete_tenant_id'])){
    $delete_id = $_GET['delete_tenant_id'];


    $sql = "DELETE FROM tenants_two WHERE id=$delete_id";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die(mysqli_error($con));
    } else {
        header('Location: ../tables/tenants_view.php');
    }
}

    //ADD LANDLORD
if(isset($_POST['landlord']))
{
    $name = $_POST['name'];
    $mobile = $_POST['phone_number'];
    $email = $_POST['email'];

    $sql ="insert into landlords (name, phone_number, email) values('$name', '$mobile', '$email')";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "Data inserted successfully";
        header('location: ../tables/landlords_view.php');
    } else {
        die(mysqli_error($con));
    }
}



    //DELETING LANDLORDS
if(isset($_GET['delete_landlord_id'])){
    $delete_id = $_GET['delete_landlord_id'];

    $sql = "DELETE FROM landlords WHERE id=$delete_id";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die(mysqli_error($con));
    } else {
        header('Location: ../tables/landlords_view.php');
    }
}

    //ADDING PROPERTY
if(isset($_POST['property']))
{
    $name = $_POST['name'];
    $location = $_POST['location'];
    $landlordId = $_POST['landlordSelect'];
    $typeId = $_POST['typeSelect'];
   

    // Check if the status checkbox is selected
    // $propertyStatus = isset($_POST["propertyStatus"]) ? "active" : "inactive";
    if(isset($_POST['propertyStatus'])){
        $status = "active";
    } else {
        $status = "inactive";
    }

    $sql ="INSERT INTO properties (name, location, landlord_id, type_id, active_status) VALUES('$name', '$location', '$landlordId', '$typeId', '$status')";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "Data inserted successfully";
        header('location: ../tables/property_view.php');
    } else {
        die(mysqli_error($con));
    }
}

    //DELETING PROPERTIES
if(isset($_GET['deleteid'])){
    $delete_id = $_GET['deleteid'];

    $sql = "DELETE FROM properties WHERE id=$delete_id";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die(mysqli_error($con));
    } else {
        header('Location: ../tables/property_view.php');
    }
}

  //ADDING UNITS

// if(isset($_POST['add_units']))
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// {
    $property_id= $_POST['propertySelect'];
    $name = $_POST['unit_name'];
    // $commission = $_POST['commission'];
    // $rent = $_POST['rent'];
    // $deposit = $_POST['deposit'];
    // $bedrooms = $_POST['bedrooms'];
    // $bathrooms = $_POST['bathrooms'];
    // $balconies = $_POST['balconies'];
    $unit_number = $_POST['unit_number'];
    // $floor_number = $_POST['floor_no'];
    // $available_date = $_POST['available_date'];
    $description = $_POST['description'];
    

    $checkStatus = $_POST['status'];

    if ($checkStatus == 'available') {
        $available = "Yes";
    } else {
        $available = "No";
    }

    if ($checkStatus == 'reserved') {
        $reserved = "Yes";
    } else {
        $reserved = "No";
    }

    if ($checkStatus == 'occupied') {
        $occupied = "Yes";
    } else {
        $occupied = "No";
    }
    

    $sql ="INSERT INTO units_two (property_id, unit_name, unit_number, available, reserved, occupied, description) VALUES('$property_id', '$name', '$unit_number', '$available', '$reserved', '$occupied', '$description')";
    $result = mysqli_query($con,$sql);

    if($result){
        // echo "Data inserted successfully";
        header('location: ../tables/units_view.php');
    } else {
        die(mysqli_error($con));
    }
}

 


    //DELETING units
    if(isset($_GET['delete_unit_id'])){
        $delete_id = $_GET['delete_unit_id'];
    
        $sql = "DELETE FROM units_two WHERE id=$delete_id";
        $result = mysqli_query($con, $sql);
    
        if(!$result){
            die(mysqli_error($con));
        } else {
            header('Location: ../tables/units_view.php');
        }
    }

    // ASSIGNING units
    if(isset($_POST['assign'])){
        $assign_id = $_GET['assign_id'];
    
        $sql = "UPDATE tenants
        SET tenant_status = 'assigned'
        WHERE id = $assign_id";
        $result = mysqli_query($con, $sql);
    
        if(!$result){
            die(mysqli_error($con));
        } else {
            header('Location: ../tables/tenants_view.php');
        }
    }


?>



