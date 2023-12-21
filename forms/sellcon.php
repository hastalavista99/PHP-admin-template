<?php

include '../config/connect.php';
 // SELLING units
 if(isset($_POST['sell'])){
    $sell_id = $_GET['sell_id'];
    $name = $_POST['sell_name'];
    $email = $_POST['sell_email'];
    $mobile = $_POST['mobile'];



    $sql = "INSERT INTO sell (name, email, mobile, unit_id) VALUES ('$name', '$email', '$mobile', $sell_id)";

 
    $result = mysqli_query($con, $sql);

    $sql2 = "UPDATE units_sale
            SET booked = 'Yes'
            WHERE id = $sell_id";
    $result2 = mysqli_query($con, $sql2);

    
    if($result && $result2){
        header("location: sell_units.php?sell_id=$sell_id");
    } else {
        die(mysqli_error($con));
    }
}
?>