<?php
include('../conf/config.php');
// Count the number of mesin
$mesinQuery = mysqli_query($conn_pm, "SELECT COUNT(id) AS jmlmsn FROM mesin");
$mesinView = mysqli_fetch_array($mesinQuery);

// Count the number of users
$userQuery = mysqli_query($conn_pm, "SELECT COUNT(id) AS jmluser FROM users");
$userView = mysqli_fetch_array($userQuery);
?>
              <div class="col-lg-4 col-13">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?php echo $userView['jmluser'];?></h3>
                    <p>Users</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="index.php?page=data-users" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-13">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><?php echo $mesinView['jmlmsn'];?></h3>
                    <!-- <sup style="font-size: 20px">%</sup> -->

                    <p>Mesin</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="index.php?page=data-mesin" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-13">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>20</h3>
                    <p>Jadwal</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="index.php?page=data-jadwal" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>
              <!-- ./col -->
              <!-- <div class="col-lg-3 col-6"> -->
                <!-- small box -->
                <!-- <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div> -->
              <!-- ./col -->



              