<?php  include'../includes/header.php' ?>

<div class="container">

<?php

if (isset($_GET['sell_id'])){
  $sell_id = $_GET['sell_id'];
}

?>

<form class="row g-3 my-1" action="sellcon.php?sell_id=<?php echo $sell_id; ?>" method="post">
    <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="sell_name" id="name" class="form-control ps-2" required>
    </div>
    <div class="col-md-4">
        <label for="mobile_no" class="form-label">Phone Number</label>
        <input type="text" name="mobile" id="mobile_no" class="form-control ps-2">
    </div>
    <div class="col-md-4">
        <label for="email_sell" class="form-label">Email</label>
        <input type="email" name="sell_email" id="email_sell" class="form-control ps-2">
    </div>

    <div class="col-9">
        <a href="../tables/units_sale_view.php" class="btn btn-success">Back</a>
    </div>
    <div class="col-3">
        <button type="submit" name="sell" id="submitSell" class="btn btn-primary">book</button>
    </div>
</form>

<div class="table-responsive p-0">
        <table class="table table-striped" id="bookedUnits">
          <thead>
            <tr>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Buyer Name</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">mobile</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit name</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include '../config/connect.php';

            if(isset($_GET['sell_id'])){
              $sell_id= $_GET['sell_id'];
            }

            $sql = "SELECT
                sell.name AS buyer_name,
                sell.mobile AS mobile,
                sell.email AS email,
              units_sale.name AS unit_name,
              sell.date AS date_time
              
            FROM
              sell
            JOIN
              units_sale ON sell.unit_id = units_sale.id
            WHERE 
              sell.unit_id = $sell_id
            ";
            
            $result = $con->query($sql);

            if ($result->num_rows > 0){
              $row = $result->fetch_assoc();


              if ($row){

                echo '<tr>
                        <td class="text-center">' . $row["buyer_name"] . '</td>
                        <td class="text-center">' . $row["mobile"] . '</td>
                        <td class="text-center">' . $row["email"] . '</td>
                        <td class="text-center">' . $row["unit_name"] . '</td>
                        <td class="text-center">' . $row["date_time"] . '</td>
                      </tr>';

                    
              }
            } else {
              echo '<td colspan="8" class="text-center h4">Not Booked Yet</td>';
            }
            

            
            ?>
          </tbody>
        </table>
      </div>

</div>

<?php include '../includes/footer.php' ?>