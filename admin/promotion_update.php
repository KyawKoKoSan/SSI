<?php
require_once "core/admin_auth.php";
include "template/header.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $current = fetchService($id);
}else{
    linkTo('promotion_list.php');
}

if (!$current){
    linkTo('promotion_list.php');
}
if ($current['category_id']!==getPromoId()){
    linkTo('promotion_list.php');
}
?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                <li class="breadcrumb-item"><a href="promotion_list.php" class="text-decoration-none ">Promotions</a></li>
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Update Promotion Service </li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card col-xl-8 mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-edit-2 me-2 text-primary"></i>Update Promotion Service</h4>
                    <a href="promotion_list.php" class="text-decoration-none"><i class="feather-list" style="font-size: 2rem"></i></a>
                </div>
                <?php
                $id = $_GET['id'];
                $current = fetchService($id);

                if(isset($_POST['updatePromotion'])){
                    if (promotionUpdate()){
                        linkTo('promotion_list.php');
                    }
                }
                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label for="service-name" class="my-3">Service Name</label>
                                <input type="text" name="name" id="service-name" value="<?php echo $current['name']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="item-original-price" class="my-3">Original Price</label>
                                <input type="number" name="original_price" value="<?php echo $current['original_price']; ?>" id="item-original-price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="item-sale-price" class="my-3">Sale Price</label>
                                <input type="number" value="<?php echo $current['sale_price']; ?>" name="sale_price" id="item-sale-price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="duration" class="my-3">Select Duration</label>
                                <select class="form-select" name="duration" id="duration" aria-label="Default select example">
                                    <?php foreach (fetchDuration() as $d){ ?>
                                        <option value="<?php echo $d['duration']; ?>" <?php echo $d['duration']== $current['duration']?"selected":""?> ><?php echo $d['duration'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="my-3">
                                <label for="formFile" class="form-label">Profile Picture</label>
                                <input class="form-control mb-3" type="file" id="formFile" name="image">
                                <img src="images/<?php echo $current['photo']; ?>" width="100px" class="rounded">
                                <input type="hidden" name="original_image" value="<?php echo $current['photo']; ?>">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div>
                                <label for="longDes" class="form-label my-3">Description</label>
                                <textarea name="description"  class="form-control" style="resize: none; text-align: justify" id="longDes" rows="10" required><?php echo $current['description']; ?></textarea>
                            </div>
                            <div>
                                <label for="policy" class="form-label my-3">Policy</label>
                                <textarea name="policy" class="form-control" style="resize: none;" id="policy" rows="8"><?php echo $current['policy']; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="col-12 d-md-flex">
                            <div class="col-12 col-md-6 me-2 mb-2">
                                <label for="start-date" class="my-3">Start Date</label>
                                <input type="date" name="start_date"  value="<?php echo $current['start_date']; ?>" id="start-date" class="form-control">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="end-date" class="my-3">Select End Date</label>
                                <input type="date" value="<?php echo $current['end_date']; ?>" name="end_date" id="end-date" class="form-control">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mt-4 d-flex col-12 col-md-2">
                                <div class="form-group col-12">
                                    <input type="submit" value="Update" name="updatePromotion" class="col-12 btn btn-outline-primary my-3">
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
