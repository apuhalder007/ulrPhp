<?php 
require_once(dirname(__FILE__)."/dbClass.php");
require_once(dirname(__FILE__)."/utilities.php");
class auth{
    private $db;
    private $user_tbl;
    function __construct(){
        $this->user_tbl = "users";
         $this->db = new db();
    }

    function login($loginData){
        $utilities = new utilities();
        $password = $utilities->hash_pass($loginData['password']);
        $sql = "SELECT * FROM ".$this->user_tbl." 
                WHERE username = '".$loginData['username']."' 
                AND password = '".$password."'
                ";
        $result = $this->db->selectQuery($sql);
        if(count($result) > 0){
            $utilities->save_session($result[0]);
        }else{
            echo "Invalid username or password";
        }
    }

    function logout(){
        session_start();
        unset($_SESSION['user']);
    }

}
?>