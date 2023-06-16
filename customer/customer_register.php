<?php
include "template/header.php";
?>

<section class="container" id="home">
    <div class="row mt-5">
        <div class="col-12 col-md-9 mx-auto pt-5">
            <div class="card wow animate__slideInDown">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-center text-primary text-uppercase">
                            <i class="feather-user-plus"></i>
                            Register Account
                        </h4>
                        <div class="">
                            <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <?php
                    if (isset($_POST['reg-btn'])){
                        echo customerRegister();
                    }
                    if (isset($_GET['result'])){
                        echo alert("Successfully Created New Account!!","success");
                    }
                    if (isset($_GET['already_exist'])){
                        echo alert("Email already exist!","warning");
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
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputPhone" class="form-label">Phone Number</label>
                            <input type="number" name="phone" class="form-control" id="inputPhone" placeholder="+95989072612" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="inputCity" placeholder="Yangon" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="formFile" class="form-label">Choose Profile Picture</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputPass" class="form-label">
                                <i class=" me-2 fas fa-key text-primary"></i>Password
                            </label>
                            <input type="password" name="password" min="8" class="form-control" id="inputPass" required>
                            <input type="hidden" id="about">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputCPass" class="form-label">
                                <i class=" me-2 fas fa-key text-primary"></i>Confirm Password
                            </label>
                            <input type="password" name="cPassword" min="8" class="form-control" id="inputCPass" required>
                        </div>


                        <div class="row justify-content-center col-12 mt-3">
                            <div class="col-8 col-md-6 col-lg-5 ">
                                <button type="submit"  name="reg-btn" class="btn btn-outline-primary col-12">
                                    <i class="feather-user-plus me-2"></i>Sign Up
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include "template/footer.php";?>

