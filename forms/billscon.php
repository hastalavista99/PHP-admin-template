<?php

include '../config/connect.php';
// Billing units
if (isset($_POST['bill'])) {
    $bill_id = $_GET['bill_id'];
    $commission = $_POST['commission'];
    $rent = $_POST['rent'];
    $deposit = $_POST['deposit'];
    $service = $_POST['service'];
    $water = $_POST['water'];
    $electricity = $_POST['electricity'];
    

    $sql = "INSERT INTO billing_two (unit_id, commission, rent, deposit, service_charge, water_deposit, electricity_deposit) VALUES('$bill_id', '$commission', '$rent', '$deposit', '$service', '$water', '$electricity') ";
    $result = mysqli_query($con, $sql);

    if ($result) {
      header("location: bill_units.php?bill_id=$bill_id");
    } else {
      die(mysqli_error($con));
    }
  }

?>