<?php include '../includes/header.php' ?>

<div class="container">

    <?php

    if (isset($_GET['assign_id'])) {
        $assign_id = $_GET['assign_id'];
    }

    ?>


    <form class="row g-3 my-1" id="rentForm">
        <div class="col-md-2">
            <label for="rentProperty" class="form-label">Property Name</label>
            <select id="rentProperty" name="propertySelect" class="form-select ps-2">
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
            <label for="rentUnit" class="form-label">Unit Number</label>
            <select id="rentUnit" name="unitSelect" class="form-select ps-2">
                <option value="" selected>-- Select Unit --</option>

            </select>

       
            <label for="tenantName" class="form-label">Tenant</label>
            <select id="tenantName" name="unitSelect" class="form-select ps-2">
                <option value=""></option>

            </select>
        
       
            <label for="expectedRent" class="form-label">Expected Rent</label>
            <select id="expectedRent" name="unitSelect" class="form-select ps-2">
                <option value=""></option>

            </select>
        </div>
        <div class="col-md-2">
            <label for="rentAmount" class="form-label">Rent (Kshs)</label>
            <input type="number" name="rent" id="rentAmount" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="utilitiesAmount" class="form-label">Utilities (Kshs)</label>
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
        
        <div class="d-flex justify-content-between align-items-lg-stretch">
            <div class="col-3">
                <a href="../tables/tenants_view.php" class="btn btn-success">Back to tenants</a>
            </div>
            <div class="col-2">
                <button onclick="saveData()" type="button" name="rent_pay" class="btn btn-primary">submit</button>
            </div>
        </div>

    </form>

    <div class="table-responsive p-0">
        <table class="table table-striped" id="rentTable">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tenant Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rent</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">utilities</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rent for</th>


                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#rentProperty').change(function() {
                var propertyId = $(this).val();

                // If a property is selected, fetch and populate units
                if (propertyId !== "") {
                    $.ajax({
                        url: 'rentcon.php', // Replace with the actual path to get_units.php
                        type: 'POST',
                        data: {
                            propertyRentId: propertyId
                        },
                        success: function(data) {
                            // console.log(data); 
                            $('#rentUnit').html(data);
                            $('#rentUnit').prop('disabled', false);
                        }
                    });
                } else {
                    // If no property is selected, disable unit select
                    $('#rentUnit').html('<option value="" selected disabled>Select Property First</option>');
                    $('#rentUnit').prop('disabled', true);
                }
            });


            $('#rentUnit').change(function() {
                var unitId = $(this).val();

                // If a property is selected, fetch and populate units
                if (unitId !== "") {
                    $.ajax({
                        url: 'tenantcon.php', // Replace with the actual path to get_units.php
                        type: 'POST',
                        data: {
                            unitRentId: unitId
                        },
                        success: function(data) {

                            $('#tenantName').html(data);
                            $('#tenantName').prop('disabled', false);
                        }
                    });
                }
            });
            
            $('#rentUnit').change(function() {
                var unitId = $(this).val();

                // If a property is selected, fetch and populate units
                if (unitId !== "") {
                    $.ajax({
                        url: 'exp_rent.php', // Replace with the actual path to get_units.php
                        type: 'POST',
                        data: {
                            unitRentId: unitId
                        },
                        success: function(data) {

                            $('#expectedRent').html(data);
                            $('#expectedRent').prop('disabled', false);
                        }
                    });
                }
            });


        });
    </script>
    <script>
        const saveData = () => {

            const tenantName = document.getElementById('tenantName').value;
            const rentAmount = document.getElementById('rentAmount').value;
            const utilitiesAmount = document.getElementById('utilitiesAmount').value;
            const rentMonthSelect = document.getElementById('rentMonthSelect').value;
            const rentYearSelect = document.getElementById('rentYearSelect').value;

            const rentData = {
                tenant: tenantName,
                rent: rentAmount,
                utilities: utilitiesAmount,
                month: rentMonthSelect,
                year: rentYearSelect
            };

            let storedData = JSON.parse(localStorage.getItem('rentData')) || [];
            storedData.push(rentData);

            localStorage.setItem('rentData', JSON.stringify(storedData));
            displayData();

            // Clear form fields after saving
            document.getElementById('rentProperty').value = '';
            document.getElementById('rentUnit').value = '';
            document.getElementById('tenantName').value = '';
            document.getElementById('rentAmount').value = '';
            document.getElementById('utilitiesAmount').value = '';
        };;

        const displayData = () => {
            const storedData = localStorage.getItem('rentData');

            // Check if storedData is not null and is a string
            if (storedData && typeof storedData === 'string') {
                // Parse the JSON string to an object
                const rentData = JSON.parse(storedData);

                // Check if rentData is an array
                if (Array.isArray(rentData)) {
                    const table = document.getElementById('rentTable');

                    // Clear existing rows in the table
                    while (table.rows.length > 1) {
                        table.deleteRow(1);
                    }

                    rentData.forEach((data) => {
                        const newRow = table.insertRow(-1);
                        newRow.classList.add('text-center');

                        const cell1 = newRow.insertCell(0);
                        const cell2 = newRow.insertCell(1);
                        const cell3 = newRow.insertCell(2);
                        const cell4 = newRow.insertCell(3);

                        const rent = parseInt(`${data.rent}`);
                        const formatted_rent = rent.toLocaleString();
                        const utilities = parseInt(`${data.utilities}`);
                        const formatted_utilities = utilities.toLocaleString();

                        cell1.innerHTML = data.tenant;
                        cell2.innerHTML = `<span class="text-uppercase text-xxs">kshs</span> ${formatted_rent}`;
                        cell3.innerHTML = `<span class="text-uppercase text-xxs">kshs</span> ${formatted_utilities}`;
                        cell4.innerHTML = `${data.month}/${data.year}`;
                    });
                } else {
                    console.error('Stored data is not an array.');
                }
            } else {
                console.error('No data stored or stored data is not a string.');
            }
        };

        displayData();
        const clearTable = () => {
            const table = document.getElementById('rentTable');
            // Clear existing rows in the table
            while (table.rows.length > 1) {
                table.deleteRow(1);
            }
        };
    </script>

    <div class="d-flex align-items-end justify-content-end px-6">
        <button type="button" onclick="postDataToMySQL()" class="btn btn-info">post</button>
    </div>

    <script>
        const postDataToMySQL = async () => {
            const storedData = localStorage.getItem('rentData');

            if (storedData && typeof storedData === 'string') {
                const rentData = JSON.parse(storedData);
                console.log(rentData);

                // Check if rentData is an array
                if (Array.isArray(rentData)) {
                    const url = 'concon.php'; // Adjust the URL to the location of your PHP script

                    try {
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                dataArray: rentData
                            }), // Wrap the array in an object
                        });

                        const jsonResponse = await response.json();

                        if (response.ok) {
                            console.log('Data posted to MySQL successfully:', jsonResponse);
                            // Optionally, you can clear local storage or handle other actions after posting
                            clearTable();
                            localStorage.removeItem('rentData');
                        } else {
                            console.error('Failed to post data to MySQL:', jsonResponse);
                        }
                    } catch (error) {
                        console.error('Failed to post data to MySQL:', error);
                    }
                } else {
                    console.error('Stored data is not an array.');
                }
            } else {
                console.error('No data stored or stored data is not a string.');
            }
        };

        // Call the function to initiate the data posting
        postDataToMySQL();
    </script>
</div>

<?php include '../includes/footer.php' ?>