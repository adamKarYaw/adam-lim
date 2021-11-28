<?php  
mysqli_query($connection,"INSERT INTO `events` (
                    `title` ,
                    `description` ,
                    `location`,
                    `eventType`,
                    `start` ,
                    `end` ,
                    `userID` 
                    )
                    VALUES (
                    '".mysqli_real_escape_string($connection,$_POST["title"])."',
                    '".mysqli_real_escape_string($connection,$_POST["description"])."',
                    '".mysqli_real_escape_string($connection,$_POST["location"])."',
                    '".mysqli_real_escape_string($connection,$_POST["eventType"])."',
                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."',
                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."',
                    '".mysqli_real_escape_string($connection,$userID)."'
                    )");
        header('Content-Type: application/json');
        echo '{"id":"'.mysqli_insert_id($connection).'"}';
        exit;

?>

<script type="text/javascript" src="../../src/plugin/fullcalendar/js/script.js"></script>