<?php
include "template/header.php";
if (isset($_GET['category_id'])){
    $id = $_GET['category_id'];
    $current = fetchCategory($id);
    $perpage = 6;
    $stmt = "SELECT COUNT(*) FROM services WHERE category_id=$id";
    $stmt = con() -> prepare($stmt);
    $stmt->execute();
    $entries = $stmt->fetchColumn();
    $totalPages= ceil($entries/$perpage);
    $pageNow=isset($_GET['page'])?$_GET['page']:1;
    $x = ($pageNow-1)*$perpage;
    $y=$perpage;
    $sql = "SELECT * FROM services  WHERE category_id=$id ORDER BY id DESC LIMIT $x, $y  ";
    $stmt = con() -> prepare($sql);
    $stmt->execute();
    $services = $stmt->fetchAll();
}else{
    linkTo('our_services.php');
}
if (!$current){
    linkTo('our_services.php');
}

?>


<section class="container" id="home">
    <div class="row py-5 justify-content-center align-items-end">
        <div class="col-12 wow animate__slideInDown delay-4s">
            <div class="mb-5 mt-5">
                <div class="text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="our_services.php" class="text-decoration-none ">Products</a></li>
                            <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page"><?php echo fetchCategory($_GET['category_id'])['title'];?> </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row flex-column-reverse flex-lg-row" id="about">
            <div class="col-12 col-lg-9 wow animate__slideInLeft">
                <div class="row">
                    <?php foreach ($services as $i){?>
                        <div class="col-12 col-lg-4 ">
                            <div class="card mb-5 product-card">
                                <a href="service_detail.php?id=<?php echo $i['id'] ;?>">
                                    <img src="../admin/images/<?php echo $i['photo'];?>" class="img-fluid card-img-top card-product-img"></img>
                                </a>
                                <div class="card-body">
                                    <p class="card-title fw-bold mb-2"><?php echo $i['name']?></p>
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
                <nav aria-label="Page navigation example">

                    <ul class="pagination">
                        <?php for ($i=1; $i<=$totalPages; $i++) { ?>
                            <li class="page-item">
                                <a class="page-link" href="services_by_category.php?category_id=<?php echo $id ?>&page=<?php echo $i;?>#about"><?php echo $i;?></a>
                            </li>
                            <?php $i==$pageNow; } ?>
                    </ul>
                </nav>
            </div>
            <?php require_once "right_side_bar.php" ?>
        </div>

    </div>
</section>

<?php include "template/footer.php";?>

