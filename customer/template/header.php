<?php
error_reporting(0);
ini_set('display_errors', 0);
try {
    session_start();
} catch (Exception $e) {
    echo 'Error starting session: ' . $e->getMessage();
}
require_once "core/base.php";
require_once "../admin/core/functions.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="customer_assets/img/logo.png">
    <title>Sure Shield Insurance</title>
    <style>
    .full-screen-card {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 30000;
        height: 100vh;
        overflow: scroll;
    }

    .loader-container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 1000000;
    }

    .loader {
        color: #0d21a1;
        font-size: 20px;
        margin: 100px auto;
        width: 1em;
        height: 1em;
        border-radius: 50%;
        position: relative;
        text-indent: -9999em;
        -webkit-animation: load4 1.3s infinite linear;
        animation: load4 1.3s infinite linear;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
    }

    @-webkit-keyframes load4 {

        0%,
        100% {
            box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
        }

        12.5% {
            box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
        }

        25% {
            box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
        }

        37.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
        }

        50% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
        }

        62.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
        }

        75% {
            box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
        }

        87.5% {
            box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
        }
    }

    @keyframes load4 {

        0%,
        100% {
            box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
        }

        12.5% {
            box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
        }

        25% {
            box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
        }

        37.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
        }

        50% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
        }

        62.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
        }

        75% {
            box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
        }

        87.5% {
            box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
        }
    }
    </style>


    <link rel="stylesheet" href="../assets/vendor/feather-icons-web/feather.css" />
    <link rel="stylesheet" href="../assets/vendor/fontawesome-free-5.15.4-web/css/all.min.css" />
    <link rel="stylesheet" href="../assets/vendor/datatables.net-dt/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/slick/slick.css">
    <link rel="stylesheet" href="../assets/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="customer_assets/css/prepare.css" />
    <link rel="stylesheet" href="customer_assets/css/dark.css">

</head>

<body>
    <div class="loader-container ">
        <div class="loader">Loading...</div>
    </div>
    <!--Start Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light position-fixed w-100 top-0 header">
        <div class="container">
            <a class="navbar-brand d-block d-lg-none" href="">
                <div class="d-flex align-items-end logo-container">
                    <img src="customer_assets/img/logo.png" class="me-1 logo-img" style="width: 50px; height: 50px"
                        alt="Logo" />
                    <span class="fw-bold text-primary logo-text">ure Shield Insurance</span>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="feather-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mx-lg-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact Us</a>
                    </li>
                    <li class="nav-item me-lg-5 ms-lg-5 d-none d-lg-block">
                        <a class="navbar-brand pe-0 me-0" href="">
                            <div class="d-flex align-items-center logo-container">
                                <img src="customer_assets/img/logo.png" style="width: 50px; height: 50px" alt="Logo" />
                                <span class="fw-bold text-primary me-5 logo-text">ure Shield Insurance</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="our_services.php">Our Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my_cart.php">
                            My Purchases<i class="feather-shopping-cart ms-2"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-black" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Action</a>
                        <div class="dropdown-menu">
                            <?php if (isset($_SESSION['customer'])) { ?>
                            <a class="dropdown-item text-black" href="customer_profile.php">Profile</a>
                            <a class="dropdown-item text-black" href="customer_orders.php">Your Orders</a>
                            <a class="dropdown-item text-black" href="customer_register.php">Register Another
                                Account</a>
                            <a class="dropdown-item text-black" href="customer_logout.php">Logout</a>
                            <?php } else { ?>
                            <a class="dropdown-item text-black" href="customer_login.php">Login</a>
                            <a class="dropdown-item text-black" href="customer_register.php">Register</a>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--End Navigation Bar-->