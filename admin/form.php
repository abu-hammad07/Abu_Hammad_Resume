<?php
session_start();
include_once 'include/database.php';

$obj = new Database();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



if (isset($_POST['submit'])) {

    $customerName = mysqli_real_escape_string($obj->getMysqli(), $_POST['customerName']);
    $customerEmail = mysqli_real_escape_string($obj->getMysqli(), $_POST['customerEmail']);
    $customerGender = mysqli_real_escape_string($obj->getMysqli(), $_POST['customerGender']);
    $customerNumber = mysqli_real_escape_string($obj->getMysqli(), $_POST['customerNumber']);
    // voucher code generation 
    $voucher = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 7);
    // createdAt
    $createdAt = new DateTime('now', new DateTimeZone('Asia/Karachi'));
    $createdAt = $createdAt->format('Y-m-d H:i:s'); // format the date and time as desired
    // expireAt
    $expireAt = new DateTime('now', new DateTimeZone('Asia/Karachi'));
    $expireAt = $expireAt->format('Y-m-d H:i:s'); // format the date and time as desired

    // $createdAt = date('d-m-Y H:i:s');
    // $expireAt = date('d-m-Y H:i:s', strtotime('+14 days'));
    // 4 otp code generation
    $otpCode = rand(1000, 9999);

    // insert data into database
    $value = [
        'cName' => $customerName,
        'cEmail' => $customerEmail,
        'cGender' => $customerGender,
        'cPhoneNumber' => $customerNumber,
        'voucherCode' => $voucher,
        'createdAt' => $createdAt,
        'expireAt' => $expireAt,
        'otpCode' => $otpCode,
        'validaty' => 'Yes',
        'percentageDiscount' => '20%',
        'isDiscountAvial' => 'Yes'
    ];

    $insert = $obj->insert('customers', $value);

    if ($insert) {

        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'doplexer.sol@gmail.com';
            $mail->Password = 'ehutyeooinkmqzuy';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('doplexer.sol@gmail.com', 'Nishat');
            $mail->addAddress($customerEmail, $customerName);
            $mail->Subject = 'Customer Voucher';
            // Include the email content from email.php
            include 'send_email.php';
            // Replace placeholders with actual values
            $emailContent = str_replace('$customerName', $customerName, $emailContent);
            $emailContent = str_replace('$voucher', $voucher, $emailContent);
            // Set the email content as HTML
            $mail->isHTML(true);
            $mail->Body = $emailContent;
            $mail->send();

            // Send email
            header('location: pincode.php?voucher=' . $voucher . '&customerNumber=' . $customerNumber);
            exit();
        } catch (Exception $e) {
            $_SESSION['error_message_user'] = "Failed to send email. Error: {$mail->ErrorInfo}";
            exit();
        }
    } else {
        $_SESSION['error_message_user'] = "Failed to insert data. Error: {$obj->getMysqli()->error}";
        exit();
    }
}


?>


<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="index-assets/img/favicon.ico" type="image/x-icon">
    <title>QR Texting Form</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="index-assets/css/form.css" />
</head>

<body>
    <section class="container">
        <div class="logo">
            <img src="index-assets/img/logo_nishat.png" alt="Nishat Logo">
        </div>
        <header>FILL IN YOUR DETAILS TO RECIEVE YOUR DISCOUNT VOUCHER!</header>
        <?php
        if (isset($_SESSION['error_message_user'])) {
            ?>
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <?php echo $_SESSION['error_message_user']; ?>
        </div>
        <?php
        unset($_SESSION['error_message_user']);
        }
        ?>
        <form action="" method="POST" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" placeholder="Enter full name" name="customerName" required />
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input type="email" placeholder="Enter email address" name="customerEmail" required />
            </div>

            <div class="input-box">
                <label>Phone Number</label>
                <input type="number" placeholder="Enter phone number" name="customerNumber" required />
            </div>
            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" value="Male" name="customerGender" checked />
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" value="Female" name="customerGender" />
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" value="Other" name="customerGender" />
                        <label for="check-other">prefer not to say</label>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>

            <p>
                Note:
                Please Provide a valid contact number and email ID receive
                your discount voucher. Every customer who completes the form will receive a discount
                voucher for their next shopping!
            </p>

        </form>
    </section>
</body>

</html>