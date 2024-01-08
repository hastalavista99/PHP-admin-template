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
                            <h4 class="row text-capitalize ps-3">Users</h4>
                        </div>
                    </div>
                    <div class="col-md-2 pt-3">
                        <div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userModal">
                                New User
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row d-flex justify-content-between align-items-center ms-2 me-2">
                        <div class="col-sm-12 col-md-6 mt-1">

                        </div>
                    </div>

                </div>
                <div id="userViewTable" class="table-responsive p-0">

                </div>
            </div>
        </div>
    </div>
</div>

</div>


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

<!-- Modal -->
<div class="modal" id="userModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 150%">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">New User</h5>
                <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                    <div class="form-group col-md-12">
                        <label for="userName" class="form-label">Username:</label>
                        <input type="text" class="form-control ps-2" id="userName" name="name" autocomplete="off">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control ps-2" id="userEmail" name="email" autocomplete="off">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="userPassword" class="form-label">Password:</label>
                            <input type="password" class="form-control ps-2" id="userPassword" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="userRole" class="form-label">Property Type</label>
                        <select id="userRole" name="userRole" class="form-select ps-2">
                            <option value="" selected>-- Select Role --</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <!-- <option value="secretary">Secretary-</option> -->
                        </select>
                    </div>
                    <div class="col-12 my-3">
                        <button type="button" name="user" class="btn btn-primary" onclick="addUser()">Create</button>
                    </div>


            </div>


        </div>
    </div>
</div>

<!-- Update Landlords modal -->
<div class="modal" id="updateLandlordModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 150%">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Update Landlord</h5>
                <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="col-md-12">
                    <label for="updateLandlordName" class="form-label">Name:</label>
                    <input type="text" class="form-control ps-2" id="updateLandlordName" name="name" autocomplete="off">
                </div>

                <div class="col-md-6">
                    <label for="updateLandlordEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control ps-2" id="updateLandlordEmail" name="email" autocomplete="off">
                </div>
                <div class="col-md-6">
                    <label for="updateLandlordPhone" class="form-label">Phone Number:</label>
                    <input type="text" class="form-control ps-2" id="updateLandlordPhone" name="phone_number" autocomplete="off">
                </div>

                <div class="col-12 my-3">
                    <button type="button" name="update_landlord" class="btn btn-primary" onclick="updateDetails()">Update</button>
                    <input type="hidden" id="hiddenLandlordData">
                </div>

            </div>



        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        displayUserData();
    });
    // const updateModal = new bootstrap.Modal('#updateLandlordModal');
    const userModal = new bootstrap.Modal('#userModal');


    // display function
    function displayUserData() {
        var displayData = "true";
        $.ajax({
            url: "display.php",
            type: 'post',
            data: {
                displayUser: displayData
            },
            success: function(data, status) {
                $('#userViewTable').html(data);
            }
        })
    }

    function addUser() {
        var name = $('#userName').val();
        var email = $('#userEmail').val();
        var role = $('#userRole').val();
        var password = $('#userPassword').val();


        $.ajax({
            url: "insert.php",
            type: 'post',
            data: {
                userName: name,
                userEmail: email,
                userRole: role,
                userPassword: password
            },
            success: function(data, status) {
                // function to display data
                // console.log(status);
                userModal.hide();
                displayUserData();
            }
        })
    }

    // delete record
    function deleteLandlord(deleteid) {
        $.ajax({
            url: "delete.php",
            type: 'post',
            data: {
                deleteLandlord: deleteid
            },
            success: function(data, status) {
                displayData();
            }
        });
    }
    // update function to get details from the database
    function getLandlordDetails(updateid) {
        $('#hiddenLandlordData').val(updateid);


        $.post("update.php", {
            updateid: updateid
        }, function(data, status) {
            var userid = JSON.parse(data);
            $('#updateLandlordName').val(userid.name);
            $('#updateLandlordEmail').val(userid.email);
            $('#updateLandlordPhone').val(userid.phone_number);
        });
        updateModal.show();



    }
    // update 
    function updateDetails() {
        var updatename = $('#updateLandlordName').val();
        var updateemail = $('#updateLandlordEmail').val();
        var updatemobile = $('#updateLandlordPhone').val();
        var hiddendata = $('#hiddenLandlordData').val();

        $.post("update.php", {
            updatename: updatename,
            updateemail: updateemail,
            updatemobile: updatemobile,
            hiddendata: hiddendata
        }, function(data, status) {
            updateModal.hide();
            displayData();
        });
    }
</script>




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
<?php include('../includes/footer.php') ?>