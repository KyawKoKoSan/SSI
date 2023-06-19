<?php
require_once "core/admin_auth.php";
include_once "template/header.php"; ?>

    <div class="row mt-3">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('category_management.php')">
                <!--                        start container for total employees-->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3"><i class="feather-layers h3 text-primary"></i></div>
                        <div class="col-9">
                            <p class="mb-1 h5 fw-bolder">
                            <span class="counter user-select-none text-black">
                            </span>
                            </p>
                            <p class="mb-0 text-black-50 user-select-none">Total Category</p>
                        </div>
                    </div>
                </div>
                <!--                        end container for total employees-->
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('customers_list.php')">
                <!--                        start container for customer list-->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="feather-users h3 text-primary"></i>
                        </div>
                        <div class="col-9">
                            <p class="mb-1 h5 fw-bolder">
                            <span class="counter user-select-none text-black">
                            </span>
                            </p>
                            <p class="mb-0 text-black-50 user-select-none">Total Visitors</p>
                        </div>
                    </div>
                </div>
                <!--                        end container for customer list-->
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('item_list.php')">
                <!--                        start container for products list-->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="feather-box h3 text-primary"></i>
                        </div>
                        <div class="col-9">
                            <p class="mb-1 h5 fw-bolder">
                            <span class="counter user-select-none text-black">
                            </span>
                            </p>
                            <p class="mb-0 text-black-50 user-select-none">Items</p>
                        </div>
                    </div>
                </div>
                <!--                        end container for products list-->
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('order_list.php')">
                <!--                        start container for supported location-->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="feather-check-square h3 text-primary"></i>
                        </div>
                        <div class="col-9">
                            <p class="mb-1 h5 fw-bolder">
                            <span class="counter user-select-none text-black">
                            </span>
                            </p>
                            <p class="mb-0 text-black-50 user-select-none">Total Orders</p>
                        </div>
                    </div>
                </div>
                <!--                        end container for supported location-->

            </div>
        </div>
    </div>



<?php include "template/footer.php"; ?>