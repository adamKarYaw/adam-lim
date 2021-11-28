<?php
header('Content-Type: application/json');
        $start = mysqli_real_escape_string($connection,$_GET["start"]);
        $end = mysqli_real_escape_string($connection,$_GET["end"]);

        $result = mysqli_query($connection,"SELECT `id`, `start` ,`end` ,`title`,`description`,`location`,`eventType` FROM  `events` where (date(start) >= '$start' AND date(start) <= '$end') and userID='".$userID."'");
        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row; 
        }
        echo json_encode($events); 
        exit;

?>

<script type="text/javascript" src="../../src/plugin/fullcalendar/js/script.js"></script>