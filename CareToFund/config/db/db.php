<?php 
    class myDB{
        private $servername="localhost";
        private $username="root";
        private $password="";
        private $dbname="care_to_fund";
        public $res;
        private $conn;

        public function __construct(){
            try{
                $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            } catch(Exception $e){
                die("Database connection error!. <br>" . $e);
            }
        }
        public function getConnection() {
                return $this->conn;
            }

        public function __destruct(){
            $this->conn->close(); 
        }

    }
?>