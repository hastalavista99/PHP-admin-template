<?php

    include 'connect.php';

    // ADDING PROPERTY FOR SALE
    if(isset($_POST['property_sale']))
    {
        $name = $_POST['sale_name'];
        $location = $_POST['sale_location'];
        $landlordId = $_POST['landlordSaleSelect'];
        $sale_image = $_POST['sale_image'];
       
    
        $sql ="INSERT INTO property_sale (name, location, landlord_id, image) VALUES('$name', '$location', '$landlordId', '$sale_image')";
        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "Data inserted successfully";
            header('location: ../tables/property_sale_view.php');
        } else {
            die(mysqli_error($con));
        }
    }


    // ADDING UNITS FOR SALE
    if(isset($_POST['add_sale_units']))
    {
        $name = $_POST['unit_sale_name'];
        $property = $_POST['propertySaleSelect'];
        $commission = $_POST['unit_sale_commission'];
        $deposit = $_POST['unit_sale_deposit'];
        $price = $_POST['unit_sale_price'];
        $description = $_POST['unit_sale_description'];
       
    
        $sql ="INSERT INTO units_sale (property_sale_id, name, description, commission, deposit, price) VALUES('$property', '$name','$description', $commission, $deposit, $price)";
        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "Data inserted successfully";
            header('location: ../tables/units_sale_view.php');
        } else {
            die(mysqli_error($con));
        }
    }

?>