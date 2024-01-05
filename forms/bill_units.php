<?php include '../config/connect.php'; ?>
<?php include '../includes/header.php'; ?>


    <div class="container">
      <?php

      if (isset($_GET['bill_id'])){
        $bill_id = $_GET['bill_id'];
      }

      echo '<form class="row g-3 my-1" action="billscon.php?bill_id='.$bill_id.'" method="post">

        <div class="col-md-3">
          <label for="commission" class="form-label">Commission *</label>
          <input type="number" class="form-control ps-2" id="commission" name="commission" placeholder="$" required autocomplete="off">
        </div>
        <div class="col-md-3">
          <label for="rent" class="form-label">Rent *</label>
          <input type="number" class="form-control ps-2" id="rent" name="rent" placeholder="$" required autocomplete="off">
        </div>
        <div class="col-md-3">
          <label for="deposit" class="form-label">Deposit</label>
          <input type="number" class="form-control ps-2" id="deposit" name="deposit" placeholder="$" required autocomplete="off">
        </div>
        <div class="col-md-3">
          <label for="service" class="form-label">Service Charge</label>
          <input type="number" class="form-control ps-2" id="service" name="service" placeholder="$" required autocomplete="off">
        </div>
        <div class="col-md-3">
          <label for="water" class="form-label">Water Deposit</label>
          <input type="number" class="form-control ps-2" id="water" name="water" placeholder="$" required autocomplete="off">
        </div>
        <div class="col-md-3">
          <label for="electricity" class="form-label">Electricity Deposit</label>
          <input type="number" class="form-control ps-2" id="electricity" name="electricity" placeholder="$" required autocomplete="off">
        </div>
        <div class="col-9">
          <a href="../tables/units_view.php" class="btn btn-success">Back to units</a>
        </div>
        <div class="col-3">
          <button type="submit" name="bill" id="submitBill" class="btn btn-primary">Submit</button>
        </div>
      </form>';

      ?>

      <div class="table-responsive p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit name</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit number</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">commission</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">security deposit</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rent</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">water</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">electricity</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Service charge</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if(isset($_GET['bill_id'])){
              $bill= $_GET['bill_id'];
            }

            $sql = "SELECT
              units_two.unit_name AS unit_name,
              units_two.unit_number AS unit_number,
              billing_two.commission AS commission,
              billing_two.deposit AS deposit,
              billing_two.rent AS rent,
              billing_two.service_charge AS service_charge,
              billing_two.water_deposit AS water,
              billing_two.electricity_deposit AS electricity
            FROM
              billing_two
            JOIN
              units_two ON billing_two.unit_id = units_two.id
            WHERE 
              units_two.id = $bill
            ";
            
            $result = $con->query($sql);

            if ($result->num_rows > 0){
              $row = $result->fetch_assoc();
              $total = 0;

              if ($row){

                echo '<tr>
                        <td class="text-center">' . $row["unit_name"] . '</td>
                        <td class="text-center">' . $row["unit_number"] . '</td>
                        <td class="text-center">' . $row["commission"] . '</td>
                        <td class="text-center">' . $row["deposit"] . '</td>
                        <td class="text-center">' . $row["rent"] . '</td>
                        <td class="text-center">' . $row["service_charge"] . '</td>
                        <td class="text-center">' . $row["water"] . '</td>
                        <td class="text-center">' . $row["electricity"] . '</td>
                      </tr>';

                    $total += $row['commission'] + $row['deposit'] + $row['rent'] + $row['service_charge'] + $row['water'] + $row['electricity'];
              }
            } else {
              echo '<td colspan="8" class="text-center h4">No Bills Yet</td>';
            }
            

            
            ?>
          </tbody>
        </table>
        <?php
        echo '<div class="d-flex justify-content-end me-3">
          <div class="total h4">Total: <span class="text-xs">KES</span> ' . $total . ' </div>
        </div>';
        ?>
      </div>


    </div>


    
   
    <footer class="footer pt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-12">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">Services</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">About</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </main>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/smooth-scrollbar.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the toggle buttons and collapsible content
      var toggleButtons = document.querySelectorAll('.btn-toggle');
      var collapsibleContents = document.querySelectorAll('.collapse');

      // Add a click event listener to each toggle button
      toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          // Get the target collapsible content using data-bs-target attribute
          var targetId = button.getAttribute('data-bs-target');
          var collapsibleContent = document.querySelector(targetId);

          // Toggle the 'show' class on the collapsible content
          collapsibleContent.classList.toggle('show');

          // Update the 'aria-expanded' attribute of the button
          var expanded = collapsibleContent.classList.contains('show');
          button.setAttribute('aria-expanded', expanded);
        });
      });
    });
  </script>
</body>

</html>