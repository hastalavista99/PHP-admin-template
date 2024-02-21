<?php include '../includes/header.php' ?>

<div class="container">

    <?php

    if (isset($_GET['assign_id'])) {
        $assign_id = $_GET['assign_id'];
    }

    ?>


    <form class="row g-3 my-1" action="assigncon.php?assign_id=<?php echo $assign_id; ?>" method="post">
        <div class="col-md-2">
            <label for="property" class="form-label">Property Name</label>
            <select id="property" name="property_Select" class="form-select ps-2">
                <option value="" selected>-- Select Property --</option>
                <?php
                $conn = new mysqli('localhost', 'jack', '.kJgIRNMbIEKKi](', 'property');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, name FROM properties";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }
                } else {
                    echo "<option value='' disabled>No types found</option>";
                }

                $conn->close();
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="unit" class="form-label">Unit Number</label>
            <select id="unit" name="unitSelect" class="form-select ps-2">
                <option value="" selected>-- Select Unit --</option>

            </select>



        </div>


        <!-- <div class="col-md-3">
            <label for="type_of" class="form-label">Rent or Lease</label>
            <select name="contract" id="type_of" class="form-select ps-2" onchange="toggleLeaseOptions()">
                <option value="" selected>-- Choose... --</option>
                <option value="rent">Rent</option>
                <option value="lease">Lease</option>
                <option value="hire">Hire</option>
            </select>
        </div> -->
        <div class="col-md-2">
            <label for="rentAmount" class="form-label">Rent Amount</label>
            <input type="number" name="rent" id="rentAmount" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="utilitiesAmount" class="form-label">Utilities Amount</label>
            <input type="number" name="utilities" id="utilitiesAmount" class="form-control">
        </div>

        <div class="col-md-2">
            <label for="rentMonthSelect" class="form-label">Month:</label>
            <select name="rentMonth" id="rentMonthSelect" class="form-select ps-2">
                <?php
                function generateMonthSelect()
                {
                    $currentMonth = date('n'); // Get the current month (1 to 12)


                    for ($month = 1; $month <= 12; $month++) {
                        $monthName = date('F', mktime(0, 0, 0, $month, 1));
                        $selected = ($month == $currentMonth) ? 'selected' : '';
                        echo "<option value='$month' $selected>$monthName</option>";
                    }
                    echo '</select>';
                }

                generateMonthSelect();
                ?>
        </div>

        <div class="col-md-2">
            <label for="rentYearSelect" class="form-label">Year:</label>
            <select name="rentYear" id="rentYearSelect" class="form-select ps-2">
                <?php
                function generateYearSelect()
                {
                    $currentYear = date('Y'); // Get the current year


                    for ($year = $currentYear - 10; $year <= $currentYear + 10; $year++) {
                        $selected = ($year == $currentYear) ? 'selected' : '';
                        echo "<option value='$year' $selected>$year</option>";
                    }
                    echo '</select>';
                }

                // Example usage
                generateYearSelect();
                ?>
        </div>
        <div class="col-md-3">
            <label for="lease" class="form-label" id="leaseLabel" style="display: none;">Duration</label>
            <select name="leaseSelect" id="lease" class="form-select ps-2" style="display: none;">
                <option value="three">3-month</option>
                <option value="six">6-month</option>
                <option value="twelve">12-month</option>
            </select>
        </div>

        <script>
            function toggleLeaseOptions() {
                var typeOfSelect = document.getElementById("type_of");
                var leaseSelect = document.getElementById("lease");

                if (typeOfSelect.value === "lease") {
                    leaseSelect.style.display = "inline-block";
                    document.getElementById("leaseLabel").style.display = "inline-block";
                } else {
                    leaseSelect.style.display = "none";
                    document.getElementById("leaseLabel").style.display = "none";
                }
            }
        </script>

        <div class="col-10">
            <a href="../tables/tenants_view.php" class="btn btn-success">Back to tenants</a>
        </div>
        <div class="col-2">
            <button type="submit" name="assign" id="submitAssign" class="btn btn-primary">submit</button>
        </div>
    </form>

    <div class="table-responsive p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tenant Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">propertyname</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit number</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rent</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">utilities</th>

                </tr>
            </thead>
            <tbody>
                <?php

                include '../config/connect.php';

                if (isset($_GET['assign_id'])) {
                    $assign_id = $_GET['assign_id'];
                }

                $sql = "SELECT
                tenants_two.name AS tenant_name,
                properties.name AS property_name,
              units_two.unit_name AS unit_name,
              units_two.unit_number AS unit_number,
              tenants_two.contract AS tenant_contract
            FROM
              tenants_two
            JOIN
              units_two ON tenants_two.unit_id = units_two.id
            JOIN
                properties ON tenants_two.property_id = properties.id
            WHERE 
              tenants_two.id = $assign_id";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();


                    if ($row) {

                        echo '<tr>
                        <td class="text-center">' . $row["tenant_name"] . '</td>
                        <td class="text-center">' . $row["property_name"] . '</td>
                        <td class="text-center">' . $row["unit_name"] . '</td>
                        <td class="text-center">' . $row["unit_number"] . '</td>
                        <td class="text-center">' . $row["tenant_contract"] . '</td>
                      </tr>';
                    }
                } else {
                    echo '<td colspan="8" class="text-center h4">Not Assigned Yet</td>';
                }



                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#property').change(function() {
                var propertyId = $(this).val();

                // If a property is selected, fetch and populate units
                if (propertyId !== "") {
                    $.ajax({
                        url: 'get_units.php', // Replace with the actual path to get_units.php
                        type: 'POST',
                        data: {
                            propertyId: propertyId
                        },
                        success: function(data) {
                            // console.log(data); 
                            $('#unit').html(data);
                            $('#unit').prop('disabled', false);
                        }
                    });
                } else {
                    // If no property is selected, disable unit select
                    $('#unit').html('<option value="" selected disabled>Select Property First</option>');
                    $('#unit').prop('disabled', true);
                }
            });
        });
    </script>
</div>

<?php include '../includes/footer.php' ?>