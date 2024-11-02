<?php
session_start();
include_once 'database.php';
$obj = new Database();

// Start of users(add)[add-user, edit-user, delete-user]
if (isset($_POST['contactForm'])) {
    function insertContact($postData, $createdAt)
    {
        $obj = new Database();

        // Sanitize and retrieve form data
        $fullName = mysqli_real_escape_string($obj->getMysqli(), $postData['fullname']);
        $email = mysqli_real_escape_string($obj->getMysqli(), $postData['email']);
        $messages = mysqli_real_escape_string($obj->getMysqli(), $postData['message']);


        // $createdDate = date('Y-m-d H:i:s');


        // Insert user data
        $usersValue = [
            "fullName" => $fullName,
            "email" => $email,
            "messages" => $messages,
            "createdAt" => $createdAt
        ];

        if ($obj->insert('contactUS', $usersValue)) {
            return true;
        } else {
            return false;
        }
    }

    // Main Execution
    $createdAt = new DateTime('now', new DateTimeZone('Asia/Karachi'));
    $createdAt = $createdAt->format('Y-m-d H:i:s'); // format the date and time as desired

    if (insertContact($_POST, $createdAt)) {
        $_SESSION['success_msg'] = "Message sent";
        header('location: ../index.php');
        exit();
    } else {
        $_SESSION['error_msg'] = "Message not sent";
        header('location: ../index.php');
        exit();
    }
}















