<?php
class connection{
private $hostname;
private $username;
private $password;
private $dbname;
public $conn;
protected function connect(){
    $this->hostname = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "lokeshwarfashionhouse";


    $conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

    return $conn;

    if($conn){
        // echo "connected";

    }else{
        echo "not connected for this error =>" . $conn->connect_error();
    }


}

}



// new connection;




?>