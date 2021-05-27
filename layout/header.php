<?php
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    if($user["type"] == "1"){
        header("Location: /admin");    
    }else if($user["type"] == "3"){
        header("Location: /user");    
    }

    
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
                    <img src="./asset/images/logo1.png" alt="">
                </div>
            </div>

            <div class="col-xs-12 col-md-10">
                <div class="menu">
                    <ul>
                        <li><a href="/">HOME</a></li>
                        <li><a href="../about-us.php">About US</a></li>
                        <li><a href="../department.php">DEPARTMENTS</a></li>
                        <li><a href="../doctors.php">DOCTORS</a></li>
                        <li><a href="../contact-us.php">CONTACT</a></li>
                        
                        <li><nav class="navbar navbar-light bg-light">
                         <form class="form-inline">
                         <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                         </form>
                         </nav></li>
                         
                    </ul>

                </div>
            </div>

        </div>
        <div class="wrapper">