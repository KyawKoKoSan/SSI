<?php
require_once "core/admin_auth.php";
include_once "template/header.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $current = fetchService($id);
} else {
    linkTo('service_list.php');
}

if (!$current) {
    linkTo('service_list.php');
}
?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                <li class="breadcrumb-item"><a href="service_list.php" class="text-decoration-none ">Services</a></li>
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Update Service </li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card col-xl-8 mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-edit-2 me-2 text-primary"></i>Update Service</h4>
                    <a href="service_list.php" class="text-decoration-none"><i class="feather-list" style="font-size: 2rem"></i></a>
                </div>
                <?php


                if (isset($_POST['updateItem'])) {
                    if (serviceUpdate()) {
                        linkTo('service_list.php');
                    }
                }
                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label for="item-name" class="my-3">Enter Item Name</label>
                                <input type="text" name="name" id="item-name" value="<?php echo $current['name']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="item-price" class="my-3">Enter Price</label>
                                <input type="number" value="<?php echo $current['sale_price']; ?>" name="sale_price" id="item-price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category_id" class="my-3">Select Category</label>
                                <select class="form-select" name="category_id" id="category_id" aria-label="Default select example">
                                    <?php foreach (fetchCategories() as $c) { ?>
                                        <option value="<?php echo $c['id']; ?>" <?php echo $c['id'] == $current['category_id'] ? "selected" : "" ?>>
                                            <?php echo $c['title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="duration" class="my-3">Select Duration</label>
                                <select class="form-select" name="duration" id="duration" aria-label="Default select example">
                                    <?php foreach (fetchDuration() as $d) { ?>
                                        <option value="<?php echo $d['duration']; ?>" <?php echo $d['duration'] == $current['duration'] ? "selected" : "" ?>>
                                            <?php echo $d['duration']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group my-2">
                                <label for="formFile" class="form-label">Profile Picture</label>
                                <input class="form-control mb-3" type="file" id="formFile" name="image">
                                <img src="images/<?php echo $current['photo']; ?>" width="100px" class="rounded">
                                <input type="hidden" name="original_image" value="<?php echo $current['photo']; ?>">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div>
                                <label for="longDes" class="form-label my-3">Description</label>
                                <textarea name="description" class="form-control" style="resize: none; text-align: justify" id="longDes" rows="10" required><?php echo $current['description']; ?></textarea>
                            </div>
                            <div>
                                <label for="policy" class="form-label my-3">Policy</label>
                                <textarea name="policy" class="form-control" style="resize: none;" id="policy" rows="8"><?php echo $current['policy']; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex col-12 col-md-2">
                                <div class="form-group col-12">
                                    <input type="submit" value="Update" name="updateItem" class="col-12 btn btn-outline-primary my-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php include "template/footer.php"; ?>