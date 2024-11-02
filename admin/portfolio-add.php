<?php
session_start();
include_once 'include/database.php';

$obj = new Database();

// if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || $_SESSION['roleType'] !== 'Manager') {
//     // Redirect to login page
//     header('location: login.php');
// }


include_once 'include/header.php';
include_once 'include/sidebar.php';
?>


<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <?php
        if (isset(($_SESSION['submit_success']))) {
            echo '
                <div class="alert alert-light-success light alert-dismissible fade show txt-success border-left-success mb-4"
                    role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-check-square">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <p>Submit Successfully: ' . $_SESSION['submit_success'] . '</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['submit_success']);
        }
        if (isset($_SESSION['submit_error'])) {
            echo '
                <div class="alert alert-light-dark light alert-dismissible fade show txt-dark border-left-dark" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-help-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    <p>Submit Failed: ' . $_SESSION['submit_error'] . '</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['uID_error']);
        }
        ?>

        <div class="row">

            <div class="col-xl-12">
                <div class="card height-equal">
                    <div class="card-header">
                        <h4>Add Portfolio</h4>
                        <!-- <p class="text-muted card-sub-title">Add new system user</p> -->
                    </div>
                    <div class="card-body">
                        <form action="include/admin-data.php" method="POST"
                            class="row g-3 needs-validation custom-input" novalidate="">
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="fullName">Full Name</label>
                                <input class="form-control" id="fullName" type="text" name="fullName"
                                    placeholder="Enter full name" required>
                                <div class="invalid-feedback">Please enter your valid </div>
                                <div class="valid-feedback">
                                    Looks's Good!</div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" type="text" name="email"
                                    placeholder="Enter email" required>
                                <div class="invalid-feedback">Please enter your valid </div>
                                <div class="valid-feedback">
                                    Looks's Good!</div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" id="username" type="text" name="username"
                                    placeholder="Enter username" required>
                                <div class="invalid-feedback">Please enter your valid </div>
                                <div class="valid-feedback">
                                    Looks's Good!</div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" type="password" name="password"
                                    placeholder="Enter password" required>
                                <div class="invalid-feedback">Please enter your valid</div>
                                <div class="valid-feedback">
                                    Looks's Good!</div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="roleType">User role</label>
                                <select class="form-select" id="roleType" name="roleType" required>
                                    <option value="">---- Select User Role ----</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Branch Manager">Branch Manager</option>
                                </select>
                                <div class="invalid-tooltip">Please select a valid state.</div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="btn-group">
                                    <button class="btn btn-primary me-2" type="submit" name="add-user">Add User</button>
                                    <a href="users-management" class="btn btn-outline-primary me-2"
                                        type="submit">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>



<?php include_once 'include/footer.php' ?>