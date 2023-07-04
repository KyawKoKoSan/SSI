<?php
session_start();
if (isset($_SESSION['customer'])) {
    header("location:customer_profile.php");
}
include_once "template/header.php";

?>



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
                    if (isset($_POST['login-btn'])) {
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
                                <button type="submit" name="login-btn" class="btn btn-outline-primary me-3">
                                    <i class="feather-log-in me-2"></i>Login
                                </button>
                                <a href="customer_register.php" class="">Register Now</a>
                            </div>
                        </div>
                        <a href="customer_forget_password.php" class="m-2">Forget Password</a>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!--end coding for login form-->

<?php include "template/footer.php"; ?>