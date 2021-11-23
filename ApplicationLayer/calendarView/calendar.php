<?php
session_start();
include("../../libs/database.php");

$userID = $_SESSION['userID'];  // set your user id settings
$datetime_string = date('c',time()); 

if (!isset($_SESSION['userID'])){
    header("location: ../../index.php");
}   
    
if(isset($_POST['action']) or isset($_GET['view']))
{
    if(isset($_GET['view']))
    {
        header('Content-Type: application/json');
        $start = mysqli_real_escape_string($connection,$_GET["start"]);
        $end = mysqli_real_escape_string($connection,$_GET["end"]);

        $result = mysqli_query($connection,"SELECT `id`, `start` ,`end` ,`title`,`description` FROM  `events` where (date(start) >= '$start' AND date(start) <= '$end') and userID='".$userID."'");
        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row; 
        }
        echo json_encode($events); 
        exit;
    }
    elseif($_POST['action'] == "add")
    {   
        mysqli_query($connection,"INSERT INTO `events` (
                    `title` ,
                    `description` ,
                    `start` ,
                    `end` ,
                    `userID` 
                    )
                    VALUES (
                    '".mysqli_real_escape_string($connection,$_POST["title"])."',
                    '".mysqli_real_escape_string($connection,$_POST["description"])."',
                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."',
                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."',
                    '".mysqli_real_escape_string($connection,$userID)."'
                    )");
        header('Content-Type: application/json');
        echo '{"id":"'.mysqli_insert_id($connection).'"}';
        exit;
    }
    elseif($_POST['action'] == "update")
    {
        mysqli_query($connection,"UPDATE `events` set 
            `start` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 
            `end` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."' 
            where userID = '".mysqli_real_escape_string($connection,$userID)."' and id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        exit;
    }
    elseif($_POST['action'] == "delete") 
    {
        mysqli_query($connection,"DELETE from `events` where userID = '".mysqli_real_escape_string($connection,$userID)."' and id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        if (mysqli_affected_rows($connection) > 0) {
            echo "1";
        }
        exit;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Calendar</title>
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


  <body class="vertical">
    <div class="wrapper">
      <?php include ("../../include/topNav.php"); ?>
      <?php include ("../../include/sideNav.php"); ?>

      <main role="main" class="main-content">
        <div class="contain-fluid">
          <div class="row justify-content-center">
            <div class="col-11">
              
              <!-- Weather Widget -->
              <a class="weatherwidget-io" href="https://forecast7.com/en/3d49103d39/pekan/" data-label_1="PEKAN" data-label_2=" WEATHER" data-icons="Climacons Animated" data-days="5" data-theme="original" >PEKAN WEATHER</a>
                <script>
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                </script> <!-- Weather Widget End -->

              <div class="row align-items-center my-3">
                <div class="col">
                  <h2 class="page-title">Calendar</h2>
                  <div class="row justify-content-center">
                    <!-- add calander in this div -->
                    <div id="calendar"></div>
                  </div>
                </div>
              </div>
            </div><!-- .col-12 -->
          </div><!-- row -->
        </div><!-- contain-fluid -->
      </main><!-- main -->


    </div><!-- wrapper -->
    
      

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="../../j/js/script.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >

<link href="../../src/plugin/fullcalendar/css/fullcalendar.css" rel="stylesheet" />
<link href="../../src/plugin/fullcalendar/css/fullcalendar.print.css" rel="stylesheet" media="print" />
<script src="../../src/plugin/fullcalendar/js/moment.min.js"></script>
<script src="../../src/plugin/fullcalendar/js/fullcalendar.js"></script>


<!-- Add Event Modal -->
<div id="createEventModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Add Event Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Event</h4>
      </div>
      <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="inputPatient">Event:</label>
                <div class="field desc">
                    <input class="form-control" id="title" name="title" placeholder="Event" type="text" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPatient">Description:</label>
                <div class="field desc">
                    <input class="form-control" id="description" name="description" placeholder="Description" type="text" value="">
                </div>
            </div>


            
            <input type="hidden" class="form-control" id="startTime"/>
            <input type="hidden" class="form-control" id="endTime"/>
            
            
       
        <div class="control-group">
            <label class="control-label" for="when">When:</label>
            <div class="controls controls-row" id="when" style="margin-top:5px;">
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
    </div>
    </div>

  </div>
</div>

 <!-- Event Modal -->
<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Event Details</h4>
        </div>
        <div id="modalBody" class="modal-body">
          <label class="control-label" for="inputPatient">Event:</label>
        <h4 id="modalTitle" class="modal-title"></h4>
          <label class="control-label" for="inputPatient">Description:</label>
        <h4 id="modalDescription" class="modal-title"></h4>
        <div id="modalWhen" style="margin-top:5px;"></div>
        </div>
        <input type="hidden" id="eventID"/>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
        </div>
    </div>
</div>
</div>
<!--Modal-->



<div style='margin-left: auto;margin-right: auto;text-align: center;'>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-21769945-4', 'auto');
  ga('send', 'pageview');

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