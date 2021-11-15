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
      <?php include("../../include/topNav.php")  ?>
      <?php include("../../include/sideNav.php")  ?>

      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">Welcome to Weather Dashboard!</h2>
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
              <br>
              <br>

              <div class="container-fluid">
                <!--Row for searching a city-->
                <div class="row">
                  <div class="col-sm-4 bg-light">
                    <!--Here we create an HTML form for handling the inputs-->
                    <h4>Search for a City</h4>
                    <!--Here we create the text box for capturing the search city Name-->
                      <div class="input-group mb-3">
                        <input type="text" class="form-control"id="search-city" aria-label="City Search" aria-describedby="search-button">
                        <div class="input-group-append">
                          <button class=" btn bg-primary text-light" id="search-button"><i class="fe fe-search"></i></button>
                        </div>
                      </div>
                        <!--section for search city history-->
                        <button class=" btn btn-primary" type="button" id="clear-history">Clear history</button>
                        <ul class="list-group">

                        </ul>
                    </div> 
                    <div class="col-sm-7">
                      <div class="row ml-2 border border-dark rounded">
                          <div class="col-sm-12" id="current-weather">
                              <h3 class="city-name mb-1 mt-2 bolder" id="current-city"></h3>
                              <p class="h3">Temperature:
                                <span class="fe fe-thermometer"></span>
                                <span class="current" id="temperature"></span>
                              </p>
                              <p class="h3">Humidity:
                                <span class="fe fe-trello"></span>
                                <span class="current" id="humidity"></span>
                              </p> 
                              <p class="h3">Wind Speed:
                                <span class="fe fe-wind"></span>
                                <span class="current" id="wind-speed"></span>
                              </p>
                              <p class="h3">UV index:
                                <span class="fe fe-sun"></span>
                                <span class="current bg-danger rounded py-2 px-2 text-white" id="uv-index"></span>
                              </p> 
                          </div>
                      </div>
                      <br>
                      <!--Row for future data to be dumped here-->
                      <div class="col-sm-12" id ="future-weather">
                          <h3>5-Day Forecast:</h3>
                          <div class="row text-light">
                              <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded" >
                                  <p id="fDate0"></p>
                                  <p id="fImg0"></p>
                                  <p>Temp:<span id="fTemp0"></span></p>
                                  <p>Humidity:<span id="fHumidity0"></span></p>
                              </div>
                              <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded" >
                                  <p id="fDate1"></p>
                                  <p id="fImg1"></p>
                                  <p>Temp:<span id="fTemp1"></span></p>
                                  <p>Humidity:<span id="fHumidity1"></span></p>
                              </div>
                              <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded">
                                  <p id="fDate2"></p>
                                  <p id="fImg2"></p>
                                  <p>Temp:<span id="fTemp2"></span></p>
                                  <p>Humidity:<span id="fHumidity2"></span></p>
                              </div>
                              <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded">
                                  <p id="fDate3"></p>
                                  <p id="fImg3"></p>
                                  <p>Temp:<span id="fTemp3"></span></p>
                                  <p>Humidity:<span id="fHumidity3"></span></p>
                              </div>
                              <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded" >
                                  <p id="fDate4"></p>
                                  <p id="fImg4"></p>
                                  <p>Temp:<span id="fTemp4"></span></p>
                                  <p>Humidity:<span id="fHumidity4"></span></p>
                              </div>
                          </div>
                      </div>

                    </div>
                  </div>
                </div>

              
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

    <!--Code to Jvascript File-->
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