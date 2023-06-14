<?php
class connect{
    private $db_hostname;
    private $db_username;
    private $db_password;
    private $dbname;

    protected function db_connect(){
        $this->db_hostname = "localhost";
        $this->db_username = "root";
        $this->db_password = "";
        $this->dbname = "lokbanksys";

        $conn = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->dbname);

        // if($this->conn)
if(mysqli_connect_error()){
    echo 'connnection failed';
}else{
    // echo 'connected';
}


        // return $status =  $conn;

        return $conn;



    }



}





?>