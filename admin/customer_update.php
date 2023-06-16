<?php include "template/header.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $current = fetchCustomer($id);
}else{
    linkTo('customer_list.php');
}

if (!$current){
    linkTo('customer_list.php');
}

?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                <li class="breadcrumb-item"><a href="customer_list.php" class="text-decoration-none ">Customers Lists</a></li>
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Update Customer Account</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-9 col-lg-7 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="text-primary text-uppercase">
                        <i class="feather-user"></i>
                        Update Account's Information
                    </h4>
                    <div class="">
                        <a href="customers_list.php" class="btn btn-outline-secondary me-2"><i class="feather-menu"></i></a>
                        <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2"></i></a>
                    </div>
                </div>

                <hr>
                <?php
                $id = $_GET['id'];
                $current = fetchCustomer($id);

                if(isset($_POST['updateCustomer'])){
                    if (customerUpdate()){
                        linkTo('customer_list.php');
                    }
                }
                ?>
                <form method="post" class="row mt-3" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col-md-6 mt-2">
                        <label for="inputName" class="form-label">
                            <i class="feather-user me-2 text-primary"></i>Name
                        </label>
                        <input name="name" type="text" class="form-control" value="<?php echo $current['name']; ?>" id="inputName" placeholder="Eg:John" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputEmail4" class="form-label">
                            <i class="feather-mail me-2 text-danger"></i>Email
                        </label>
                        <input type="email" value="<?php echo $current['email']; ?>" name="email" class="form-control" id="inputEmail4" placeholder="example@gmail.com" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" value="<?php echo $current['address']; ?>" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputPhone" class="form-label">Phone Number</label>
                        <input type="number" value="<?php echo $current['phone']; ?>" name="phone" class="form-control" id="inputPhone" placeholder="+95989072612" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" value="<?php echo $current['city']; ?>" name="city" class="form-control" id="inputCity" placeholder="Yangon" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputPass" class="form-label">
                            <i class=" me-2 fas fa-key text-primary"></i>Password
                        </label>
                        <input type="password" name="password" min="8" placeholder="Enter new password"  class="form-control" id="inputPass">
                    </div>
                    <div class="my-3">
                        <label for="formFile" class="form-label">Profile Picture</label>
                        <input class="form-control mb-3" type="file" id="formFile" name="image">
                        <img src="images/<?php echo $current['photo']; ?>" width="100px" class="rounded">
                        <input type="hidden" name="original_image" value="<?php echo $current['photo']; ?>">
                        <input type="hidden" name="original_password" value="<?php echo $current['password']; ?>">
                    </div>
                    <div class="row justify-content-center col-12 mt-3">
                        <div class="col-8 col-md-6 col-lg-5 ">
                            <button type="submit"  name="updateCustomer" class="btn btn-outline-primary col-12">
                                <i class="feather-edit-2 me-2"></i>Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "template/footer.php";?>
