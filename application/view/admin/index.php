<?php  
// session_start(); 
include('run.php');
include('includee/Header.php');
include('includee/navbar.php');

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <div style="display: flex; gap: 1rem">
                    <!-- <form action ="./CSV/import.php" method="POST" enctype ='multipart/form-data'>
                        <input type = "file" name="file" accept=".csv">
                        <button type= "submit" name="import" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Import </button>
                    </form> -->
                    <form action ="./addons/pdf.php" method="POST">
                        <button type= "submit" name="btn_pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Generate Report </button>
                    </form>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       Total Number of Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                            // require('database/connection.php');
                                    $query = "SELECT UserID FROM user ORDER BY UserID";  
                                        $query_run = mysqli_query($connection, $query);
                                            $row = mysqli_num_rows($query_run);
                                               echo '<h5> Users: '.$row.'</h5>';
                                             ?>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Number of Admins</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                            // require('database/connection.php');
                                    $query = "SELECT AdminId FROM adregister ORDER BY AdminId";  
                                        $query_run = mysqli_query($connection, $query);
                                            $row = mysqli_num_rows($query_run);
                                               echo '<h5> Admins: '.$row.'</h5>';
                                             ?>    

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                            // require('database/connection.php');
                                    $query = "SELECT SubID FROM submittions ORDER BY SubID";  
                                        $query_run = mysqli_query($connection, $query);
                                            $row = mysqli_num_rows($query_run);
                                               echo '<h5> Posts: '.$row.'</h5>';
                                             ?>


                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Requests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                            // require('database/connection.php');
                                    $query = "SELECT FormID FROM validform ORDER BY UserID";  
                                        $query_run = mysqli_query($connection, $query);
                                            $row = mysqli_num_rows($query_run);
                                               echo '<h5> Requests: '.$row.'</h5>';
                                             ?>


                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          <!-- charts were here -->
          <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!--Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-#20c9a6">Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                    <!-- <hr> Styling for the area chart can be found in the
                                    <code>/js/demo/chart-area-demo.js</code> file. -->
                                </div>
                            </div>

                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-#20c9a6">Donut Chart</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                         <canvas id="myPieChart"></canvas>
                                        <!-- ?php
                                            include('./charts/donut.php');
                                        ?> -->
                                    <!-- </div> -->
                                    <!-- <hr> Styling for the donut chart can be found in the
                                    <code>/js/demo/chart-pie-demo.js</code> file. -->
                                </div>
                            </div>
                        </div>
                    </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php

include('./includee/script.php');
include('./includee/footer.php');

?>

