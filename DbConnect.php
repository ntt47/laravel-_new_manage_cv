<?php

    class Connection {

       protected $servername = "localhost";
       protected $username = "root";
       protected $password = "";
       protected $dbname= "manage_cv_new";
       protected $conn = null;

        public function __construct(){
           try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        }
       
    }

?>