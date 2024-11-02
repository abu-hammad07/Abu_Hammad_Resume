<?php
session_start();
include_once 'include/database.php';

$obj = new Database();

// if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || $_SESSION['roleType'] !== 'Branch Manager' && $_SESSION['roleType'] !== 'Manager') {
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
        if (isset(($_SESSION['profile_success']))) {
            echo '
                <div class="alert alert-light-success light alert-dismissible fade show txt-success border-left-success mb-4"
                    role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-check-square">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <p>' . $_SESSION['profile_success'] . '</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['profile_success']);
        }
        if (isset($_SESSION['profile_error'])) {
            echo '
                    <div class="alert alert-light-dark light alert-dismissible fade show txt-dark border-left-dark" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-help-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        <p>' . $_SESSION['profile_error'] . '</p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            unset($_SESSION['profile_error']);
        }
        ?>
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">My Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        $uID = $_SESSION['uID'];
                        // $obj->select('users', '*', 'uID = ?', [$uID]);
                        // $row = $obj->getResult()[0];
                        $sql = "SELECT uID, fullName, username, email, branchLocator, roleType FROM `users` WHERE `uID` = '$uID'";
                        $result = mysqli_query($obj->getMysqli(), $sql);
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['profileFullName'] = $row['fullName'];
                        $_SESSION['profileRoleType'] = $row['roleType'];
                        ?>
                        <form action="include/admin-data.php" method="post">
                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-1"><?= $row['fullName']; ?></h4>
                                            <p><?= $row['roleType']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="text" hidden name="uID" value="<?= $row['uID']; ?>">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input class="form-control" type="text" placeholder="Enter your name" name="fullName"
                                    value="<?= $row['fullName']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input class="form-control" type="text" readonly placeholder="Enter your username"
                                    name="username" value="<?= $row['username']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" readonly placeholder="your-email@gmail.com"
                                    name="email" value="<?= $row['email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" name="password"
                                    placeholder="Enter your password">
                            </div>
                            <div class="form-footer">
                                <button class="btn btn-primary btn-block" type="submit"
                                    name="updateProfile">Update</button>
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