<?php
session_start();
include_once "include/database.php";

$obj = new Database();

if (isset($_POST['login'])) {
    // Escape user inputs to prevent SQL injection
    $username = mysqli_real_escape_string($obj->getMysqli(), $_POST['username']);
    $password = mysqli_real_escape_string($obj->getMysqli(), $_POST['password']);

    // SQL query to select user with provided username and active status
    $obj->select('users', '*', null, "username = '$username' AND status = 'Active'");
    $result = $obj->getResult();

    if (count($result) > 0) {

        // Fetch user data
        $row = $result[0];
        // Retrieve hashed password from database
        $db_pass = $row['password'];

        // Verify entered password with hashed password
        $pass_decode = password_verify($password, $db_pass);

        // If passwords match
        if ($pass_decode) {
            // Store user data in session variables
            $_SESSION['fullName'] = $row['fullName'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['uID'] = $row['uID'];
            $_SESSION['roleType'] = $row['roleType'];
            $_SESSION['status'] = $row['status'];

            // If remember me is checked, set cookies
            if (isset($_POST['rememberme'])) {
                setcookie('usernamecookie', $username, time() + 86400);
                setcookie('passwordcookie', $password, time() + 86400);
            }

            // Redirect based on user role
            if($_SESSION['roleType'] === 'Manager'){
                header('location: customers.php');
                $_SESSION['login'] = true;
                exit(); // Terminate script execution after redirection
            }else if($_SESSION['roleType'] === 'Branch Manager'){
                header('location: overview.php');
                $_SESSION['login'] = true;
                exit(); // Terminate script execution after redirection
            }
        } else {
            // Incorrect password
            $_SESSION['incorrect'] = "Incorrect Password";
        }
    } else {
        // Incorrect email/username or account not active
        $_SESSION['incorrect'] = "Incorrect Username or Account Not Active";
    }
}




?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nishat">
    <meta name="keywords" content="Admin Dashboard Nishat">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="./assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <title>Login</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link id="color" rel="stylesheet" href="./assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/responsive.css">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div class="login-main">
                            <div>
                                <a class="logo" href="index.php">
                                    <img class="img-fluid" src="./assets/images/logo/logo-nishat.png" alt="Logo Nishat">
                                </a>
                            </div>
                            <form class="theme-form" action="" method="POST">
                                <h4>Login Account</h4>
                                <p>Enter your username & password to login</p>
                                <?php
                                if (isset($_SESSION['incorrect'])) {
                                    echo '<div class="alert alert-light-danger" role="alert">
                                            <p class="txt-danger alert-link mb-0 text-center">' . $_SESSION['incorrect'] . '</p>
                                        </div>';
                                    unset($_SESSION['incorrect']);
                                }
                                ?>
                                <div class="form-group">
                                    <label class="col-form-label">Username</label>
                                    <input class="form-control" type="text" name="username" required=""
                                        placeholder="your username" value="<?php if (isset($_COOKIE['usernamecookie'])) {
                                            echo $_COOKIE['usernamecookie'];
                                        } ?>">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control password" type="password" name="password" required=""
                                            placeholder="*********" value="<?php if (isset($_COOKIE['passwordcookie'])) {
                                                echo $_COOKIE['passwordcookie'];
                                            } ?>">
                                        <div class="show-hide" onclick="togglePassword()">show</div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="rememberme" type="checkbox" name="rememberme">
                                        <label class="text-muted" for="rememberme">Remember password</label>
                                    </div>
                                    <!-- <a class="link" href="forget-password">Forgot password?</a> -->
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit"
                                            name="login">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function togglePassword() {
                var passwordField = document.querySelector('.password');
                var showHideText = document.querySelector('.show-hide');

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    showHideText.textContent = "hide";
                } else {
                    passwordField.type = "password";
                    showHideText.textContent = "show";
                }
            }
        </script>
        <!-- latest jquery-->
        <script src="./assets/js/jquery.min.js"></script>
        <!-- Bootstrap js-->
        <script src="./assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="./assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="./assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="./assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- calendar js-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="./assets/js/script.js"></script>
        <script src="./assets/js/script1.js"></script>
        <!-- Plugin used-->
    </div>
</body>

</html>