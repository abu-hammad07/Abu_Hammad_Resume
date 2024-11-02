<?php
session_start();
include_once 'database.php';
$obj = new Database();

// Start of users(add)[add-user, edit-user, delete-user]
if (isset($_POST['add-user'])) {
    function insertUser($postData, $createdBy)
    {
        $obj = new Database();

        // Sanitize and retrieve form data
        $fullName = mysqli_real_escape_string($obj->getMysqli(), $postData['fullName']);
        $email = mysqli_real_escape_string($obj->getMysqli(), $postData['email']);
        $username = mysqli_real_escape_string($obj->getMysqli(), $postData['username']);
        $password = mysqli_real_escape_string($obj->getMysqli(), $postData['password']);
        $roleType = mysqli_real_escape_string($obj->getMysqli(), $postData['roleType']);
        $createdDate = date('Y-m-d H:i:s');
        // password hashing
        $password = password_hash($password, PASSWORD_BCRYPT);

        // check unique username
        $obj->select('users', 'uID', null, "username = '{$username}'");
        $result = $obj->getResult();
        if (count($result) > 0) {
            $_SESSION['submit_error'] = 'Username already exists, Please choose a different username ($username).';
            header('Location: ../user-add.php');
            exit();
        }

        // Insert user data
        $usersValue = [
            "fullName" => $fullName,
            "email" => $email,
            "username" => $username,
            "password" => $password,
            "roleType" => $roleType,
            "status" => 'Active',
            "createdBy" => $createdBy,
            "createdDate" => $createdDate
        ];

        if ($obj->insert('users', $usersValue)) {
            return true;
        } else {
            return false;
        }
    }

    // Main Execution
    $createdBy = 'admin';

    // get fullName
    $fullName = $_POST['fullName'];

    if (insertUser($_POST, $createdBy)) {
        $_SESSION['submit_success'] = " New user added Successfully '{$fullName}'";
        header('location: ../user-add.php');
        exit();
    } else {
        $_SESSION['submit_error'] = " Failed to add custom access for '{$fullName}'";
        header('location: ../user-add.php');
        exit();
    }
}

// Start of users(edit)[add-user, edit-user, delete-user]
if (isset($_POST['update-user'])) {
    function insertUser($postData, $createdBy)
    {
        $obj = new Database();

        // Sanitize and retrieve form data
        $uID = mysqli_real_escape_string($obj->getMysqli(), $postData['uID']);
        $fullName = mysqli_real_escape_string($obj->getMysqli(), $postData['fullName']);
        $email = mysqli_real_escape_string($obj->getMysqli(), $postData['email']);
        $username = mysqli_real_escape_string($obj->getMysqli(), $postData['username']);
        $password = mysqli_real_escape_string($obj->getMysqli(), $postData['password']);
        $roleType = mysqli_real_escape_string($obj->getMysqli(), $postData['roleType']);
        $createdDate = date('Y-m-d H:i:s');
        // password hashing
        $password = password_hash($password, PASSWORD_BCRYPT);

        // check if password is empty
        if (empty($password)) {
            $usersValue = [
                "fullName" => $fullName,
                "email" => $email,
                "username" => $username,
                "roleType" => $roleType,
                "createdBy" => $createdBy,
                "createdDate" => $createdDate
            ];

            if ($obj->update('users', $usersValue, "uID = '{$uID}'")) {
                return true;
            } else {
                return false;
            }
        }

        // Insert user data
        $usersValue = [
            "fullName" => $fullName,
            "email" => $email,
            "username" => $username,
            "password" => $password,
            "roleType" => $roleType,
            "createdBy" => $createdBy,
            "createdDate" => $createdDate
        ];

        if ($obj->update('users', $usersValue, "uID = '{$uID}'")) {
            return true;
        } else {
            return false;
        }
    }

    // Main Execution
    $createdBy = 'admin';
    $uID = insertUser($_POST, $createdBy);

    // get fullName
    $fullName = $_POST['fullName'];

    if (insertUser($_POST, $createdBy)) {
        $_SESSION['uID_success'] = " user Updated Successfully '{$fullName}'";
        header('location: ../users-management.php');
        exit();
    } else {
        $_SESSION['uID_error'] = " Failed to add custom access for '{$fullName}'";
        header('location: ../users-management.php');
        exit();
    }
}

// Start of users(delete)[add-user, edit-user, delete-user]
if (isset($_GET['deleteID'])) {
    $uID = mysqli_real_escape_string($obj->getMysqli(), $_GET['deleteID']);
    $obj->delete('users', "uID = '{$uID}'");
    $_SESSION['uID_success'] = 'User deleted successfully';
    header('Location: ../users-management.php');
    exit();
}
// End of users(add, edit, delete)


// start update Profile
if (isset($_POST['updateProfile'])) {
    $uID = mysqli_real_escape_string($obj->getMysqli(), $_POST['uID']);
    $fullName = mysqli_real_escape_string($obj->getMysqli(), $_POST['fullName']);
    $email = mysqli_real_escape_string($obj->getMysqli(), $_POST['email']);
    $username = mysqli_real_escape_string($obj->getMysqli(), $_POST['username']);
    $password = mysqli_real_escape_string($obj->getMysqli(), $_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);

    // username already exists
    $obj->select('users', '*', null, "username = '{$username}' AND uID != '{$uID}'");
    $result = $obj->getResult();
    if (count($result) > 0) {
        $_SESSION['profile_error'] = 'Username already exists';
        header('Location: ../profile.php');
        exit();
    }

    // email already exists
    $obj->select('users', '*', null, "email = '{$email}' AND uID != '{$uID}'");
    $result = $obj->getResult();
    if (count($result) > 0) {
        $_SESSION['profile_error'] = 'Email already exists';
        header('Location: ../profile.php');
        exit();
    }

    // check if password is empty
    if (empty($password)) {
        $usersValue = [
            "fullName" => $fullName,
            "email" => $email,
            "username" => $username
        ];
        $obj->update('users', $usersValue, "uID = '{$uID}'");
        $_SESSION['profile_success'] = 'Profile updated successfully';
        header('Location: ../profile.php');
        exit();
    }

    $obj->update('users', [
        "fullName" => $fullName,
        "email" => $email,
        "username" => $username,
        "password" => $password
    ], "uID = '{$uID}'");
    $_SESSION['profile_success'] = 'Profile updated successfully';
    header('Location: ../profile.php');
    exit();
}
// End update Profile














