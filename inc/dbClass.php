<?php 
require_once(dirname(__FILE__)."/config.php");
Class db{
    private $con;
    function __construct(){
        $this->con = $this->connection();
    }
    function connection(){
        return mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    }

    function selectQuery($sql){
        $results = [];
        $query = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($query)){
            $results[] = $row;
        }
        return $results;
    }

    function insertUpdateDeleteQuery($sql){
        $query = mysqli_query($this->con, $sql);

        return  $query;
    }

}

?>