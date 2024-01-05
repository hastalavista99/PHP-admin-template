<?php

include '../config/connect.php';
 // Payments
 if(isset($_POST['pay'])){
    $buyer_id = $_GET['pay_id'];
    $unit_id = $_GET['unit_id'];
    $amount = $_POST['amount'];
    $payment = $_POST['payment_method'];
    $cheque_no = $_POST['cheque_no'];
    $bank = $_POST['bank_name'];



    $sql = "INSERT INTO payment (amount, type_payment, cheque_no, bank_name, buyer_id) VALUES ('$amount', '$payment', '$cheque_no', '$bank', $buyer_id)";
    $result = mysqli_query($con, $sql);

    $sql2 = "UPDATE units_sale SET sold='Yes' WHERE id=$unit_id";
    $result2 = mysqli_query($con, $sql2);

    if($result && $result2){
        header("location: payment.php?pay_id=$buyer_id");
    } else {
        die(mysqli_error($con));
    }
}
?>