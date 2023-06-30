<?php
require_once "core/admin_auth.php";
include_once "template/header.php";
?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Services Lists</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-uppercase"><i class="feather-list text-primary me-2"></i>Services Lists</h4>
                    <div class="">
                        <a href="service_add.php" class="btn btn-outline-secondary me-2"><i class="feather-plus-circle"></i></a>
                        <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2"></i></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 mt-3 mb-4">
                        <div class="">
                            <div class="" style="overflow-x: scroll">
                                <table class="table table-hover table-responsive " id="services_list">
                                    <thead class="text-uppercase">
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">Description</th>
                                    <th class="text-nowrap">Price</th>
                                    <th class="text-nowrap">Photo</th>
                                    <th class="text-nowrap">Duration</th>
                                    <th class="text-nowrap">Policy</th>
                                    <th class="text-nowrap">Created By</th>
                                    <th class="text-nowrap">Category</th>
                                    <th class="text-nowrap">Created At</th>
                                    <th class="text-nowrap">Options</th>
                                    </thead>
                                    <tbody>
                                    <?php $no=1;
                                    foreach (fetchServices() as $i){
                                        ?>
                                        <tr>
                                            <td  class="text-nowrap"><?php echo $no;$no++;?></td>
                                            <td class="text-nowrap"><?php echo $i['name'] ;?></td>
                                            <td  class="text-nowrap"><?php echo short($i['description']) ;?></td>
                                            <td  class="text-nowrap fw-bold"><?php echo $i['sale_price'] ;?>$</td>
                                            <td  class="text-nowrap">
                                                <img src="images/<?php echo $i['photo'];?>" width="100px" height="100px" alt="">
                                            </td>
                                            <td class="text-nowrap"><?php echo $i['duration'] ;?></td>
                                            <td class="text-nowrap"><?php echo short($i['policy'] );?></td>
                                            <td  class="text-nowrap"><?php echo fetchAdmin($i['admin_id'])['name'] ;?></td>
                                            <td  class="text-nowrap"><?php echo fetchCategory($i['category_id'])['title'];?></td>
                                            <td class="text-nowrap"><?php echo $i['created_at'] ;?></td>
                                            <td  class="text-nowrap">

                                                <a onclick="return confirm('Are you sure to delete?')" href="service_delete.php?id=<?php echo $i['id'] ;?>" class="btn btn-sm btn-outline-danger">
                                                    <i class="feather-trash-2"></i>
                                                </a>
                                                <a href="
                                                <?php if (fetchCategory($i['category_id'])['title'] == 'Promotion'){
                                                    echo "promotion_update.php?id=".$i['id'];
                                                } else{
                                                    echo "service_update.php?id=".$i['id'];
                                                }?>" class="btn btn-sm btn-outline-warning mb-2 mb-xl-0">
                                                    <i class="feather-edit-2"></i>
                                                </a>
                                            </td>
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
