<?php
include "template/header.php";
?>



<section class="container">
    <div class="row mt-5" id="home">
        <div class="col-12 pt-5">

            <div class="card mb-4 wow animate__slideInLeft">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="" id="about">
                                <div class="vh-100 overflow-scroll">
                                    <table class="table table-hover table-responsive" id="products-list">
                                        <thead class="text-uppercase">
                                        <th class="text-nowrap">No</th>
                                        <th class="text-nowrap">Name</th>
                                        <th class="text-nowrap">Description</th>
                                        <th class="text-nowrap">Price</th>
                                        <th class="text-nowrap">Quantity</th>
                                        <th class="text-nowrap">Category</th>
                                        <th class="text-nowrap">Photo</th>
                                        <th class="text-nowrap">Options</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (isset($_POST['checkout'])){
                                            echo checkOut();
                                        }
                                        $total=0;

                                        if (isset($_SESSION['myCart'][0])) {
                                        foreach ($_SESSION['myCart'] as $key => $value) {
                                            $total=$total+((int)$value['sale_price']*(int)$value['quantity']);
                                            $key=$key+1; ?>
                                            <tr>
                                                <td  class="text-nowrap"><?php echo $key;?></td>
                                                <td class="text-nowrap"><?php echo $value['name'] ;?></td>
                                                <td  class=""><?php echo $value['description'] ;?></td>
                                                <td  class="text-nowrap fw-bold"><?php echo $value['sale_price'] ;?>$</td>
                                                <td  class="text-nowrap fw-bold"><?php echo $value['quantity'] ;?></td>
                                                <td  class="text-nowrap"><?php echo $value['category'];?></td>
                                                <td  class="text-nowrap">
                                                    <img src="../admin/images/<?php echo $value['photo'];?>" width="100px" height="100px" alt="">
                                                </td>
                                                <td  class="text-nowrap">
                                                    <a onclick="return confirm('Are you sure to delete?')" href="remove_from_cart.php?id=<?php echo $value['id'] ;?>" class="btn btn-sm btn-outline-danger">
                                                        <i class="feather-trash-2"></i>
                                                    </a>
                                                    <a href="cart_update.php?id=<?php echo $value['id'] ;?>" class="btn btn-sm btn-outline-warning mb-2 mb-xl-0">
                                                        <i class="feather-edit-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }?> <tr>
                                            <td colspan="3" class="text-dark h3">Total</td>
                                            <td colspan="3" class="text-dark h3"><?php echo $total; ?>$</td>
                                            <td colspan="2">
                                                <form action="" method="post">
                                                    <button name="checkout" type="submit" class="btn btn-outline-primary btn-block">CHECKOUT</button>
                                                </form>
                                            </td>
                                        </tr>

                                        </tbody>
                                        <?php } else{ echo alert("No Item In Cart","warning"); }?>
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
<!--    end coding to show products list-->




<?php include "template/footer.php";?>

