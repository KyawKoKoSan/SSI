<?php
include "template/header.php";
$perpage = 6;
$stmt = "SELECT COUNT(*) FROM services";
$stmt = con()->prepare($stmt);
$stmt->execute();
$entries = $stmt->fetchColumn();
$totalPages = ceil($entries / $perpage);
$pageNow = isset($_GET['page']) ? $_GET['page'] : 1;
$x = ($pageNow - 1) * $perpage;
$y = $perpage;
$sql = "SELECT * FROM services ORDER BY id DESC LIMIT $x, $y  ";
$stmt = con()->prepare($sql);
$stmt->execute();
$services = $stmt->fetchAll();
if (isset($_POST['addToCart'])) {
    echo addToCart();
}
?>

<section class="container" id="home">
    <div class="row py-5 justify-content-center align-items-end">
        <div class="row mt-5 wow animate__slideInDown">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="our_services.php" class="text-decoration-none ">Our
                            Services</a></li>
                </ol>
            </nav>
        </div>
        <div class="row flex-column-reverse flex-lg-row mt-5" id="about">
            <div class="col-12 col-lg-9">
                <div class="row wow animate__slideInLeft">
                    <?php foreach ($services as $i) { ?>
                        <div class="col-12 col-lg-4 ">
                            <div class="card mb-5 product-card">
                                <a href=service_detail.php?id=<?php echo $i['id']; ?>">
                                    <img src="../admin/images/<?php echo $i['photo']; ?>" class="img-fluid card-img-top card-product-img">
                                </a>
                                <div class="card-body">
                                    <p class="card-title fw-bold mb-2"><?php echo $i['name']; ?></p>
                                    <p class="card-text d-block mb-2">
                                        <?php echo short($i['description'],50) ; ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="fw-bold mb-0 user-select-none"><?php echo $i['original_price']; ?>$</p>
                                    </div>
                                    <form action="" method="post">
                                        <input type="hidden" name="name" value="<?php echo $i['name']; ?>">
                                        <input type="hidden" name="sale_price" value="<?php echo $i['sale_price']; ?>">
                                        <input type="hidden" name="photo" value="<?php echo $i['photo']; ?>">
                                        <input type="hidden" name="duration" value="<?php echo $i['duration']; ?>">
                                        <input type="hidden" name="policy" value="<?php echo $i['policy']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $i['id']; ?>">
                                        <input type="hidden" name="category" value="<?php echo fetchCategory($i['category_id'])['title']; ?>">
                                        <input type="hidden" name="description" value="<?php echo $i['description']; ?>">
                                        <div class="col-12 mb-2">
                                            <button name="addToCart" class="btn btn-outline-primary col-12">
                                                <i class="feather-shopping-cart me-2"></i>
                                                <p class="d-inline">Add To Cart</p>
                                            </button>
                                        </div>
                                    </form>
                                    <div class="col-12">
                                        <a href="service_detail.php?id=<?php echo $i['id']; ?>" class="btn btn-outline-primary col-12">
                                            <i class="feather-info me-2"></i>
                                            <p class=" d-inline">View Details</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <nav aria-label="Page navigation example">

                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="our_services.php?page=<?php echo $i; ?>#about"><?php echo $i; ?></a>
                                </li>
                            <?php $i == $pageNow;
                            } ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <?php require_once "right_side_bar.php" ?>
        </div>

    </div>
</section>

<?php include "template/footer.php"; ?>