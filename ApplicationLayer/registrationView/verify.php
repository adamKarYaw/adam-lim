<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "psm2";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        $email = $_GET['email']; // Set email variable
        $hash = $_GET['hash']; // Set hash variable
        
        $sql = "SELECT email, hash, active FROM user WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $sql = "UPDATE user SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
            $conn->query($sql);
            $message = "Your account has been activated, you can now login";
            echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/registrationView/login.php';</script>";
        }else{
            // No match -> invalid url or account has already been activated.
            $message = "The url is either invalid or you already have activated your account.";
            echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/registrationView/login.php';</script>";
        }

    }else{
    // Invalid approach
        $message = "Invalid approach, please use the link that has been send to your email.";
        echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/registrationView/login.php';</script>";
    }
?>