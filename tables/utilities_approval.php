<?php include '../includes/header.php'; ?>
<?php include '../config/connect.php'; ?>
<!-- End Navbar -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="d-flex justify-content-between">
                    <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
                        <div class="pt-1 pb-1">
                            <h4 class="row text-capitalize ps-3">Utilities Approval</h4>
                        </div>
                    </div>
                    <div class="col-md-3 pt-3">
                        <div>
                            <button type="button" class="btn btn-primary" id="approveUtilitiesBtn">
                                Approve
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2 pt-3">
                        <div>
                            <a class="btn btn-success" href="approval">
                                <i class="material-icons opacity-10">arrow_back_ios</i>
                                Back
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row d-flex justify-content-between align-items-center ms-2 me-2">
                        <div class="col-sm-12 col-md-6 mt-1">

                        </div>
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table table-hover align-items-center mb-0 don" id="unitsView">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><input type="checkbox" name="" id="utilitiesSelect"></th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">trans id</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no.</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rent amount (kes)</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">month</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">time</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">operations</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = "SELECT * FROM pending_transactions WHERE transaction_type = 'utilities'";

                                $result = $con->query($sql);

                                $number = 1;

                                if ($result->num_rows > 0) {
                                    while ($row1 = $result->fetch_assoc()) {
                                        $tenantId = $row1['tenant_id'];
                                        $tenantQuery = "SELECT name FROM tenants_two WHERE id = $tenantId";
                                        $tenantResult = $con->query($tenantQuery);
                                        $row = $tenantResult->fetch_assoc();
                                        $amount = number_format($row1['amount']);
                                        echo '<tr>';
                                        echo '<td scope="row" class="text-center"><input type="checkbox" class="utilitiesEach" name="" id="utilitiesEach"></td>';
                                        echo ' <td class="text-center">00' . $row1["id"] . '</td>';
                                        echo ' <td class="text-center">' . $tenantId . '</td>';
                                        echo ' <td class="text-center">' . $row["name"] . '</td>';
                                        echo '<td class="text-center">' . $amount . '</td>';
                                        echo ' <td class="text-center">' . $row1["month"] . '/' . $row1["year"] . '</td>';
                                        echo '<td class="text-center">' . $row1["time"] . '</td>';

                                        echo '<td class="text-center">
                                  <a style="color: red;"  name="delete_unit_id" href="../config/dbcon.php?delete_unit_id=' . $row1["id"] . '"><i class="material-icons opacity-10">delete</i></a></td>';
                                        echo '</tr>';
                                        $number++;
                                    }
                                } else {
                                    echo "<tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>";
                                }

                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
  const allSelect = document.getElementById('utilitiesSelect');
  let selectBoxes = document.querySelectorAll('#utilitiesEach');

  allSelect.addEventListener('change', () => {
    // Iterate over each checkbox
    selectBoxes.forEach(checkbox => {
      // Set or unset the checked attribute based on the state of allSelect
      checkbox.checked = allSelect.checked;
    });
  });

 
</script>
<script>
    $(document).ready(function() {
        // Listen for click event on the "Process Selected" button
        $('#approveUtilitiesBtn').on('click', function() {
            // Array to store data for selected rows
            var selectedRowsData = [];

            // Loop through each checked checkbox
            $('.utilitiesEach:checked').each(function() {
                var rowData = {};
                // Get the parent row of the checkbox
                var $row = $(this).closest('tr');
                // Loop through each cell in the current row
                $row.find('td').each(function(index) {
                    // Get the text content of the cell
                    var columnName = $('#unitsView thead th').eq(index).text().trim();
                    var cellValue = $(this).text().trim();
                    // Add cell value to rowData object
                    rowData[columnName] = cellValue;
                });
                // Push rowData object to selectedRowsData array
                selectedRowsData.push(rowData);
            });
            console.log(selectedRowsData);

            // Send AJAX request to server
            $.ajax({
                url: 'approvalcon.php', // Update with your PHP script URL
                method: 'POST',
                data: {
                    selectedUtilitiesData: selectedRowsData
                },
                success: function(response) {
                    // Handle response from server
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<?php include('../includes/footer.php') ?>
</main>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Unit Modal -->

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!--   Core JS Files   -->

<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/perfect-scrollbar.min.js"></script>
<script src="../assets/js/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>