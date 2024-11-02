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
        <div class="row">
            <div class="col-xl-12">
                <div class="card height-equal">
                    <div class="card-header">
                        <h4>Edit User</h4>
                        <!-- <p class="text-muted card-sub-title">Edit existing system user</p> -->
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['uID'])) {

                            // Sanitize the uID to prevent SQL injection
                            $uID = mysqli_real_escape_string($obj->getMysqli(), $_GET['uID']);

                            // Execute the select query
                            $obj->select('users', '*', null, "uID = '$uID'", null, null);
                            $result = $obj->getResult();

                            // Check if the user exists
                            if (count($result) > 0) {
                                $user = $result[0];
                            } else {
                                $_SESSION['error'] = "User not found.";
                                header("Location: users-management.php");
                                exit();
                            }

                        } else {
                            $_SESSION['error'] = "Something went wrong. Please try again later.";
                            header("Location: users-management.php");
                            exit();
                        }
                        // echo '<pre>';
                        // print_r($user);
                        // echo '</pre>'; 
                        ?>
                        <form action="include/admin-data.php" method="POST"
                            class="row g-3 needs-validation custom-input" novalidate="">
                            <input class="form-control" type="text" name="uID" hidden
                                value="<?php echo htmlspecialchars($user['uID']); ?>">
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="fullName">Full Name</label>
                                <input class="form-control" id="fullName" type="text" placeholder="Enter full name"
                                    required name="fullName" value="<?php echo htmlspecialchars($user['fullName']); ?>">
                                <div class="invalid-feedback">Please enter your valid </div>
                                <div class="valid-feedback">
                                    Looks's Good!</div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" type="text" name="email"
                                    placeholder="Enter email" required value="<?php echo htmlspecialchars($user['email']); ?>">
                                <div class="invalid-feedback">Please enter your valid </div>
                                <div class="valid-feedback">
                                    Looks's Good!</div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" id="username" type="text" placeholder="Enter username"
                                    required name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
                                <div class="invalid-feedback">Please enter your valid </div>
                                <div class="valid-feedback">
                                    Looks's Good!</div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" type="password" name="password"
                                    placeholder="Enter password">
                                <div class="invalid-feedback">Please enter your valid</div>
                                <div class="valid-feedback">
                                    Looks's Good!</div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="roleType">User Type</label>
                                <select class="form-select" id="roleType" name="roleType" required>
                                    <option value="">---- Select User Role ----</option>
                                    <option value="Manager" <?php echo $user['roleType'] == 'Manager' ? 'selected' : ''; ?>>Manager</option>
                                    <option value="Branch Manager" <?php echo $user['roleType'] == 'Branch Manager' ? 'selected' : ''; ?>>Branch Manager</option>
                                </select>
                                <div class="invalid-tooltip">Please select a valid state.</div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="btn-group">
                                    <button class="btn btn-primary me-2" type="submit" name="update-user">Update
                                        User</button>
                                    <a href="users-management" class="btn btn-outline-primary me-2">Cancel</a>
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