<?php
require_once "core/admin_auth.php";
include_once "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Create New Account</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-9 col-lg-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="text-center text-primary text-uppercase">
                        <i class="feather-user-plus"></i>
                        Register Account
                    </h4>
                    <div class="">
                        <a href="admin_list.php" class="btn btn-outline-secondary me-2"><i class="feather-menu"></i></a>
                        <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2"></i></a>
                    </div>
                </div>

                <hr>
                <?php
                if (isset($_POST['reg-btn'])) {
                    echo adminRegister();
                }
                if (isset($_GET['result'])) {
                    echo alert("Successfully Created New Account!!", "success");
                }
                if (isset($_GET['already_exist'])) {
                    echo alert("Account Exist", "warning");
                }
                ?>
                <form method="post" class="row" enctype="multipart/form-data">
                    <div class="col-md-6 mt-2">
                        <label for="inputName" class="form-label">
                            <i class="feather-user me-2 text-primary"></i>Name
                        </label>
                        <input name="name" type="text" class="form-control" id="inputName" placeholder="Eg:John" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputEmail4" class="form-label">
                            <i class="feather-mail me-2 text-primary"></i>Email
                        </label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="example@gmail.com" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputPass" class="form-label">
                            <i class=" me-2 fas fa-key text-primary"></i>Password
                        </label>
                        <input type="password" name="password" min="8" class="form-control" id="inputPass" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputCPass" class="form-label">
                            <i class=" me-2 fas fa-key text-primary"></i>Confirm Password
                        </label>
                        <input type="password" name="confirmPassword" min="8" class="form-control" id="inputCPass" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="phone" class="form-label">
                            <i class=" me-2 feather-phone text-primary"></i>Phone
                        </label>
                        <input type="number" name="phone" min="8" class="form-control" id="phone" required>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="category_id">Choose Admin Level</label>
                            <select class="form-select" name="role" id="category_id" aria-label="Default select example">
                                <option value="0">Admin</option>
                                <option value="1">Editor</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-3">
                        <label for="formFile" class="form-label">Choose Profile Picture</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                    <div class="row justify-content-center col-12 mt-3">
                        <div class="col-8 col-md-6 col-lg-5 ">
                            <button type="submit" name="reg-btn" class="btn btn-outline-primary col-12">
                                <i class="feather-user-plus me-2"></i>Sign Up
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "template/footer.php"; ?>