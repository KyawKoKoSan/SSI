<?php
session_start();
require_once "core/base.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="customer_assets/img/logo.png">
  <title>Secure Shield Insurance</title>
  <link rel="stylesheet" href="customer_assets/css/prepare.css" />
  <link rel="stylesheet" href="../assets/vendor/feather-icons-web/feather.css" />
  <link rel="stylesheet" href="../assets/vendor/fontawesome-free-5.15.4-web/css/all.min.css" />
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
              <a class="dropdown-item text-black" href="">Profile</a>
              <a class="dropdown-item text-black" href="">Register Another Account</a>
              <a class="dropdown-item text-black" href="">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--End Navigation Bar-->