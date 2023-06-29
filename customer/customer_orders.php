<?php
require_once "../admin/core/customer_auth.php";
include "template/header.php";
?>
<section class="container mt-5 wow animate__slideInDown" id="home">
    <div class="row pt-3">
        <div class="col-12 pt-5">
            <div class="card mb-4">
                <div class="card-body" id="about">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-uppercase"><i class="feather-list text-primary me-2"></i>Order List</h4>
                        <div class="">
                            <a href="our_services.php" class="btn btn-outline-primary me-2"><i class="feather-shopping-cart"></i></a>
                            <a href="#" class="btn btn-outline-primary full-screen-btn"><i class="feather-maximize-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 mt-3 mb-4">
                            <div class="">

                                <div class="" style="overflow-x: scroll; max-height: 80vh;">
                                    <table class="table table-hover table-responsive " id="products-list">
                                        <thead class="text-uppercase">
                                        <th class="text-nowrap">Order ID</th>
                                        <th class="text-nowrap">Item Name</th>
                                        <th class="text-nowrap">Price</th>
                                        <th class="text-nowrap">Photo</th>
                                        <th class="text-nowrap">Category</th>
                                        <th class="text-nowrap">Delivery Address</th>
                                        <th class="text-nowrap">Orderd At</th>
                                        <th class="text-nowrap">Expired At</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach (customerOrders() as $i){
                                            $iid = $i['service_id'];
                                            $cid = $i['customer_id'];
                                            $iCurrent=fetchService($iid);
                                            $cCurrent=fetchCustomer($cid);
                                            ?>
                                            <tr>
                                                <td  class="text-nowrap"><?php echo$i['id'];?></td>
                                                <td class="text-nowrap"><?php echo $iCurrent['name'] ;?></td>
                                                <td  class="text-nowrap fw-bold"><?php echo $iCurrent['sale_price'] ;?>$</td>
                                                <td  class="text-nowrap">
                                                    <img src="../admin/images/<?php echo $iCurrent['photo'];?>" width="100px" height="100px" alt="">
                                                </td>
                                                <td  class="text-nowrap"><?php echo fetchCategory($iCurrent['category_id'])['title'];?></td>
                                                <td class="text-nowrap"><?php echo $cCurrent['address'] ;?></td>
                                                <td  class="text-nowrap"><?php echo $i['ordered_at'] ;?></td>
                                                <td  class="text-nowrap"><?php echo $i['expired_date'] ;?></td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include "template/footer.php";?>

<script>
    $(".table").dataTable({
        "order":[[0,"desc"]]
    });
</script>