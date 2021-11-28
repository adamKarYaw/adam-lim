<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once  __DIR__ . '/../accountModel/accountModel.php';

class accountController
{
    public function login()
    {
        $acc = new accountModel();
        $acc->username = $_POST['username'];
        $acc->userPwd = $_POST['userPwd'];
        $acc->active = 1;
        $record = $acc->login();
        if ($record->rowCount() == 1) {

            if ($acc->verify()>0) {
                session_start();
                foreach ($record as $selected) {
                    $_SESSION['userID'] = $selected['userID'];
            }
                $_SESSION["username"] = $_POST['username'];
                header("location: ../../ApplicationLayer/calendarView/calendar.php");
            }
            else{
                echo "<script>alert('Please activate your account');window.location.replace('../../ApplicationLayer/registrationView/login.php');</script>";
            }
            
        } else {
            echo "<script>alert('Wrong username or password');window.location.replace('../../ApplicationLayer/registrationView/login.php');</script>";
        }
    }

    public function register()
    {
        $user = new accountModel();
        $user->userID = $_POST['username'];
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->phone = $_POST['phone'];
        $user->userPwd = $_POST['userPwd'];
        $user->state = $_POST['state'];
        $user->hash = md5( rand(0,1000) );
        $user->active = 0;


        if ($user->checkUName() == 0) {
            
            if ($user->checkEmail() == 0) {
                 if ($user->register()){
                    require_once "../../PHPMailer/PHPMailer.php";
                    require_once "../../PHPMailer/SMTP.php";
                    require_once "../../PHPMailer/Exception.php";

                    $mail = new PHPMailer();

                    $mail->isSMTP();
                    $mail->Host =  "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "semtest98@gmail.com";
                    $mail->Password = "karwei98+";
                    $mail->Port = 465;
                    $mail->SMTPSecure = "ssl";
                            
                    $mail->isHTML(true);
                    $mail->addAddress($user->email);
                    $mail->setFrom("semtest98@gmail.com", "Mr/Mrs/Ms");
                    $mail->Subject = "Signup | Verification"; // Give the email a subject"

                    // set message
                    $mail->Body = "
                  
                    Thanks for signing up! <br>
                    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br>
                  
                    ------------------------<br>
                    Username: ".$_POST["username"]."<br>
                    Password: ".$_POST["userPwd"]."<br>
                    ------------------------ <br>
                  
                    Please click this link to activate your account: <br>
                    <a href='http://localhost/psm2/ApplicationLayer/registrationView/verify.php?email=$user->email&hash=$user->hash'>http://localhost/psm2/ApplicationLayer/registrationView/verify.php?email=$user->email&hash=$user->hash</a> <br>
                  
                    "; // Our message above including the link
                    
                    if ($mail->send())
                    { // Send our email
                      $message = 'Please verify your email address'; 
                    echo "<script type='text/javascript'>
                                      alert('$message');
                                      window.location.href=('http://localhost/psm2/ApplicationLayer/registrationView/login.php'); 
                                      </script>";
                    }

                }
                 
            }
            else{
                echo "<script>alert('Email is taken. Please try another email')</script>";
            }

        } else {
            echo "<script>alert('Username is taken. Please try another username')</script>";
        }
    }
    

    public function editAccount()
    {
        $user = new accountModel();
        $user->username = $_POST['username'];
        $user->phone = $_POST['phone'];
        $user->state = $_POST['state'];
        $user->userID = $_SESSION['userID'];

        $user->editAccount();
        echo "<script>alert('Updated Successfully')</script>";

        header("location: ../../ApplicationLayer/accountView/profile.php");
    }

    public function viewAccount()
    {
        session_start();
        $user = new accountModel();
        $user->userID = $_SESSION['userID'];
        return $user->viewAccount();
    }

    public function resetPassword(){
      $user = new accountModel();
      $user->email = $_POST['email'];
      if ($user->checkEmail() > 0){
        $token = "abcdefghijklmnopqrstuvwxyz0123456789";
        $token = str_shuffle($token);
        $user->token = substr($token,0,10);

      }

      if($user->addToken()){
        require_once "../../PHPMailer/PHPMailer.php";
        require_once "../../PHPMailer/SMTP.php";
        require_once "../../PHPMailer/Exception.php";

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host =  "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "semtest98@gmail.com";
        $mail->Password = "karwei98+";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
                            
        $mail->isHTML(true);
        $mail->addAddress($user->email);
        $mail->setFrom("semtest98@gmail.com", "Mr/Mrs/Ms");
        $mail->Subject = "Change Password | Verification"; // Give the email a subject"

        $mail->Body = "
  
        Account Registered with email below have requested for reset password.<br><br>
  
  
        In order to reset your passowrd, please click the link below:<br>
        <a href='http://localhost/psm2/ApplicationLayer/registrationView/resetPassword.php?email=$user->email&token=$user->token'>
        http://localhost/psm2/ApplicationLayer/registrationView/resetPassword.php?email=$user->email&token=$user->token
        </a>
        
  
        "; // Our message above including the link
                    

        if ($mail->send()){ // Send our email
          $message = 'Reset link has sent to your email. Please check your email inbox.'; 
          echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/psm2/ApplicationLayer/registrationView/login.php'); 
                      </script>";
                    }
                    else {
                      $message = 'Incorrect email! Please enter the correct email again';
                      echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/psm2/ApplicationLayer/registrationView/login.php'); 
                      </script>";
                    }
        }
    }

    public function setPassword($email, $token){
    $user = new accountModel();
    $user->email = $email;
    $user->token = $token;
    $user->tmpPass = $_POST['tmpPass'];

    if($user->setPassword() > 0){
      $message = 'Your Password is reset already.';
      echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/psm2/ApplicationLayer/registrationView/login.php'); 
                      </script>";
    }
    else{
        $message ='The reset link is expired. Please refer to the latest refer link.';
        echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/psm2/ApplicationLayer/registrationView/login.php'); 
                      </script>";
    }
  }

  public function changePassword(){
    $user = new accountModel();
    $user->newPass = $_POST['newPass'];
    $user->userPwd = $_POST['userPwd'];
    $user->userID = $_SESSION['userID'];

    if($user->changePassword() > 0){
      $message = 'Your Password is changed already.';
      echo "<script type='text/javascript'>
                      alert('$message');
                      </script>";
    }
    else{
       $message = 'Incorrect Password.';
      echo "<script type='text/javascript'>
                      alert('$message');
                      </script>"; 
    }
  }
}