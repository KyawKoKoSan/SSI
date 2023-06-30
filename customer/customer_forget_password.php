<?php
session_start();

if(isset($_SESSION['customer'])){
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
                    if (isset($_POST['recover-btn'])){
                        echo customerRecover();
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
                            <label for="securityQuestion" class="my-1">Select Security Question</label>
                            <select class="form-select" name="securityQuestion" id="duration" aria-label="Default select example">
                                <option value="Your First Pet Name">Your First Pet Name</option>
                                <option value="Your Home Town">Your Home Town</option>
                                <option value="Your Favorite Teacher">Your Favorite Teacher</option>
                            </select>
                        </div>
                        <div class="m-2">
                            <label for="inputSecAns" class="form-label">Security Answer</label>
                            <input type="text" name="inputSecAns" class="form-control" id="inputSecAns" required>
                        </div>
                        <div class="row col-12 mt-3" id="about">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <button type="submit"  name="recover-btn" class="btn btn-outline-primary me-3">
                                    <i class="feather-log-in me-2"></i>Login
                                </button>
                                <a href="customer_register.php" class="">Register Now</a>
                            </div>
                        </div>
                        <a href="customer_login.php" class="m-2">Login Now</a>


                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!--end coding for login form-->

<?php include "template/footer.php";?>

