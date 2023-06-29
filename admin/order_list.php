<?php
require_once "core/admin_auth.php";
require_once "core/check_admin.php";
include "template/header.php";
?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Order List</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-uppercase">
                        <i class="feather-list text-primary me-2"></i>Orders List
                    </h4>
                    <div class="">
                        <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2"></i></a>
                    </div>
                </div><hr>

                <div class="row">
                    <div class="col-12 mt-3 mb-4">
                        <div class="">

                            <div class="" style="overflow-x: scroll">

                                <table class="table table-hover table-responsive " id="products-list">
                                    <thead class="text-uppercase">
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Service Name</th>
                                    <th class="text-nowrap">Price</th>
                                    <th class="text-nowrap">Photo</th>
                                    <th class="text-nowrap">Orderd At</th>
                                    <th class="text-nowrap">Expired At</th>
                                    <th class="text-nowrap">Orderd By</th>
                                    <th class="text-nowrap">Category</th>
                                    <th class="text-nowrap">Delivery Address</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach (fetchOrders() as $i){
                                        $iid = $i['service_id'];
                                        $cid = $i['customer_id'];
                                        $iCurrent=fetchService($iid);
                                        $cCurrent=fetchCustomer($cid);
                                        ?>
                                        <tr>
                                            <td  class="text-nowrap"><?php echo $no;$no++;?></td>
                                            <td class="text-nowrap"><?php echo $iCurrent['name'] ;?></td>
                                            <td  class="text-nowrap fw-bold"><?php echo $iCurrent['sale_price'] ;?>$</td>
                                            <td  class="text-nowrap">
                                                <img src="../admin/images/<?php echo $iCurrent['photo'];?>" width="100px" height="100px" alt="">
                                            </td>
                                            <td  class="text-nowrap"><?php echo timestampFormatter($i['ordered_at'],"d-m-Y") ;?></td>
                                            <td  class="text-nowrap"><?php echo timestampFormatter($i['expired_date'],"d-m-Y") ;?></td>
                                            <td  class="text-nowrap"><?php
                                                if (isset($cCurrent['name'])){
                                                    echo $cCurrent['name'] ;}
                                                else{
                                                    echo "Deleted User";
                                                }
                                                ?></td>
                                            <td  class="text-nowrap"><?php echo fetchCategory($iCurrent['category_id'])['title'];?></td>
                                            <td class="text-nowrap"><?php
                                                if (isset($cCurrent['address'])){
                                                    echo $cCurrent['address'] ;}
                                                else{
                                                    echo "Deleted User";
                                                }
                                                ?></td>
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
<!--    end coding to show products list-->




<?php include "template/footer.php";?>

<script>
    $(".table").dataTable({
        "order":[[0,"desc"]]
    });
</script>
