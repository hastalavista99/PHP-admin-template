<?php 
include '../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM pending_transactions WHERE transaction_type = 'rent'";

    $result = $con->query($sql);

    $number = 1;

    if ($result->num_rows > 0) {
      while ($row1 = $result->fetch_assoc()) {
        $tenantId = $row1['tenant_id'];
        $tenantQuery = "SELECT name FROM tenants_two WHERE id = $tenantId";
        $tenantResult = $con->query($tenantQuery);
        $row = $tenantResult->fetch_assoc();
        $rent = number_format($row1['amount']);
        echo '<tr>';
        echo '<td scope="row" class="text-center"><input type="checkbox" class="rentEach" name="" id="rentEach"></td>';
        echo ' <td class="text-center">' . $row1['id'] . '</td>';
        echo ' <td class="text-center">' . $tenantId . '</td>';
        echo ' <td class="text-center">' . $row["name"] . '</td>';
        echo '<td class="text-center">' . $rent . '</td>';
        echo ' <td class="text-center">' . $row1["month"] . '/' . $row1["year"] . '</td>';
        echo '<td class="text-center">' . $row1["time"] . '</td>';

        echo '<td class="text-center">
                      <a style="color: red;"  name="delete_unit_id" href="../config/dbcon.php?delete_unit_id=' . $row1["id"] . '"><i class="material-icons opacity-10">delete</i></a></td>';
        echo '</tr>';
        $number++;
      }
    } else {
      echo "<tr><td colspan='6'>No transactions found</td></tr>";
    }

}

?>