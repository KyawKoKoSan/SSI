<?php
include "template/header.php";
$searchKey=$_POST['searchKey'];
if (isset($searchKey)){

    ?>


    <section class="container" id="home">
        <div class="row py-5 justify-content-center align-items-end">
            <div class="col-12 wow animate__slideInDown delay-4s">
                <div class="mt-5">
                    <div class="text-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb text-uppercase">
                                <li class="breadcrumb-item"><a href="our_services.php" class="text-decoration-none ">Products</a></li>
                                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">
                                    Search By "<?php echo $searchKey ?>"
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row flex-column-reverse flex-lg-row" id="about">
                <div class="col-12 col-lg-9 wow animate__slideInLeft">
                    <div class="row">
                        <?php
                        $result = search($searchKey);
                        if(count($result) == 0){
                            echo alert("No Result","warning");
                        } ?>
                        <?php foreach($result as $i){?>
                            <div class="col-12 col-lg-4 ">
                                <div class="card mb-5 product-card">
                                    <a href="service_detail.php?id=<?php echo $i['id'] ;?>">
                                        <img src="../admin/images/<?php echo $i['photo'];?>" class="img-fluid card-img-top card-product-img">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-title fw-bold mb-2"><?php echo $i['name'];?></p>
                                        <p class="card-text d-block mb-2">
                                            <?php echo $i['description'];?>
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
                        <?php }?>
                    </div>
                </div>
                <?php require_once "right_side_bar.php" ?>
            </div>

        </div>
    </section>

    <?php include "template/footer.php";?>


<?php }?>