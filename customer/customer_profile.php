<?php
require_once "../admin/core/customer_auth.php";
include "template/header.php";
?>


<section class="container">
    <div class="row mt-5" id="home">
        <div class="col-12 pt-5 d-block d-lg-flex">
            <div class="col-12 col-lg-3 mb-4 wow animate__slideInLeft">
                <img src="../customer/images/<?php echo $_SESSION['customer']['photo'];?>" class="img-fluid" alt="">
            </div>
            <div class="col-1"></div>
            <div class="col-12 col-lg-8 wow animate__bounceInRight" id="about">
                <table class="table table-hover" id="products-list">
                    <tr>
                        <th>Name</th>
                        <td class="text-primary fw-bold"><?php echo $_SESSION['customer']['name'];?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td class="text-primary fw-bold"><?php echo $_SESSION['customer']['email'];?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td class="text-primary fw-bold"><?php echo $_SESSION['customer']['address'];?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td class="text-primary fw-bold"><?php echo $_SESSION['customer']['phone'];?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td class="text-primary fw-bold"><?php echo $_SESSION['customer']['city'];?></td>
                    </tr>

                </table>
                <div class="col-12">
                    <div class="d-flex">
                        <div class="col-5 mb-3 me-3">
                            <a href="our_services.php" class="btn btn-outline-primary mb-2 mb-xl-0 col-12">
                                <i class="feather-shopping-cart me-3"></i>Shop Now
                            </a>
                        </div>
                        <div class="col-5">
                            <a href="customer_logout.php" class="btn btn-outline-primary mb-2 mb-xl-0 col-12 col-lg-7">
                                <i class="feather-log-out me-3"></i>Logout
                            </a>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

        </div>
</section>
<!--    end coding to show products list-->




<?php include "template/footer.php";?>