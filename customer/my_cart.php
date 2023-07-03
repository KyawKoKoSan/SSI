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
                                    <table class="col-12 col-lg-6 table table-hover table-responsive"
                                           id="products-list">
                                        <thead class="text-uppercase">
                                        <th class="text-nowrap">No</th>
                                        <th class="text-nowrap">Name</th>
                                        <th class="text-nowrap">Description</th>
                                        <th class="text-nowrap">Price</th>
                                        <th class="text-nowrap">Category</th>
                                        <th class="text-nowrap">Photo</th>
                                        <th class="text-nowrap">Options</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (isset($_POST['checkout'])) {
                                            echo checkOut();
                                        }
                                        $total = 0;

                                        if (isset($_SESSION['myCart'][0])) {
                                        foreach ($_SESSION['myCart'] as $key => $value) {
                                            $total = $total + ((int)$value['sale_price']);
                                            $key = $key + 1; ?>
                                            <tr>
                                                <td class="text-nowrap"><?php echo $key; ?></td>
                                                <td class="text-nowrap"><?php echo $value['name']; ?></td>
                                                <td class=""><?php echo short($value['description'], 20); ?></td>
                                                <td class="text-nowrap fw-bold"><?php echo $value['sale_price']; ?>$
                                                </td>
                                                <td class="text-nowrap"><?php echo $value['category']; ?></td>
                                                <td class="text-nowrap">
                                                    <img src="../admin/images/<?php echo $value['photo']; ?>"
                                                         width="100px" height="100px" alt="">
                                                </td>
                                                <td class="text-nowrap">
                                                    <a onclick="return confirm('Are you sure to delete?')"
                                                       href="cart_remove.php?id=<?php echo $value['id']; ?>"
                                                       class="btn btn-sm btn-outline-danger p-3">
                                                        DELETE<i class="feather-trash-2 ms-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <th colspan="8" class="text-dark fw-bolder">Credit Card Details</th>
                                        </tr>
                                        <form action="" method="post">
                                            <tr>
                                                <th colspan="8">
                                                    <div class="col-12 col-md-5 col-lg-3">
                                                        <label for="inputCardNum" class="form-label">Card Number</label>
                                                        <input type="number" name="card_num" class="form-control"
                                                               id="inputCardNum" placeholder="1234 1234 1234 1234" required>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-dark h3">
                                                    <label for="expMonth" class="form-label">Expiration Month</label>
                                                    <input type="number" min="1" max="12" name="expMonth" class="form-control"
                                                           id="expMonth" placeholder="MM" required>
                                                </td>
                                                <td colspan="3" class="text-dark h3">
                                                    <label for="expYear" class="form-label">Expiration Year</label>
                                                    <input type="number" min="2023" max="2099" name="expYear" class="form-control"
                                                           id="expYear" placeholder="YY" required>
                                                </td>
                                                <td colspan="2">
                                                    <label for="secCode" class="form-label">Security Code</label>
                                                    <input type="text" name="secCode" class="form-control"
                                                           id="secCode" placeholder="MM" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-dark h3">Total</td>
                                                <td colspan="3" class="text-dark h3"><?php echo $total; ?>$</td>
                                                <td colspan="2">

                                                    <button name="checkout" type="submit"
                                                            class="btn btn-outline-primary btn-block">CHECKOUT
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>


                                        </tbody>
                                        <?php } else {
                                            echo alert("No Item In Cart", "warning");
                                        } ?>
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


<?php include "template/footer.php"; ?>

