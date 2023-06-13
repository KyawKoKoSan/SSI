<?php
include "template/header.php"; ?>
<section id="home" class="container-fluid wow animate__slideInDown mt-5">
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="col-9 mt-5 pe-0 pt-5 pb-4 pb-xl-5 pt-xl-4">
                        <img src="customer_assets/img/Contact Us.png" class="img-fluid" alt="Sneaker Photo"
                            style="border-radius: 30px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid" id="about">
    <div class="container">
        <div class="row pt-5">
            <div class="col-12 mb-3 wow animate__bounceIn">
                <h3 class="text-primary text-center">Contact Us</h3>
            </div>
            <div class="d-lg-flex justify-content-center align-items-center">
                <div class="col-12 col-lg-6 wow animate__bounceInLeft">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" class="row">
                                <div class="col-12 mt-2">
                                    <label for="inputName" class="form-label">
                                        <i class="feather-user me-2 text-primary"></i>Name
                                    </label>
                                    <input name="name" type="text" class="form-control" id="inputName"
                                        placeholder="Eg:John" required>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="inputEmail4" class="form-label">
                                        <i class="feather-mail me-2 text-primary"></i>Email
                                    </label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4"
                                        placeholder="example@gmail.com" required>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="inputPhone" class="form-label">
                                        <i class="feather-phone me-2 text-primary"></i>Phone Number
                                    </label>
                                    <input type="number" name="phone" class="form-control" id="inputPhone"
                                        placeholder="+95912345678" required>
                                </div>
                                <div class="col-12 mt-2">
                                    <div>
                                        <label for="longDes" class="form-label my-3">Message</label>
                                        <textarea name="description" class="form-control" style="resize: none;"
                                            id="longDes" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="submit" name="send"
                                        class="btn btn-outline-primary col-12 col-lg-3">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-3">
                    <div class="col-12 col-lg-10 text-center wow animate__bounceInRight">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488799.4874372742!2d95.9013768351299!3d16.838952489086928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2ssg!4v1645607641218!5m2!1sen!2ssg"
                            width="400" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "template/footer.php"; ?>