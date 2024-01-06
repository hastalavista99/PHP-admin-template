<?php 
include '../config/connect.php';


if(isset($_POST['deleteLandlord'])){
    $unique=$_POST['deleteLandlord'];

    $sql = "DELETE FROM landlords WHERE id=$unique";
    $result=mysqli_query($con,$sql);

    

}

if(isset($_POST['deleteProperty'])){
    $propid=$_POST['deleteProperty'];

    $sql = "DELETE FROM properties WHERE id=$propid";
    $result=mysqli_query($con,$sql);


}

// unbook units
if(isset($_GET['unbook'])){
    $unbookid=$_GET['unbook'];
    $property_id = $_GET['property_id'];

    $sql = "UPDATE units_sale SET booked='No' WHERE property_sale_id=$property_id";
    $result=mysqli_query($con,$sql);

    $sql2 = "UPDATE sell SET booked='No' WHERE unit_id=$unbookid";
    $result2=mysqli_query($con,$sql2);

    if($result && $result2){
        header('location: units_sale_view.php');
    } else {
        die(mysqli_error($con));
    }

    

}
?>