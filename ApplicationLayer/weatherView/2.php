<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Weather Dashboard</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../../src/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../src/css/feather.css">
    <link rel="stylesheet" href="../../src/css/select2.css">
    <link rel="stylesheet" href="../../src/css/dropzone.css">
    <link rel="stylesheet" href="../../src/css/uppy.min.css">
    <link rel="stylesheet" href="../../src/css/jquery.steps.css">
    <link rel="stylesheet" href="../../src/css/jquery.timepicker.css">
    <link rel="stylesheet" href="../../src/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="../../src/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="../../src/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../../src/css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" readonly>
        </form>
        <ul class="nav">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="fe fe-user fe-16"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87  " />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51   " />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15  " />
                </g>
              </svg>
            </a>
          </div>
          
          
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Apps</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Profile</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                <a class="nav-link pl-3" href="./profile.html"><span class="ml-1">Overview</span></a>
              </ul>
            </li>

            <li class="nav-item w-100">
              <a class="nav-link" href="calendar.html">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">Calendar</span>
              </a>
            </li>

            <li class="nav-item w-100">
              <a class="nav-link" href="../weatherView/">
                <i class="fe fe-sun fe-16"></i>
                <span class="ml-3 item-text">Weather</span>
              </a>
            </li>

          </ul>
        </nav> <!-- nav bar end -->
      </aside>



      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">Weather Forecast Dashboard</h2>
                </div>
                <div class="col-auto">
                  <form class="form-inline">
                    <div class="form-group d-none d-lg-inline">
                      <label for="reportrange" class="sr-only">Date Ranges</label>
                      <div id="reportrange" class="px-2 py-2 text-muted">
                        <span class="small"></span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                  <button class=" btn bg-primary text-light" id="search-button"><i class="fe fe-search"></i></button>
                  <span class="input-group-text text-body"></span>
                  <input type="text" class="form-control" placeholder="Search City here..." id="search-city">
                </div>         
              </div>

              <div class="mb-2 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <div class="row mt-1 align-items-center">

                      <div class="col-12 col-lg-4 text-left pl-4">
                        <p class="mb-1 small text"><strong>Location</strong> </p>
                        <div class="h3">
                          <span class="current" id="current-city"></span>
                        </div>
                      </div>

                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text"><strong>Temperature</strong></p>
                        <div class="h3">
                          <span class="current" id="temperature"></span>
                          <span class="fe fe-thermometer"></span>
                        </div>
                      </div>

                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text"><strong>Humidity</strong></p>
                        <div class="h3">
                          <span class="current" id="humidity"></span>
                          <span class="fe fe-trello"></span>
                        </div>
                      </div>

                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text"><strong>Wind Speed</strong></p>
                        <div class="h3">
                          <span class="current" id="wind-speed"></span>
                          <span class="fe fe-wind"></span>
                        </div>
                      </div>

                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text"><strong>UV index</strong></p>
                        <div class="h3">
                          <span class="current" id="uv-index"></span>
                          <span class="fe fe-sun"></span>
                        </div>
                      </div>

                    </div>
                  </div> <!-- .card-body -->
                </div> <!-- .card -->
              </div>

              

                <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
              <h4 class="ms-2 mt-4 mb-0"> 4-Days Forecast: </h4>
              <div class="container border-radius-lg">
                <div class="row">
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-s shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                        <div id="fImg0">
                        </div>
                      </div>
                      <p class="text-m mt-2 mb-0 font-weight-bold" id="fDate0"></p>
                    </div>
                    <h6 class="font-weight-bolder">Temp: <span id="fTemp0"></span></h6>
                    <h6 class="font-weight-bolder">Humid: <span id="fHumidity0"></span></h6>
                  </div>
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-s shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                        <div id="fImg1">
                        </div>
                      </div>
                      <p class="text-m mt-2 mb-0 font-weight-bold" id="fDate1"></p>
                    </div>
                    <h6 class="font-weight-bolder">Temp: <span id="fTemp1"></span></h6>
                    <h6 class="font-weight-bolder">Humid: <span id="fHumidity1"></span></h6>
                  </div>
                 <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-s shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                        <div id="fImg2">
                        </div>
                      </div>
                      <p class="text-m mt-2 mb-0 font-weight-bold" id="fDate2"></p>
                    </div>
                    <h6 class="font-weight-bolder">Temp: <span id="fTemp2"></span></h6>
                    <h6 class="font-weight-bolder">Humid: <span id="fHumidity2"></span></h6>
                  </div>
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-s shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                        <div id="fImg3">
                        </div>
                      </div>
                      <p class="text-m mt-2 mb-0 font-weight-bold" id="fDate3"></p>
                    </div>
                    <h6 class="font-weight-bolder">Temp: <span id="fTemp3"></span></h6>
                    <h6 class="font-weight-bolder">Humid: <span id="fHumidity3"></span></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




              <div class="row items-align-baseline">
                <div class="col-md-12 col-lg-4">
                  <div class="card shadow eq-card mb-4">
                    <div class="card-body mb-n3">
                      <div class="row items-align-baseline h-100">
                        <div class="col-md-6 my-3">
                          <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Earning</strong></p>
                          <h3>$2,562</h3>
                          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="col-md-6 my-4 text-center">
                          <div lass="chart-box mx-4">
                            <div id="radialbarWidget"></div>
                          </div>
                        </div>
                        <div class="col-md-6 border-top py-3">
                          <p class="mb-1"><strong class="text-muted">Cost</strong></p>
                          <h4 class="mb-0">108</h4>
                          <p class="small text-muted mb-0"><span>37.7% Last week</span></p>
                        </div> <!-- .col -->
                        <div class="col-md-6 border-top py-3">
                          <p class="mb-1"><strong class="text-muted">Revenue</strong></p>
                          <h4 class="mb-0">1168</h4>
                          <p class="small text-muted mb-0"><span>-18.9% Last week</span></p>
                        </div> <!-- .col -->
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->
                <div class="col-md-12 col-lg-4">
                  <div class="card shadow eq-card mb-4">
                    <div class="card-body">
                      <div class="chart-widget mb-2">
                        <div id="radialbar"></div>
                      </div>
                      <div class="row items-align-center">
                        <div class="col-4 text-center">
                          <p class="text-muted mb-1">Cost</p>
                          <h6 class="mb-1">$1,823</h6>
                          <p class="text-muted mb-0">+12%</p>
                        </div>
                        <div class="col-4 text-center">
                          <p class="text-muted mb-1">Revenue</p>
                          <h6 class="mb-1">$6,830</h6>
                          <p class="text-muted mb-0">+8%</p>
                        </div>
                        <div class="col-4 text-center">
                          <p class="text-muted mb-1">Earning</p>
                          <h6 class="mb-1">$4,830</h6>
                          <p class="text-muted mb-0">+8%</p>
                        </div>
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->
                <div class="col-md-12 col-lg-4">
                  <div class="card shadow eq-card mb-4">
                    <div class="card-body">
                      <div class="d-flex mt-3 mb-4">
                        <div class="flex-fill pt-2">
                          <p class="mb-0 text-muted">Total</p>
                          <h4 class="mb-0">108</h4>
                          <span class="small text-muted">+37.7%</span>
                        </div>
                        <div class="flex-fill chart-box mt-n2">
                          <div id="barChartWidget"></div>
                        </div>
                      </div> <!-- .d-flex -->
                      <div class="row border-top">
                        <div class="col-md-6 pt-4">
                          <h6 class="mb-0">108 <span class="small text-muted">+37.7%</span></h6>
                          <p class="mb-0 text-muted">Cost</p>
                        </div>
                        <div class="col-md-6 pt-4">
                          <h6 class="mb-0">1168 <span class="small text-muted">-18.9%</span></h6>
                          <p class="mb-0 text-muted">Revenue</p>
                        </div>
                      </div> <!-- .row -->
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col-md -->
              </div> <!-- .row -->
              <div class="row">
                <!-- Recent Activity -->
                <div class="col-md-12 col-lg-4 mb-4">
                  <div class="card timeline shadow">
                    <div class="card-header">
                      <strong class="card-title">Recent Activity</strong>
                      <a class="float-right small text-muted" href="#!">View all</a>
                    </div>
                    <div class="card-body" data-simplebar style="height:355px; overflow-y: auto; overflow-x: hidden;">
                      <h6 class="text-uppercase text-muted mb-4">Today</h6>
                      <div class="pb-3 timeline-item item-primary">
                        <div class="pl-5">
                          <div class="mb-1"><strong>@Brown Asher</strong><span class="text-muted small mx-2">Just create new layout Index, form, table</span><strong>Tiny Admin</strong></div>
                          <p class="small text-muted">Creative Design <span class="badge badge-light">1h ago</span>
                          </p>
                        </div>
                      </div>
                      <div class="pb-3 timeline-item item-warning">
                        <div class="pl-5">
                          <div class="mb-3"><strong>@Hester Nissim</strong><span class="text-muted small mx-2">has upload new files to</span><strong>Tiny Admin</strong></div>
                          <div class="row mb-3">
                            <div class="col"><img src="./assets/products/p1.jpg" alt="..." class="img-fluid rounded"></div>
                            <div class="col"><img src="./assets/products/p2.jpg" alt="..." class="img-fluid rounded"></div>
                            <div class="col"><img src="./assets/products/p3.jpg" alt="..." class="img-fluid rounded"></div>
                            <div class="col"><img src="./assets/products/p4.jpg" alt="..." class="img-fluid rounded"></div>
                          </div>
                          <p class="small text-muted">Front-End Development <span class="badge badge-light">1h ago</span>
                          </p>
                        </div>
                      </div>
                      <div class="pb-3 timeline-item item-success">
                        <div class="pl-5">
                          <div class="mb-3"><strong>@Kelley Sonya</strong><span class="text-muted small mx-2">has commented on</span><strong>Advanced table</strong></div>
                          <div class="card d-inline-flex mb-2">
                            <div class="card-body bg-light py-2 px-3 small rounded"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim nulla eu quam cursus placerat. Vivamus non odio ullamcorper, lacinia ante nec, blandit leo. </div>
                          </div>
                          <p class="small text-muted">Back-End Development <span class="badge badge-light">1h ago</span>
                          </p>
                        </div>
                      </div>
                      <h6 class="text-uppercase text-muted mb-4">Yesterday</h6>
                      <div class="pb-3 timeline-item item-warning">
                        <div class="pl-5">
                          <div class="mb-3"><strong>@Fletcher Everett</strong><span class="text-muted small mx-2">created new group for</span><strong>Tiny Admin</strong></div>
                          <ul class="avatars-list mb-3">
                            <li>
                              <a href="#!" class="avatar avatar-sm">
                                <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-1.jpg">
                              </a>
                            </li>
                            <li>
                              <a href="#!" class="avatar avatar-sm">
                                <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-4.jpg">
                              </a>
                            </li>
                            <li>
                              <a href="#!" class="avatar avatar-sm">
                                <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-3.jpg">
                              </a>
                            </li>
                          </ul>
                          <p class="small text-muted">Front-End Development <span class="badge badge-light">1h ago</span>
                          </p>
                        </div>
                      </div>
                      <div class="pb-3 timeline-item item-success">
                        <div class="pl-5">
                          <div class="mb-3"><strong>@Bertha Ball</strong><span class="text-muted small mx-2">has commented on</span><strong>Advanced table</strong></div>
                          <div class="card d-inline-flex mb-2">
                            <div class="card-body bg-light py-2 px-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim nulla eu quam cursus placerat. Vivamus non odio ullamcorper, lacinia ante nec, blandit leo. </div>
                          </div>
                          <p class="small text-muted">Back-End Development <span class="badge badge-light">1h ago</span>
                          </p>
                        </div>
                      </div>
                      <div class="pb-3 timeline-item item-danger">
                        <div class="pl-5">
                          <div class="mb-3"><strong>@Lillith Joseph</strong><span class="text-muted small mx-2">has upload new files to</span><strong>Tiny Admin</strong></div>
                          <div class="row mb-3">
                            <div class="col"><img src="./assets/products/p4.jpg" alt="..." class="img-fluid rounded"></div>
                            <div class="col"><img src="./assets/products/p1.jpg" alt="..." class="img-fluid rounded"></div>
                            <div class="col"><img src="./assets/products/p2.jpg" alt="..." class="img-fluid rounded"></div>
                          </div>
                          <p class="small text-muted">Front-End Development <span class="badge badge-light">1h ago</span>
                          </p>
                        </div>
                      </div>
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- / .col-md-6 -->
                <!-- Striped rows -->
                <div class="col-md-12 col-lg-8">
                  <div class="card shadow">
                    <div class="card-header">
                      <strong class="card-title">Recent Data</strong>
                      <a class="float-right small text-muted" href="#!">View all</a>
                    </div>
                    <div class="card-body my-n2">
                      <table class="table table-striped table-hover table-borderless">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>2474</td>
                            <th scope="col">Brown, Asher D.</th>
                            <td>Ap #331-7123 Lobortis Avenue</td>
                            <td>13/09/2020</td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Remove</a>
                                  <a class="dropdown-item" href="#">Assign</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2786</td>
                            <th scope="col">Leblanc, Yoshio V.</th>
                            <td>287-8300 Nisl. St.</td>
                            <td>04/05/2019</td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr2">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Remove</a>
                                  <a class="dropdown-item" href="#">Assign</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2747</td>
                            <th scope="col">Hester, Nissim L.</th>
                            <td>4577 Cras St.</td>
                            <td>04/06/2019</td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Remove</a>
                                  <a class="dropdown-item" href="#">Assign</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2639</td>
                            <th scope="col">Gardner, Leigh S.</th>
                            <td>P.O. Box 228, 7512 Lectus Ave</td>
                            <td>04/08/2019</td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr4">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Remove</a>
                                  <a class="dropdown-item" href="#">Assign</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2238</td>
                            <th scope="col">Higgins, Uriah L.</th>
                            <td>Ap #377-5357 Sed Road</td>
                            <td>04/01/2019</td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr5">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Remove</a>
                                  <a class="dropdown-item" href="#">Assign</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- Striped rows -->
              </div> <!-- .row-->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="../../src/js/jquery.min.js"></script>
    <script src="../../src/js/popper.min.js"></script>
    <script src="../../src/js/moment.min.js"></script>
    <script src="../../src/js/bootstrap.min.js"></script>
    <script src="../../src/js/simplebar.min.js"></script>
    <script src='../../src/js/daterangepicker.js'></script>
    <script src='../../src/js/jquery.stickOnScroll.js'></script>
    <script src="../../src/js/tinycolor-min.js"></script>
    <script src="../../src/js/config.js"></script>
    <script src="../../src/js/d3.min.js"></script>
    <script src="../../src/js/topojson.min.js"></script>
    <script src="../../src/js/datamaps.all.min.js"></script>
    <script src="../../src/js/datamaps-zoomto.js"></script>
    <script src="../../src/js/datamaps.custom.js"></script>
    <script src="../../src/js/Chart.min.js"></script>

    <!--Code to Jvascript File to Weather-->
    <script src="../../src/plugin/weather/script.js"></script>

    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="../../src/js/gauge.min.js"></script>
    <script src="../../src/js/jquery.sparkline.min.js"></script>
    <script src="../../src/js/apexcharts.min.js"></script>
    <script src="../../src/js/apexcharts.custom.js"></script>
    <script src='../../src/js/jquery.mask.min.js'></script>
    <script src='../../src/js/select2.min.js'></script>
    <script src='../../src/js/jquery.steps.min.js'></script>
    <script src='../../src/js/jquery.validate.min.js'></script>
    <script src='../../src/js/jquery.timepicker.js'></script>
    <script src='../../src/js/dropzone.min.js'></script>
    <script src='../../src/js/uppy.min.js'></script>
    <script src='../../src/js/quill.min.js'></script>
    <script>
      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
    </script>
    <script src="../../src/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>