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
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Cmplains Lists</li>
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
                        <i class="feather-list text-primary me-2"></i>Complains Lists
                    </h4>
                    <div class="">
                        <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2"></i></a>
                    </div>
                </div><hr>

                <div class="row">
                    <div class="col-12 mt-3 mb-4">
                        <div class="">
                            <div class="" style="overflow-x: scroll">
                                <table class="table table-hover" id="products-list">
                                    <thead class="text-uppercase">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Send By</th>
                                    <th>Send At</th>
                                    <th>Options</th>
                                    </thead>
                                    <tbody>
                                    <?php $no=1;

                                    foreach (fetchComplains() as $i){
                                        ?>
                                        <tr>

                                            <td><?php echo $no;$no++ ;?></td>
                                            <td class="text-nowrap"><?php echo $i['name'] ;?></td>
                                            <td><?php echo $i['email'] ;?></td>
                                            <td><?php echo $i['phone'] ;?></td>
                                            <td><?php echo short($i['message']) ;?></td>
                                            <td><?php if ($i['customer_id']==0){
                                                    echo "Guest";
                                                }else{
                                                    $user = fetchCustomer($i['customer_id']);
                                                    echo $user['name'];
                                                }?></td>
                                            <td><?php echo timestampFormatter($i['send_at'],"d-m-Y") ;?></td>
                                            <td  class="text-nowrap">
                                                <a onclick="return confirm('Are you sure to delete?')" href="complain_delete.php?id=<?php echo $i['id'] ;?>" class="btn btn-sm btn-outline-danger">
                                                    <i class="feather-trash-2"></i>
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
