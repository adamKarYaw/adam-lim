<?php 

mysqli_query($connection,"UPDATE `events` set 
            `start` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 
            `end` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."' 
            where userID = '".mysqli_real_escape_string($connection,$userID)."' and id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        exit;

?>

<script type="text/javascript" src="../../src/plugin/fullcalendar/js/script.js"></script>