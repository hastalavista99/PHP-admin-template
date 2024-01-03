<?php 
include '../config/connect.php';


if(isset($_POST['deleteLandlord'])){
    $unique=$_POST['deleteLandlord'];

    $sql = "DELETE FROM landlords WHERE id=$unique";
    $result=mysqli_query($con,$sql);

    

}
?>