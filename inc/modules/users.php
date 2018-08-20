<?php
require_once(dirname(__DIR__)."/dbClass.php");
require_once(dirname(__DIR__)."/utilities.php");
class users{
    private $db;
    private $user_tbl;
    function __construct(){
        $this->user_tbl = "users";
         $this->db = new db();
    }
    function all_users(){
        $sql = "SELECT * FROM ".$this->user_tbl."";
        return $result = $this->db->selectQuery($sql);
    }

    function single_user($userID){
        $sql = "SELECT * FROM ".$this->user_tbl." WHERE id = ".$userID;
        return $this->db->selectQuery($sql);
    }

    function register_user($userData = array()){
        $utilities = new utilities();
        if(count($userData) < 1) return "Invalid inputs!";
        $password = $utilities->hash_pass($loginData['password']);
        $userData['password'] = $this->hash_pass($userData['password']);
        $fields = array_keys($userData);
        $fields = implode(",", $fields);
        $values = "'".implode("','", $userData) ."'";

        $sql = "INSERT INTO ".$this->user_tbl."($fields) VALUES($values)";
        return $this->db->insertUpdateDeleteQuery($sql);
    }

    function edit_user($userData){
        $utilities = new utilities();
        if(count($userData) < 1 || !isset($userData['id']) ) return "Invalid inputs!";
        if($userData['password']){
            $userData['password'] = $utilities->hash_pass($userData['password']);
        }
        $userId = $userData['id'];
        unset($userData['id']);
        $values = '';
        foreach($userData as $key => $value){
            $values .= "$key = '".$value."', ";
        }
        $values = rtrim(trim($values), ',');
        $sql = "UPDATE ". $this->user_tbl ." set $values WHERE id = ".$userId;

        return $this->db->insertUpdateDeleteQuery($sql);
    }

    function delete_uesr($id){
       
        $sql = "DELETE FROM ".$this->user_tbl." WHERE id = $id";
        return $this->db->insertUpdateDeleteQuery($sql);
    }
}
?>