<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Preventive Maintenance</title>
</head>
<body>
  
</body>
</html>
<section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row" id="report-mesin">
            <?php include('banner/banner_admin.php');?>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- <div class="row"> -->
              <!-- Left col -->
              <!-- <section class="col-lg-7 connectedSortable"> -->
                <!-- Custom tabs (Charts with tabs)-->
                <!-- <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-pie mr-1"></i>
                      Sales
                    </h3>
                    <div class="card-tools">
                      <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                          <a
                            class="nav-link active"
                            href="#revenue-chart"
                            data-toggle="tab"
                            >Area</a
                          >
                        </li>
                        <li class="nav-item">
                          <a
                            class="nav-link"
                            href="#sales-chart"
                            data-toggle="tab"
                            >Donut</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div> -->
                  <!-- /.card-header -->
                  <!-- <div class="card-body">
                    <div class="tab-content p-0"> -->
                      <!-- Morris chart - Sales -->
                      <!-- <div
                        class="chart tab-pane active"
                        id="revenue-chart"
                        style="position: relative; height: 300px"
                      >
                        <canvas
                          id="revenue-chart-canvas"
                          height="300"
                          style="height: 300px"
                        ></canvas>
                      </div>
                      <div
                        class="chart tab-pane"
                        id="sales-chart"
                        style="position: relative; height: 300px"
                      >
                        <canvas
                          id="sales-chart-canvas"
                          height="300"
                          style="height: 300px"
                        ></canvas>
                      </div>
                    </div>
                  </div> -->
                  <!-- /.card-body -->
                <!-- </div> -->
                <!-- /.card -->

                <!-- DIRECT CHAT -->
                <!-- <div class="card direct-chat direct-chat-primary">
                  <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                      <span title="3 New Messages" class="badge badge-primary"
                        >3</span
                      >
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse"
                      >
                        <i class="fas fa-minus"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        title="Contacts"
                        data-widget="chat-pane-toggle"
                      >
                        <i class="fas fa-comments"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="remove"
                      >
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div> -->
                  <!-- /.card-header -->
                  <!-- <div class="card-body"> -->
                    <!-- Conversations are loaded here -->
                    <!-- <div class="direct-chat-messages"> -->
                      <!-- Message. Default to the left -->
                      <!-- <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left"
                            >Alexander Pierce</span
                          >
                          <span class="direct-chat-timestamp float-right"
                            >23 Jan 2:00 pm</span
                          >
                        </div> -->
                        <!-- /.direct-chat-infos -->
                        <!-- <img
                          class="direct-chat-img"
                          src="dist/img/user1-128x128.jpg"
                          alt="message user image"
                        /> -->
                        <!-- /.direct-chat-img -->
                        <!-- <div class="direct-chat-text">
                          Is this template really for free? That's unbelievable!
                        </div> -->
                        <!-- /.direct-chat-text -->
                      <!-- </div> -->
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <!-- <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right"
                            >Sarah Bullock</span
                          >
                          <span class="direct-chat-timestamp float-left"
                            >23 Jan 2:05 pm</span
                          >
                        </div> -->
                        <!-- /.direct-chat-infos -->
                        <!-- <img
                          class="direct-chat-img"
                          src="dist/img/user3-128x128.jpg"
                          alt="message user image"
                        /> -->
                        <!-- /.direct-chat-img -->
                        <!-- <div class="direct-chat-text">
                          You better believe it!
                        </div> -->
                        <!-- /.direct-chat-text -->
                      <!-- </div> -->
                      <!-- /.direct-chat-msg -->

                      <!-- Message. Default to the left -->
                      <!-- <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left"
                            >Alexander Pierce</span
                          >
                          <span class="direct-chat-timestamp float-right"
                            >23 Jan 5:37 pm</span
                          >
                        </div> -->
                        <!-- /.direct-chat-infos -->
                        <!-- <img
                          class="direct-chat-img"
                          src="dist/img/user1-128x128.jpg"
                          alt="message user image"
                        /> -->
                        <!-- /.direct-chat-img -->
                        <!-- <div class="direct-chat-text">
                          Working with AdminLTE on a great new app! Wanna join?
                        </div> -->
                        <!-- /.direct-chat-text -->
                      <!-- </div> -->
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <!-- <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right"
                            >Sarah Bullock</span
                          >
                          <span class="direct-chat-timestamp float-left"
                            >23 Jan 6:10 pm</span
                          >
                        </div> -->
                        <!-- /.direct-chat-infos -->
                       
                        
                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts">
                      <ul class="contacts-list">
                        <li>
                          <a href="#">
                            <img
                              class="contacts-list-img"
                              src="dist/img/user1-128x128.jpg"
                              alt="User Avatar"
                            />

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Count Dracula
                                <small class="contacts-list-date float-right"
                                  >2/28/2015</small
                                >
                              </span>
                              <span class="contacts-list-msg"
                                >How have you been? I was...</span
                              >
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img
                              class="contacts-list-img"
                              src="dist/img/user7-128x128.jpg"
                              alt="User Avatar"
                            />

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Sarah Doe
                                <small class="contacts-list-date float-right"
                                  >2/23/2015</small
                                >
                              </span>
                              <span class="contacts-list-msg"
                                >I will be waiting for...</span
                              >
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img
                              class="contacts-list-img"
                              src="dist/img/user3-128x128.jpg"
                              alt="User Avatar"
                            />

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nadia Jolie
                                <small class="contacts-list-date float-right"
                                  >2/20/2015</small
                                >
                              </span>
                              <span class="contacts-list-msg"
                                >I'll call you back at...</span
                              >
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img
                              class="contacts-list-img"
                              src="dist/img/user5-128x128.jpg"
                              alt="User Avatar"
                            />

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nora S. Vans
                                <small class="contacts-list-date float-right"
                                  >2/10/2015</small
                                >
                              </span>
                              <span class="contacts-list-msg"
                                >Where is your new...</span
                              >
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img
                              class="contacts-list-img"
                              src="dist/img/user6-128x128.jpg"
                              alt="User Avatar"
                            />

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                John K.
                                <small class="contacts-list-date float-right"
                                  >1/27/2015</small
                                >
                              </span>
                              <span class="contacts-list-msg"
                                >Can I take a look at...</span
                              >
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img
                              class="contacts-list-img"
                              src="dist/img/user8-128x128.jpg"
                              alt="User Avatar"
                            />

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Kenneth M.
                                <small class="contacts-list-date float-right"
                                  >1/4/2015</small
                                >
                              </span>
                              <span class="contacts-list-msg"
                                >Never mind I found...</span
                              >
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                      </ul>
                      <!-- /.contacts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.card-body -->
                </div>
                <!--/.direct-chat -->
                <!-- /.card -->
              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <section class="col-lg-5 connectedSortable">
                <!-- Map card -->
              </section>
              <!-- right col -->
            </div>
            <!-- /.row (main row) -->
          </div>
          <!-- /.container-fluid -->
        </section>