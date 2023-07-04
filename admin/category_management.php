<?php require_once "core/admin_auth.php" ?>
<?php include "template/header.php";?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Category Manager</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card col-xl-8 mb-4">
            <div class="card-body shadow" style="overflow-x: scroll">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0"><i class="feather-layers text-primary me-2"></i>Category Manager</h4>
                    <div class="">
                        <a href="#" class="btn btn-outline-secondary full-screen-btn"><i
                                class="feather-maximize-2"></i></a>
                    </div>
                </div>

                <?php
                if(isset($_POST['addCategory'])){
                    categoryAdd();
                }
                if (isset($_GET['result'])){
                    echo alert("Successfully Created New Account!!","success");
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-10">
                            <div class="form-group mb-3">
                                <label for="item-category" class="my-3">Enter Category</label>
                                <div class="col-12 d-block d-lg-flex justify-content-lg-between">
                                    <div class="col-12 col-lg-6 me-3 mb-2">
                                        <input type="text" name="title" id="item-category" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <button class="btn btn-outline-primary" name="addCategory">Add Category</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <?php include 'category_list.php' ?>
            </div>
        </div>
    </div>
</div>


<?php include "template/footer.php";?>