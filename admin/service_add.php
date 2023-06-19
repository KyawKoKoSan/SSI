<?php
require_once "core/admin_auth.php";
include "template/header.php";
?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Add Service </li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card col-xl-8 mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-plus-circle text-primary me-2"></i>Add Service</h4>
                    <div class="">
                        <a href="service_list.php" class="text-decoration-none btn btn-outline-secondary"><i class="feather-list"></i></a>
                        <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2"></i></a>
                    </div>

                </div>
                <?php
                if(isset($_POST['addItem'])){
                    serviceAdd();
                }
                if (isset($_GET['result'])){
                    echo alert("Successfully Added New Service!!","success");
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="item-name" class="my-3">Enter Service Name</label>
                                <input type="text" name="name" id="item-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="item-price" class="my-3">Enter Price</label>
                                <input type="number" name="original_price" id="item-price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category_id" class="my-3">Select Category</label>
                                <select class="form-select" name="category_id" id="category_id" aria-label="Default select example">
                                    <?php foreach (fetchCategories() as $c){ ?>
                                        <option value="<?php echo $c['id'];?>"><?php echo $c['title'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="my-3">
                                <label for="formFile" class="form-label">Choose Profile Picture</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>
                            <div class="form-group">
                                <label for="duration" class="my-3">Select Duration</label>
                                <select class="form-select" name="duration" id="duration" aria-label="Default select example">
                                    <option value="1 month">1 month</option>
                                    <option value="3 months">3 months</option>
                                    <option value="6 months">6 months</option>
                                    <option value="1 year">1 year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div>
                                <label for="longDes" class="form-label my-3">Description</label>
                                <textarea name="description" class="form-control" style="resize: none;" id="longDes" rows="8"></textarea>
                            </div>
                            <div>
                                <label for="policy" class="form-label my-3">Policy</label>
                                <textarea name="policy" class="form-control" style="resize: none;" id="policy" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex col-12 col-md-2">
                                <div class="form-group col-12">
                                    <input type="submit" value="Create" name="addItem" class="col-12 btn btn-outline-primary my-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php include "template/footer.php";?>
