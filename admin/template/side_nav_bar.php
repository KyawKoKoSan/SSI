<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar bg-light " style="overflow-y: scroll">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3">
        <a href="dashboard.php" class="text-decoration-none">
            <div class="d-flex align-items-center">
                <img src="../customer/customer_assets/img/logo.png" style="width: 30px; height: 30px; border-radius: 50%" alt="">
                <span class="fw-bold text-primary mb-0">ure Shield Insurance</span>
            </div>
        </a>
        <button class="btn-outline-secondary hide-sidebar d-block d-lg-none">
            <i class="feather-x" style="color: #c6c4c4; font-size: 2rem; line-height: 1"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <li class="menu-spacer"></li>
            <li class="menu-item">
                <a href="<?php echo $url ?>/index.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-home"></i>
                        <small class="fw-bold ms-2 text-uppercase">Dashboard</small>
                    </span>
                </a>
            </li>
            <?php if ($_SESSION['admin_acc']['role'] == 0) { ?>
                <li class="menu-spacer"></li>
                <li class="menu-title my-2">
                    <span>Admin Management</span>
                </li>
                <li class="menu-item my-2">
                    <a href="<?php echo $url ?>/admin_register.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                        <span>
                            <i class="feather-user-plus"></i>
                            <small class="fw-bold ms-2 text-uppercase">Create New Account</small>
                        </span>
                    </a>
                </li>
                <li class="menu-item my-2">
                    <a href="<?php echo $url ?>/admin_list.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                        <span>
                            <i class="feather-menu"></i>
                            <small class="fw-bold ms-2 text-uppercase">Admins Lists</small>
                        </span>
                        <span class="badge rounded p-2 text-black-50 shadow-sm bg-white">
                            <?php echo countTotal("admins") ?>
                        </span>
                    </a>
                </li>
            <?php } ?>


            <li class="menu-spacer"></li>
            <li class="menu-title my-2">
                <span>Customers Management</span>
            </li>
            <?php if ($_SESSION['admin_acc']['role'] == 0) { ?>
                <li class="menu-item my-2">
                    <a href="<?php echo $url ?>/order_list.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                        <span>
                            <i class="feather-layers"></i>
                            <small class="fw-bold ms-2 text-uppercase">Orders</small>
                        </span>
                        <span class="badge rounded p-2 text-black-50 shadow-sm bg-white">
                            <?php echo countTotal("orders") ?>
                        </span>
                    </a>
                </li>
            <?php } ?>

            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/customer_list.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-menu"></i>
                        <small class="fw-bold ms-2 text-uppercase">Customers Lists</small>
                    </span>
                    <span class="badge rounded p-2 text-black-50 shadow-sm bg-white">
                        <?php echo countTotal("customers") ?>
                    </span>
                </a>
            </li>
            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/complain_list.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-menu"></i>
                        <small class="fw-bold ms-2 text-uppercase">Complain Lists</small>
                    </span>
                    <span class="badge rounded p-2 text-black-50 shadow-sm bg-white">
                        <?php echo countTotal("complains") ?>
                    </span>
                </a>
            </li>

            <li class="menu-spacer"></li>
            <li class="menu-title my-2">
                <span>Category Management</span>
            </li>
            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/category_management.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-command"></i>
                        <small class="fw-bold ms-2 text-uppercase">Category Manager</small>
                    </span>
                </a>
            </li>


            <li class="menu-spacer"></li>
            <li class="menu-title my-2">
                <span>Service Management</span>
            </li>
            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/service_add.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-plus-square"></i>
                        <small class="fw-bold ms-2 text-uppercase">Add new service</small>
                    </span>
                </a>
            </li>
            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/service_list.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-list"></i>
                        <small class="fw-bold ms-2 text-uppercase">Services lists</small>
                    </span>
                    <span class="badge rounded p-2 text-black-50 shadow-sm bg-white"><?php echo countTotal("services") ?>
                    </span>
                </a>
            </li>

            <li class="menu-spacer"></li>
            <li class="menu-title my-2">
                <span>Promotions Management</span>
            </li>

            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/promotion_add.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-dollar-sign"></i>
                        <small class="fw-bold ms-2 text-uppercase">Add new promotion</small>
                    </span>
                </a>
            </li>


            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/promotion_list.php" class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-list"></i>
                        <small class="fw-bold ms-2 text-uppercase">promotion lists</small>
                    </span>
                </a>
            </li>

        </ul>
    </div>
</div>