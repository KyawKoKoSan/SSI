<div class="col-12 col-lg-3 wow animate__bounceInRight delay-5s">
    <div class="sticky-for-promo">
        <div class="col-12">
            <form class="d-flex" action="search_service.php" method="post">
                <input name="searchKey" class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-primary my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="row my-3">
            <h3 class="fw-bold">Choose Category</h3>
        </div>
        <div class="list-group col-12 mb-3">
            <a href="our_services.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ?'':'active' ?>">All Categories</a>
            <?php foreach (fetchCategories() as $c){?>
                <a href="services_by_category.php?category_id=<?php echo $c['id'];?>" class="<?php echo isset($_GET['category_id']) ?$_GET['category_id']==$c['id']?'active':'' :'' ?> list-group-item list-group-item-action"><?php echo $c['title']?></a>
            <?php } ?>
        </div>
        <div class="row d-none d-lg-block">
            <h3 class="fw-bold mb-3">Best Offers</h3>
        </div>
        <div class="slickTest row d-none d-lg-block">
            <?php foreach (fetchPromotions() as $i){?>
                <div class="col-12 mx-2">
                    <div class="card slick-card">
                        <img src="../admin/images/<?php echo $i['photo'];?>" class="card-img-top card-product-img img-fluid" alt="...">
                        <div class="card-body">
                            <h5><?php echo $i['name'] ;?></h5>
                            <p style="text-align: justify">
                                <?php echo$i['description'] ;?>
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