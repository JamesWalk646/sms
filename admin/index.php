<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ){
header('location: login.php');
}
// else{
//     echo "";
// }
include 'navbar.php';   
include 'sidebar.php'; 
?>




<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-body mt-2">
            <!-- dashboard  -->
            <div class="row">
                <div class="col-lg-4 ">
                    <h1 class="welcome-head"> Welcome <span>
                            <?php echo $_SESSION['username']."!"; ?>
                        </span> </h1>
                    <h5 class="dashboard-head">Dashboard</h5>
                </div>
            </div>
            <!-- dashboard end -->
            <!-- cards start firts row -->
            <div class="row my-2">
                <div class="col-lg-3">
                    <div class="bg-yellow">
                        <div class="row">
                            <div class="col-5">
                                <div class="bg-icon-yellow">
                                    <i class="fas fa-user-graduate text-white"></i>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <div class="numbers-students">
                                    <h2 class="font-weight-bold">100</h2>
                                    <p>Students</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-sky">
                        <div class="row">
                            <div class="col-5">
                                <div class="bg-icon-blue">
                                    <i class="fas fa-crown text-white"></i>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <div class="numbers-students">
                                    <h2 class="font-weight-bold">50+</h2>
                                    <p>Awards</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-light-red">
                        <div class="row">
                            <div class="col-5">
                                <div class="bg-icon-red">
                                    <i class="fas fa-chalkboard-teacher text-white"></i>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <div class="numbers-students">
                                    <h2 class="font-weight-bold">50</h2>
                                    <p>Teachers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-purple">
                        <div class="row">
                            <div class="col-5">
                                <div class="bg-icon-purple">
                                    <i class="fas fa-users text-white"></i>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <div class="numbers-students">
                                    <h2 class="font-weight-bold">100</h2>
                                    <p>Parents</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cards end -->
            <!-- charts -->
            <div class="row">
                <div class="col-lg-5">
                    <hr>
                    <h2 class="charts-head">Number of Students</h2>
                    <hr>
                    <canvas id="myChart" width="400" height="400"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: ['Girls', 'Boys'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(248, 124, 131,0.9)',
                                        'rgba(38, 45, 71,0.8)'
                                    ],
                                    borderColor: [
                                        'rgb(248, 124, 131)',
                                        'rgb(38,45,71)'
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
                </div>
                <div class="col-1"></div>
                <div class="col-lg-5">
                    <hr>
                    <h2 class="charts-head">Number of Teachers</h2>
                    <hr>
                    <canvas id="myChart1" width="400" height="400"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart1').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5, 2, 3],
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
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<?php  include 'footer.php';?>