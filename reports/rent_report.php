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
                            <h4 class="row text-capitalize ps-3">expected rent</h4>
                        </div>
                    </div>
                    <div class="col-md-2 pt-3">
                        <div>
                            <a class="btn btn-primary" href="reports_view">
                            <i class="material-icons opacity-10">arrow_back_ios</i> 
                                back
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
                        <table class="table table-striped table-hover align-items-center mb-0" id="rentTable">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">location</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">landlord</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">number of units</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">occupied units</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rent (est)</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = "SELECT
                                properties.id,
                                properties.name AS property_name,
                                properties.location AS property_location,
                                landlords.name AS landlord_name,
                                COUNT(units_two.id) AS total_units,
                                SUM(units_two.occupied = 'Yes') AS occupied_units,
                                FORMAT(SUM(billing_two.rent), 0) AS total_rent
                            FROM
                                units_two
                            LEFT JOIN
                                properties ON properties.id = units_two.property_id
                            LEFT JOIN
                                landlords ON landlords.id = properties.landlord_id
                            LEFT JOIN
                                billing_two ON billing_two.unit_id = units_two.id
                            WHERE
                                units_two.occupied = 'Yes'
                            GROUP BY
                                properties.id";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $propid=$row['id'];
                                        $sql2 = "SELECT COUNT(id) AS number_of_units FROM units_two WHERE property_id = $propid";
                                        $result2 = mysqli_query($con, $sql2);
                                        $row2 = mysqli_fetch_assoc($result2);
                                        $property_name = $row['property_name'];
                                        $location = $row['property_location'];
                                        $landlord = $row['landlord_name'];
                                        $no_of_units = $row2['number_of_units'];
                                        $occupied = $row['occupied_units'];
                                        $rent = $row['total_rent'];


                                        echo '<tr>
                                <td scope="row" class="text-center">' . $property_name . '</td>
                                <td class="text-center">' . $location . '</td>
                                <td class="text-center">' . $landlord . '</td>
                                <td class="text-center">' . $no_of_units . '</td>
                                <td class="text-center">' . $occupied . '</td>
                                <td class="text-center font-weight-bolder"><span class="text-xs">KES</span> ' . $rent . '</td>
                                
                              </tr>';
                                    }
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





<!-- EXPORTING TO EXCEL -->
<script>
    function exportToExcel() {
        // Prevent the default behavior of the link
        event.preventDefault();

        // Send an AJAX request to the server
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../config/excel.php', true);
        xhr.responseType = 'blob'; // Set the response type to blob
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Create a blob from the response
                var blob = new Blob([xhr.response], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                });

                // Create a link element and trigger the download
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'landlord_data.xlsx';

                // Append the link to the document and click it
                document.body.appendChild(link);
                link.click();

                // Remove the link from the document
                document.body.removeChild(link);
            }
        };
        xhr.send();
    }

    // Attach the function to the click event of the link
    document.getElementById('exportExcel').addEventListener('click', exportToExcel);
</script>
<!-- EXPORT TO PDF -->
<script>
    function exportToPdf() {
        // Prevent the default behavior of the link
        event.preventDefault();

        // Send an AJAX request to the server
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'pdf.php', true);
        xhr.responseType = 'blob'; // Set the response type to blob
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Create a blob from the response
                var blob = new Blob([xhr.response], {
                    type: 'application/pdf'
                });

                // Create a link element and trigger the download
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'landlord_data.pdf';

                // Append the link to the document and click it
                document.body.appendChild(link);
                link.click();

                // Remove the link from the document
                document.body.removeChild(link);
            }
        };
        xhr.send();
    }

    // Attach the function to the click event of the link
    document.getElementById('exportPDF').addEventListener('click', exportToPdf);
</script>




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