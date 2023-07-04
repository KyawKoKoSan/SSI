<?php
require_once "core/base.php";
require_once "core/functions.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link rel="icon" href="">-->
    <link rel="icon" href="../customer/customer_assets/img/logo.png">
    <title>Admin Dashboard</title>

    <!--  Start  Linking CSS Files, bootstrap, animate.style,feather icon and font awesome-->
    <link rel="stylesheet" href="../assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendor/datatables.net-dt/bootstrap.min.css">
    <link rel="stylesheet" href="admin_assets/css/admin.css">
    <link rel="stylesheet" href="admin_assets/css/admin_style.css">
    <!--  End  Linking CSS Files, bootstrap, animate.style,feather icon and font awesome-->
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
    </style>
</head>

<body>


    <section class="main container-fluid">
        <div class="row">
            <!--        start side nav bar-->
            <?php include_once("side_nav_bar.php"); ?>
            <!--        end side nav bar-->


            <!--        start main container-->
            <div class="col-12 col-lg-9 col-xl-10 vh-100 p-0 pb-lg-3 ps-lg-3 pe-lg-3"
                style="box-shadow: 0 0 0.5rem rgba(0,0,0,.095) inset;overflow-y: scroll;">
                <div class="row mb-4 position-sticky" style="top: 0.2rem; z-index: 2000;">
                    <div class="col-12">
                        <div class="p-2 d-flex justify-content-between align-items-center justify-content-lg-end bg-primary"
                            style="margin-top: -3px">
                            <button class="btn-outline-primary show-sidebar d-block d-lg-none">
                                <i class="feather-menu text-white" style="font-size: 2rem;"></i>
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="me-3" src="images/<?php echo $_SESSION['admin_acc']['photo']?>"
                                        style="width: 30px; height: 30px; border-radius: 50%" alt="profile picture">
                                    <span class="text-dark"><?php echo $_SESSION['admin_acc']['name'];?></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="customer_list.php">See Customers List</a></li>
                                    <li><a class="dropdown-item" href="complain_list.php">See Complains</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="dropdown-item text-danger" href="admin_logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!--        end main container-->