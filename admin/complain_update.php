<?php
require_once "core/admin_auth.php";
include_once "template/header.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $current = fetchComplain($id);
}else{
    linkTo('complain_list.php');
}

if (!$current){
    linkTo('complain_list.php');
}
?>

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                    <li class="breadcrumb-item"><a href="admin_list.php" class="text-decoration-none ">Complains Lists</a></li>
                    <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Update Complain Status</li>
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
                            Update Complain Status
                        </h4>
                        <div class="">
                            <a href="admin_list.php" class="btn btn-outline-secondary me-2"><i class="feather-menu"></i></a>
                            <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2"></i></a>
                        </div>
                    </div>

                    <hr>
                    <?php
                    $id = $_GET['id'];
                    $current = fetchComplain($id);

                    if(isset($_POST['updateComplain'])){
                        if (complainUpdate()){
                            linkTo('complain_list.php');
                        }
                    }
                    ?>
                    <form method="post" class="row mt-3" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="category_id" class="my-3">Choose Status</label>
                            <select class="form-select" name="status" id="category_id" aria-label="Default select example" required>
                                <?php foreach ($complainStatus as $key=>$value){ ?>
                                    <option value="<?php echo $key; ?>" <?php echo $key== $current['status']?"selected":""?> ><?php echo $value;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="row justify-content-center col-12 mt-3">
                            <div class="col-8 col-md-6 col-lg-5 ">
                                <button type="submit"  name="updateComplain" class="btn btn-outline-primary col-12">
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