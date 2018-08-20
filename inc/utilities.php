<?php 
require_once(dirname(__FILE__)."/config.php");
class utilities{
    function __construct(){

    }

    function hash_pass($pass = null){
        if(empty($pass)) return '';
        $saltStr = $pass.SALTKEY;
        return sha1($saltStr);
    }

    function save_session($userData){
        session_start();
        $_SESSION['user'] = [
            "username" => $userData['username'],
            "firstname" => $userData['firstname'],
            "lastname" => $userData['lastname'],
            "login" => true 
        ];
    }

}
?>