<?php
session_start();

if(isset($_SESSION['customer'])){
    header("location:user_profile.php");
}
require_once "core/base.php";
require_once "../admin/core/functions.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  Start  Title and Logo of Original Sneakers E-commerce-->
    <link rel="icon" href="customerassets/img/logo/logo.png">
    <title>Sure Shield Insurance</title>
    <!--  End  Title and Logo of Original Sneakers E-commerce-->


    <!--  Start  Linking required external css, libraries and framework-->
    <link rel="stylesheet" href="customer_assets/css/prepare.css" />
    <link rel="stylesheet" href="../assets/vendor/feather-icons-web/feather.css" />
    <link rel="stylesheet" href="../assets/vendor/fontawesome-free-5.15.4-web/css/all.min.css" />
    <link rel="stylesheet" href="../assets/vendor/slick/slick.css">
    <link rel="stylesheet" href="../assets/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.min.css">
    <!--  end  Linking required style, libraries and framework-->

</head>
<body>

<!--Start Navigation Bar-->
<nav class="navbar navbar-expand-lg navbar-light position-fixed w-100 top-0 header">
    <div class="container">
        <a class="navbar-brand d-block d-lg-none" href="">
            <div class="d-flex align-items-end logo-container">
                <img src="customer_assets/img/logo.png" class="me-1 logo-img" style="width: 50px; height: 50px" alt="Logo" />
                <span class="fw-bold text-primary">ecure Shield Insurance</span>
            </div>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
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
                            <span class="fw-bold text-primary me-5">ecure Shield Insurance</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="our_services.php">Our Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="my_purchases.php">
                        My Purchases<i class="feather-shopping-cart ms-2"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Action</a>
                    <div class="dropdown-menu">
                        <?php if(isset($_SESSION['customer'])){ ?>
                            <a class="dropdown-item text-black" href="customer_profile.php">Profile</a>
                            <a class="dropdown-item text-black" href="customer_orders.php">Your Orders</a>
                            <a class="dropdown-item text-black" href="customer_register.php">Register Another Account</a>
                            <a class="dropdown-item text-black" href="customer_logout.php">Logout</a>
                        <?php } else{?>
                            <a class="dropdown-item text-black" href="customer_login.php">Login</a>
                            <a class="dropdown-item text-black" href="customer_register.php">Register</a>
                        <?php }?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--End Navigation Bar-->

<!--start coding for login form-->
<div class="container wow animate__bounce" id="home">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-md-9 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center text-primary text-uppercase">
                        <i class="feather-users"></i>
                        Login To Account
                    </h4>
                    <hr>
                    <?php
                    if (isset($_POST['login-btn'])){
                        echo customerLogin();
                    }
                    ?>
                    <form method="post" class="row mt-3" enctype="multipart/form-data">
                        <div class="m-2">
                            <label for="inputEmail4" class="form-label">
                                <i class="feather-mail me-2 text-danger"></i>Email
                            </label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="example@gmail.com" required>
                        </div>
                        <div class="m-2">
                            <label for="inputPass" class="form-label">
                                <i class=" me-2 feather-unlock text-primary"></i>Password
                            </label>
                            <input type="password" name="password" min="8" class="form-control" id="inputPass" required>
                        </div>
                        <div class="row col-12 mt-3" id="about">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <button type="submit"  name="login-btn" class="btn btn-outline-primary me-3">
                                    <i class="feather-log-in me-2"></i>Login
                                </button>
                                <a href="customer_register.php" class="">Register Now</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!--end coding for login form-->

<?php include "template/footer.php";?>

