    <!-- start contact us section -->
    <section id="contact" class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row my-5 wow animate__slideInLeft delay-5s">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="text-primary">Contact Us</h1>
                                <p class="py-3">
                                    We know that, it is important for the customer to reach us. So we provide different
                                    methods for the customer to reach us.
                                    Click below button to see how to reach us. We will waiting for You.
                                </p>
                                <a href="contact_us.php" class="btn btn-outline-primary btn_custom_interaction">Contact
                                    Us Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5 wow animate__slideInRight delay-5s">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="text-primary">Get Direction</h1>
                                <p class="py-3">
                                    We also provide the google map link of our brances so the customer can easily find
                                    and come to us.
                                </p>
                                <a href="about_us.php" class="btn btn-outline-primary btn_custom_interaction">Get
                                    Direction</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact us section -->

    <!-- start footer section -->
    <section id="footer" class="container-fluid my-5">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <h4 class="fw-bold my-3 user-select-none text-primary">
                                Best Insurance Service Company
                            </h4>
                            <h5 class="fw-bold text-primary mb-3">"Sure Shield Insurance"</h5>
                            <p><i class="far fa-copyright"></i> 2020 All rights reserve.</p>
                            <p>Sure Shield Insurance<i class="ms-1 fas fa-trademark"></i></p>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="mb-0">
                                <h4 class="fw-bold my-3 text-primary">Social Supports</h4>
                                <a href="#" class="text-decoration-none me-4 mb-2 footer-icons fab fa-facebook fa-2x"
                                    style="color: #515cc7"></a>
                                <a href="#" class="text-decoration-none me-4 mb-2 footer-icons fab fa-twitter fa-2x"
                                    style="color: dodgerblue"></a>
                                <a href="#" class="text-decoration-none me-4 mb-2 footer-icons fab fa-instagram fa-2x"
                                    style="color: indianred"></a>
                                <a href="#"
                                    class="text-decoration-none me-4 mb-2 footer-icons fab fa-facebook-messenger fa-2x"
                                    style="color: #0084ff"></a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="mb-0">
                                <h4 class="fw-bold my-3 text-primary">Information</h4>
                                <a href="#" class="text-decoration-none">FAQ</a><br /><br />
                                <a href="#" class="text-decoration-none">Contact Us</a><br /><br />
                                <a href="#" class="text-decoration-none">Privacy Policy</a><br /><br />
                                <a href="#" class="text-decoration-none">Terms of services</a><br /><br />
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="mb-0">
                                <h4 class="fw-bold my-3 text-primary">Address</h4>
                                <a href="#" class="text-decoration-none">Yangon,Myanmar</a><br /><br />
                                <a href="#" class="text-decoration-none">No 100,200 Street</a><br /><br />
                                <a href="#" class="text-decoration-none">09123456789</a><br /><br />
                                <a href="#" class="text-decoration-none">admin@ssi.com</a><br /><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end footer section -->
    <button class="mode-change position-fixed" onclick="toggleDarkMode()">
        <i class="feather-moon" id="mode-icon"></i>
    </button>
    <a href="#home" class="animate__animated position-fixed scroll-to-top text-center text-decoration-none"
        style="display: none;">
        <i class="feather-arrow-up" style="line-height: 3;"></i>
    </a>

    <!--  Start  Linking required JS files, libraries and libraries-->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/slick/slick.min.js"></script>
    <script src="../assets/vendor/waypoints/lib/noframework.waypoints.min.js"></script>
    <script src="../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables.net-dt/bootstrap.min.js"></script>

    <script src="../assets/vendor/wow/wow.js"></script>
    <script src="customer_assets/js/go_to_top.js"></script>


    <!--  End  Linking required JS files, libraries and libraries-->
    <script>
$('.slickTest').slick({
    dots: true,
    arrows: false,
    speed: 300,
    infinite: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    pauseOnDotsHover: false,
    autoplay: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1400,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 900,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

$('.slickTestIndex').slick({
    dots: true,
    arrows: false,
    speed: 300,
    infinite: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    pauseOnDotsHover: false,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [{
            breakpoint: 1400,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

// start intializing wow js to use
wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animate__animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
})
wow.init();
// end intializing wow js to use

// start coding for minimize maximize button
$(".full-screen-btn").click(function() {
    $current = $(".full-screen-btn").closest(".card");
    $current.toggleClass("full-screen-card");
    if ($current.hasClass('full-screen-card')) {
        $(this).html(`<i class="feather-minimize-2"></i>`);
    } else {
        $(this).html(` <i class="feather-maximize-2"></i>`);
    }
});
// end coding for minimize maximize button

// function changeMode(){
//     document.body.classList.toggle("dark-mode");
//     document.getElementById('mode-icon').classList.toggle('feather-sun')
// }

let checkDarkMode = localStorage.getItem('darkMode') === 'true';

function enableDarkMode() {
    document.body.classList.add('dark-mode');
    document.getElementById('mode-icon').classList.toggle('feather-sun');
    localStorage.setItem('darkMode', 'true');
    checkDarkMode = true;
}

function disableDarkMode() {
    document.body.classList.remove('dark-mode');
    localStorage.setItem('darkMode', 'false');
    checkDarkMode = false;
}

function toggleDarkMode() {
    if (checkDarkMode) {
        disableDarkMode();
    } else {
        enableDarkMode();
    }
}

if (checkDarkMode) {
    enableDarkMode();
}


$(window).on("load", function() {
    $('.loader-container').fadeOut(500, function() {
        $(this).remove();
    });
})
    </script>
    </body>

    </html>