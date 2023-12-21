<?php include '../includes/header.php' ?>

<div class="container">

    <?php

    if (isset($_GET['pay_id'])) {
        $pay_id = $_GET['pay_id'];
    }

    ?>


    <form class="row g-3 my-1" action="paymentcon.php?pay_id=<?php echo $pay_id; ?>" method="post">
        <div class="col-md-3">
            <label for="payment" class="form-label">Amount</label>
            <input type="number" name="amount" id="payment" class="form-control ps-2">
        </div>

        <div class="col-md-3">
            <label for="paySelect" class="form-label">Payment Method</label>
            <select name="payment_method" id="paySelect" class="form-select ps-2" onchange="togglePaymentOptions()">
                <option value="" selected>-- Choose... --</option>
                <option value="cash">cash</option>
                <option value="cheque">cheque</option>
                <option value="bank_transfer">bank transfer</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="bankName" class="form-label" id="bankLabel" style="display: none;">Bank Name</label>
            <input type="text" class="form-control ps-2" name="bank_name" style="display: none;" id="bankName">
        </div>
        <div class="col-md-3">
            <label for="cheque_no" class="form-label" id="chequeLabel" style="display: none;">Cheque No</label>
            <input type="text" class="form-control ps-2" name="cheque_no" id="cheque_no" style="display: none;">
        </div>
        


        <script>
            function togglePaymentOptions() {
                var typeOfSelect = document.getElementById("paySelect");
                var chequeNo = document.getElementById("cheque_no");
                var bankName = document.getElementById("bankName");

                if (typeOfSelect.value === "cheque") {
                    chequeNo.style.display = "inline-block";
                    document.getElementById("chequeLabel").style.display = "inline-block";
                    bankName.style.display = "inline-block";
                    document.getElementById("bankLabel").style.display = "inline-block";
                } else {
                    chequeNo.style.display = "none";
                    document.getElementById("chequeLabel").style.display = "none";
                    bankName.style.display = "none";
                    document.getElementById("bankLabel").style.display = "none";
                }

                if (typeOfSelect.value === "bank_transfer") {
                    bankName.style.display = "inline-block";
                    document.getElementById("bankLabel").style.display = "inline-block";
                } else {
                    bankName.style.display = "none";
                    document.getElementById("bankLabel").style.display = "none";
                }
            }
        </script>

        <div class="col-10">
            <a href="../tables/tenants_view.php" class="btn btn-success">Back</a>
        </div>
        <div class="col-2">
            <button type="submit" name="pay" id="submitAssign" class="btn btn-primary">Assign</button>
        </div>
    </form>

    <div class="table-responsive p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">receipt number</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Buyer Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">propertyname</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">owner</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment method</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>

                </tr>
            </thead>
            <tbody>
                <?php

                include '../config/connect.php';

                if (isset($_GET['pay_id'])) {
                    $pay_id = $_GET['pay_id'];
                }

                $sql = "SELECT
                sell.name AS buyer_name,
                property_sale.name AS property_name,
              units_sale.name AS unit_name,
              payment.amount AS amount,
              payment.type_payment AS payment_type,
              payment.date AS payment_date
              
            FROM
              payment
            LEFT JOIN
                sell ON payment.buyer_id = sell.id
            LEFT JOIN
              units_sale ON sell.unit_id = units_sale.id
            LEFT JOIN
                property_sale ON units_sale.property_sale_id = property_sale.id
            WHERE 
              sell.id = $pay_id";

                $result = $con->query($sql);

                $sql1 = "SELECT
                LPAD(id, 4, '0') AS receipt_number
                FROM
                    payment";

                $result1 = $con->query($sql1);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $row1 = $result1->fetch_assoc();


                    if ($row) {

                        echo '<tr>
                        <td class="text-center">' . $row1["receipt_number"] . '</td>
                        <td class="text-center">' . $row["buyer_name"] . '</td>
                        <td class="text-center">' . $row["property_name"] . '</td>
                        <td class="text-center">' . $row["unit_name"] . '</td>
                        <td class="text-center">' . $row["amount"] . '</td>
                        <td class="text-center">' . $row["payment_type"] . '</td>
                        <td class="text-center">' . $row["payment_date"] . '</td>
                      </tr>';
                    }
                } else {
                    echo '<td colspan="8" class="text-center h4">No Payments Yet</td>';
                }



                ?>
            </tbody>
        </table>
    </div>
    <?php

    echo '<div class="d-flex justify-content-end me-3">
          <div class="total h4">Total: ' . $total . ' </div>
        </div>';
    ?>
</div>



<?php include '../includes/footer.php' ?>