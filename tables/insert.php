<?php 
include '../config/connect.php';

extract($_POST);

if(isset($_POST['landlordName']) && isset($_POST['landlordPhone']) && isset($_POST['landlordEmail'])) {
    $sql = "INSERT INTO landlords (name, phone_number, email) VALUES ('$landlordName', '$landlordPhone', '$landlordEmail')";

    $result = mysqli_query($con, $sql);

    
}


?>