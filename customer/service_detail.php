<?php
include "template/header.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $current = fetchService($id);
}else{
    linkTo('our_services.php');
}

if (!$current){
    linkTo('our_services.php');
}

$currentCat = $current['category_id'];

?>

<section class="container" id="home">
    <div class="row py-5 justify-content-center align-items-end">
        <div class="col-12 mt-5 wow animate__slideInDown">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="our_services.php" class="text-decoration-none ">Products</a></li>
                    <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Item Detail </li>
                </ol>
            </nav>
        </div>
        <div class="row flex-column-reverse flex-lg-row wow animate__slideInLeft" id="about">
            <div class="col-12 col-lg-9">
                <div class="row">

                    <div class="card">
                        <div class="col-12 d-block d-lg-flex">
                            <div class="col-12 col-lg-5 mt-3">
                                <img src="../admin/images/<?php echo $current['photo'];?>" class="img-fluid card-img-top card-product-img mb-3">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-12 col-lg-5">
                                <p class="fw-bold h5 mt-5 mb-3 text-primary"><?php echo $current['name'];?></p>
                                <p class="d-block text-primary opacity-75" style="text-align: justify; line-height: 2">
                                    <i class="feather-layers me-2"></i><?php echo fetchCategory($current['category_id'])['title'];?>
                                </p>
                                <p class="d-block mb-5 text-primary opacity-75" style="text-align: justify; line-height: 2">
                                    <?php echo $current['description'];?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="fw-bold mb-3 user-select-none h3">Price :
                                        <?php if (fetchCategory($current['category_id'])['title'] == 'Promotion'){?>
                                            <span class="text-danger text-decoration-line-through me-3"><?php echo $current['original_price']."$";?></span>
                                        <?php } ?>
                                        <span class="text-success"><?php echo $current['sale_price']."$";?></span></p>
                                </div>
                                <div class="col-12 mb-5">
                                    <a href="add_to_cart.php?id=<?php echo $current['id'] ;?>" class="btn btn-outline-primary col-12">
                                        <i class="feather-shopping-cart me-2"></i>
                                        <p class= "d-inline">Add To Cart</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once "right_side_bar.php" ?>
        </div>
    </div>
    <div class="row wow animate__slideInUp slickTestIndex">
        <?php foreach (servicesByCategory($currentCat,3,$current['id']) as $i){?>
            <div class="col-12 col-md-4 mx-2">
                <div class="col-12">
                    <div class="card mb-5 product-card">
                        <a href="service_detail.php?id=<?php echo $i['id'] ;?>">
                            <img src="../admin/images/<?php echo $i['photo'];?>" class="img-fluid card-img-top card-product-img"></img>
                        </a>
                        <div class="card-body">
                            <p class="card-title fw-bold mb-2"><?php echo $i['name'];?></p>
                            <p class="card-text d-block mb-2">
                                <?php echo ($i['description']);?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="fw-bold mb-0 user-select-none"><?php echo $i['sale_price'];?>$</p>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="add_to_cart.php?id=<?php echo $i['id'] ;?>" class="btn btn-outline-primary col-12">
                                    <i class="feather-shopping-cart me-2"></i>
                                    <p class= "d-inline">
                                        Add To Cart
                                    </p>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="service_detail.php?id=<?php echo $i['id'] ;?>" class="btn btn-outline-primary col-12" >
                                    <i class="feather-info me-2"></i>
                                    <p class=" d-inline">View Details</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>

</section>

<?php include "template/footer.php";?>

