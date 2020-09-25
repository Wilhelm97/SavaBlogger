<?php  // Might not need it but its still good have
require_once('./config/_conn.php');
session_start();
// if (!isset($_SESSION['username'])) {
//     header("location: signin.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/main.css" type="text/css">
    <title>SavaBlogger</title>

</head>

<body class="bg-color">
    <div id="app">

        <nav class="navbar navbar-expand-md bg-custom navbar-dark">
            <a class="navbar-brand" href="index">SavaBlogger</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbar" style="font-size: 18px;">
                <div class="navbar-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                                <a class="nav-link" href="#">link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li> -->
                    </ul>
                </div>



                <?php
                require_once('./config/_conn.php');
                if (!isset($_SESSION['useremail'])) {
                    echo ' 
                    <div class="navbar-nav" >
                          <ul class="navbar-nav">
                                 <li class="nav-item">
                                     <a class="nav-link" href="signup">Signup</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="signin">Signin</a>
                                </li>
                            </ul>
                        </div>
                        ';
                } elseif (isset($_SESSION['useremail'])) {
                    echo '
            <div class="navbar-nav" >
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="profile">Profile</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Settings
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="settings">Information</a>
                    </div>
                 </li>
                <li class="nav-item">
                    <a class="nav-link" href="signout">Signout</a>
                </li>
            </ul>
        </div>
    ';
                }
                ?>
            </div>

        </nav>
    </div>
    </br>