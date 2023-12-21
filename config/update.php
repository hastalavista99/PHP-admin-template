<?php

include 'connect.php';

//UPDATE LANDLORD
$id = $_GET['update_landlord_id'];
if(isset($_POST['update_landlord']))
{
    $name = $_POST['name'];
    $mobile = $_POST['phone_number'];
    $email = $_POST['email'];

    $sql = "update landlords set id='$id', name='$name', phone_number='$mobile', email='$email' where id='$id'";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "Data updated successfully";
        // header('location: ../tables/landlords_view.php');
    } else {
        die(mysqli_error($con));
    }
}

?>