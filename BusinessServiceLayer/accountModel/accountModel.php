<?php
require_once '../../libs/database.php';

class accountModel
{
    public $userID, $username, $email, $phone, $userPwd, $state, $hash, $active, $token, $tmpPass, $newPass;

    function login()
    {
        $sql = "select * from user where username=:username and userPwd=:userPwd";

        $args = [':username' => $this->username, ':userPwd' => $this->userPwd];

        $result = DB::run($sql, $args);
        return $result;
    }


    function register()
    {
        $sql = "insert into user (username, email, phone, userPwd, state, hash, active) values (:username, :email, :phone, :userPwd, :state, :hash, :active)";

        $args = [':username' => $this->username, ':email' => $this->email, ':phone' => $this->phone, ':userPwd' => $this->userPwd, ':state' => $this->state, ':hash' => $this->hash, ':active' => $this->active];
        $result = DB::run($sql, $args);
        $count = $result->rowCount();
        return $count;
    }

    function verify()
    {
        $sql = "select * from user where username=:username and userPwd=:userPwd and active=:active";

        $args = [':username' => $this->username, ':userPwd' => $this->userPwd, ':active' => $this->active];

        $result = DB::run($sql, $args);
        $count = $result->rowCount();
        return $count;
    }


    public function checkUName()
    {
        $sql = "select * from user where username=:username";
        $args = [':username' => $this->username];
        $result = DB::run($sql, $args);
        $record = $result->rowCount();
        return $record;
    }

    public function checkEmail()
    {
        $sql = "select * from user where email=:email";
        $args = [':email' => $this->email];
        $result = DB::run($sql, $args);
        $record = $result->rowCount();
        return $record;
    }

    public function addToken(){
        $sql = "UPDATE user SET token=:token WHERE email=:email";
        $args = [':token'=>$this->token, ':email'=>$this->email];
        $result = DB::Run($sql, $args);
        $record = $result->rowCount();
        return $record;
    }
    
    public function setPassword(){
        $sql = "UPDATE user SET userPwd=:tmpPass WHERE token=:token and email=:email";
        $args = [':tmpPass'=>$this->tmpPass, ':token'=>$this->token, ':email'=>$this->email];
        $result = DB::Run($sql, $args);
        $record = $result->rowCount();
        return $record;
    }

    public function editAccount()
    {
        $sql = "update user set username=:username, phone=:phone, state=:state where userID=:userID";

        $args = [':username' => $this->username, ':phone' => $this->phone, ':state' => $this->state, ':userID' => $this->userID];
        return DB::run($sql, $args);
    }

    public function viewAccount()
    {
        $sql = "select * from user where userID =:userID";
        $args = [':userID' => $this->userID];
        return DB::run($sql, $args);
    }

    public function changePassword(){
        $sql = "UPDATE user SET userPwd=:newPass WHERE userID=:userID and userPwd=:userPwd";
        $args = [':newPass'=>$this->newPass, ':userID'=>$this->userID, ':userPwd'=>$this->userPwd];
        $result = DB::Run($sql, $args);
        $record = $result->rowCount();
        return $record;
    }
}