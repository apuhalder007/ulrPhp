<?php 
session_start();
require_once(dirname(__FILE__)."/inc/userAuth.php");
require_once(dirname(__FILE__)."/inc/dbClass.php");
require_once(dirname(__FILE__)."/inc/modules/users.php");

//$user = new users();
$auth = new auth();
$userData = [
            "id" => 3,
            "username" => "sumandas",
            "password" => "admin",
            "firstname" => "Suman",
            "lastname" => "DAS",
            "email" => "test11@gmail.com"
        ];
$loginData = [
            "username" => "sumandas",
            "password" => "admin"
        ];

$results = $auth->login();
echo "<pre>";
print_r($results);
echo "</pre>";
?>