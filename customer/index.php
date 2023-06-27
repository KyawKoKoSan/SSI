<?php
include "template/header.php"; ?>

<!--start welcome img-->
<section id="home" class="container-fluid wow animate__fadeInLeft">
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="mt-5 pe-0 pt-5 pb-4 pb-xl-5 pt-xl-4">
                        <img src="customer_assets/img/welcome_img.png" class="img-fluid" alt="Sneaker Photo"
                            style="border-radius: 30px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end welcome img-->

<!--start about us-->
<section id="about" class="container-fluid mb-5 mb-md-3">
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="row justify-content-center align-items-center mt-2 py-2">
                    <div class="col-12 col-lg-5">
                        <div class="mb-2 mb-xl-4 content wow animate__slideInLeft">
                            <h1 class="text-primary fw-bold user-select-none">
                                About Us
                            </h1>
                            <h3 class="fw-bold">
                                Best Insurance Service Company <br /><span class="text-primary">Myanmar</span>
                            </h3>
                            <p class="col-12 col-lg-9">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Assumenda autem, commodi deserunt eum exercitationem fugiat
                                in labore neque non nulla officia tempora tempore ut vel
                                voluptate. Blanditiis inventore placeat quos?
                            </p>
                            <div class="wow animate__bounceIn delay-5s">
                                <a href="about_us.php" class="btn btn-outline-primary mb-3 mb-lg-0 btn_custom_interaction">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 wow animate__slideInRight">
                        <img src="customer_assets/img/about_us_img.png" class="img-fluid" style="border-radius: 30px"
                            alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end about us-->

<!--start best offers-->
<section id="carousel" class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-12 col">
                        <div class="row justify-content-center align-items-center wow animate__zoomIn  delay-5s">
                            <h1 class="text-center text-primary py-3">Get Promotion Now</h1>
                        </div>
                        <div class="slickTestIndex row wow animate__zoomIn delay-5s">
                            <?php foreach (fetchPromotions() as $i){?>
                                <div class="col-12 col-md-4 mx-2">
                                    <div class="card product-card">
                                        <img src="../admin/images/<?php echo $i['photo'];?>" class="card-img-top card-product-img img-fluid" alt="...">
                                        <div class="card-body">
                                            <h5><?php echo $i['name'] ;?></h5>
                                            <p style="text-align: justify">
                                                <?php echo $i['description'] ;?>
                                            </p>
                                            <h6><span class="text-decoration-line-through me-2  original-price-text"><?php echo $i['original_price'] ;?>$</span><span class="final-price-text"><?php echo $i['sale_price'] ;?>$</span></h6>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <a href="service_detail.php?id=<?php echo $i['id'] ;?>" class="btn btn-outline-primary col-12 col-md-6">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--end best offer-->

<?php include "template/footer.php";?>

<script>

</script>

