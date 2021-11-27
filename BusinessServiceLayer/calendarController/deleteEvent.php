<?php
mysqli_query($connection,"DELETE from `events` where userID = '".mysqli_real_escape_string($connection,$userID)."' and id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        if (mysqli_affected_rows($connection) > 0) {
            echo "1";
        }
        exit;


?>
<script type="text/javascript" src="../../src/plugin/fullcalendar/js/script.js"></script>