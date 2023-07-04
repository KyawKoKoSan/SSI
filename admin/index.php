<?php require_once "core/admin_auth.php";

include "template/header.php"; ?>
<div class="row mt-3">
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('category_management.php')">
            <!--                        start container for total employees-->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3"><i class="feather-layers h3 text-primary"></i></div>
                    <div class="col-9">
                        <p class="mb-1 h5 fw-bolder">
                            <span class="counter user-select-none text-black">
                                <?php echo countTotal("categories") ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50 user-select-none">Total Category</p>
                    </div>
                </div>
            </div>
            <!--                        end container for total employees-->
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('customer_list.php')">
            <!--                        start container for customer list-->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-users h3 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h5 fw-bolder">
                            <span class="counter user-select-none text-black">
                                <?php echo countTotal("viewers") ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50 user-select-none">Total Visitors</p>
                    </div>
                </div>
            </div>
            <!--                        end container for customer list-->
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('service_list.php')">
            <!--                        start container for products list-->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-box h3 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h5 fw-bolder">
                            <span class="counter user-select-none text-black">
                                <?php echo countTotal("services") ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50 user-select-none">Services</p>
                    </div>
                </div>
            </div>
            <!--                        end container for products list-->
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('order_list.php')">
            <!--                        start container for supported location-->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-check-square h3 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h5 fw-bolder">
                            <span class="counter user-select-none text-black">
                                <?php echo countTotal("orders") ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50 user-select-none">Total Orders</p>
                    </div>
                </div>
            </div>
            <!--                        end container for supported location-->

        </div>
    </div>

    <!--    start graphs-->
    <div class="row">
        <div class="col-12 col-md-6 col-xl-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h4 class="mb-0">Visitors</h4>
                    </div>
                    <canvas id="ov" height="207"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-5">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h4 class="mb-0">Category / Service</h4>
                        <div class="">
                            <i class="feather-pie-chart h4 mb-0 text-primary"></i>
                        </div>
                    </div>
                    <canvas id="op" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!--content Area Start-->
    <!--    end graphs-->


</div>



<?php include "template/footer.php"; ?>
<script src="../assets/vendor/chartjs/chart.min.js"></script>


<script>
    <?php

    $dateArr = [];
    $visitorRate = [];
    $today = date("Y-m-d");
    for ($i = 0; $i < 10; $i++) {
        $date = date_create($today);
        date_sub($date, date_interval_create_from_date_string("$i days"));
        $current = timestampFormatter($date, "Y-m-d");
        array_push($dateArr, $current);
        $res = countTotal("viewers", "CAST(created_at AS DATE) = '$current'");
        array_push($visitorRate, $res);
    }
    $dateArr = array_reverse($dateArr);
    $visitorRate = array_reverse($visitorRate);

    ?>
    let dateArr = <?php echo json_encode($dateArr); ?>;
    let viewerCountArr = <?php echo json_encode($visitorRate); ?>;


    const ov = document.getElementById('ov').getContext('2d');
    const ovCart = new Chart(ov, {
        type: 'line',
        data: {
            labels: dateArr,
            datasets: [{
                label: 'Viewers Count',
                data: viewerCountArr,
                backgroundColor: [
                    '#4c5cbd'
                ],
                borderColor: [
                    '#0d21a1'
                ],
                borderWidth: 1,
                fill: true,
                tension: 0
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    <?php $catName = [];
    $countPostByCategory = [];
    foreach (fetchCategories() as $c) {
        array_push($catName, $c['title']);
        array_push($countPostByCategory, countTotal('services', "category_id={$c['id']}"));
    }
    ?>

    let catArr = <?php echo  json_encode($catName); ?>;
    let countArr = <?php echo  json_encode($countPostByCategory); ?>;
    const op = document.getElementById('op').getContext('2d');
    const opChart = new Chart(op, {
        type: 'doughnut',
        data: {
            labels: catArr,
            datasets: [{
                label: '# of Votes',
                data: countArr,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>