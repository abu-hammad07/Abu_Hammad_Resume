<?php
session_start();
include_once "includes/database.php";

$obj = new Database();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abu Hammad Portfolio</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/images/favicon-my.png" type="image/x-icon">

    <!-- custom css link -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

    <!-- #MAIN -->
    <main>

        <!-- #SIDEBAR -->
        <?php include_once "includes/sidebar.php" ?>

        <!-- #main-content -->
        <div class="main-content">
            

            <!-- #NAVBAR -->
            <?php include_once "includes/navbar.php" ?>

            <!-- #ABOUT -->
            <?php include_once "about.php" ?>

            <!-- #RESUME -->
            <?php include_once "resume.php" ?>


            <!-- #PORTFOLIO -->
            <?php include_once "portfolio.php" ?>


            <!-- #BLOG -->
            <?php include_once "blog.php" ?>


            <!-- #CONTACT -->
            <?php include_once "contact.php" ?>

        </div>

    </main>



    <!-- custom js link -->
    <script src="./assets/js/script.js"></script>

    <!-- ionicon link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>