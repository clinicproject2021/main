<?php
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    
    if ($user["type"] != "1") {
        header("Location: ../");
    }
} else {
    header("Location: ../");
}
?>

<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../asset/css/style.css">
        <script src="../asset/js/script.js"></script>

    </head>

    <body>


        <div id="header">
            <div class="col-xs-12 col-md-2">
                <div class="logo">
                    <img src="../../asset/images/logo1.png" alt="">
                </div>
            </div>

            <div class="col-xs-12 col-md-10">
                <div class="menu">
                    <ul>
                        <li><a href="/">HOME</a></li>
                         <li><a href="./add-dept.php">Add New Department</a></li>
                         <li><a href="./all-doctor.php">Doctors</a></li>
                        <li><a href="./logout.php">Logout</a></li>
                    </ul>

                </div>
            </div>



        </div>


        <div class="wrapper">