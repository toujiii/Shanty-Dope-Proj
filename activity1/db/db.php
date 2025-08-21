<?php
    class myDB{
        private $servername="localhost";
        private $username="root";
        private $password="";
        private $dbname="oop";
        public $res;
        private $conn;

        public function __construct(){
            try{
                $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            } catch(Exception $e){
                die("Database connection error!. <br>" . $e);
            }
        }
        public function __destruct(){
            $this->conn->close(); 
        }

        public function insert($table,$data){
            try{
                $table_columns = implode(",", array_keys($data));
                $prep=$types="";
                foreach($data as $key => $value){
                    $prep .= "?,";
                    $types .= substr(gettype($value), 0, 1);
                }
                $prep = substr($prep, 0, -1);

                $stmt = $this->conn->prepare("INSERT INTO $table ($table_columns) VALUES ($prep)");
                $stmt->bind_param($types, ...array_values($data));
                $stmt->execute();
                $stmt->close();
            }catch(Exception $e){
                die("Error while inserting data!. <br>". $e);
            }
        }

        public function select($table,$row="*",$where=NULL){
            try{
                if(!is_null($where)){
                    $cond = $types = "";
                    foreach($where as $key => $value){
                        $cond .= "$key = ? AND ";
                        $types .= substr(gettype($value), 0, 1);
                    }
                    $cond = substr($cond, 0, -4);

                    $stmt = $this->conn->prepare("SELECT $row FROM $table WHERE $cond");
                    $stmt->bind_param($types, ...array_values($where));
                }else{
                    $stmt = $this->conn->prepare("SELECT $row FROM $table");
                }
                $stmt->execute();
                $this->res = $stmt->get_result();
            }catch(Exception $e){
                die("Error while selecting data!. <br>". $e);
            }
        }

        public function delete($table, $where){
            try{
                $cond = $types = "";
                foreach($where as $key => $value){
                    $cond .= "$key = ? AND ";
                    $types .= substr(gettype($value), 0, 1);
                }
                $cond = substr($cond, 0, -4);

                $stmt = $this->conn->prepare("DELETE FROM $table WHERE $cond");
                $stmt->bind_param($types, ...array_values($where));
                $stmt->execute();
                $stmt->close();
            }catch(Exception $e){
                die("Error while deleting data!. <br>". $e);
            }
        }

        public function update($table, $data, $where){
            try{
                $set = $set_types = "";
                foreach($data as $key => $value){
                    $set .= "$key = ?,";
                    $set_types .= substr(gettype($value), 0, 1);
                }
                $set = substr($set, 0, -1);

                $cond = $cond_types = "";
                foreach($where as $key => $value){
                    $cond .= "$key = ? AND ";
                    $cond_types .= substr(gettype($value), 0, 1);
                }
                $cond = substr($cond, 0, -4); 
                
                $types = $set_types . $cond_types;
                $values = array_merge(array_values($data), array_values($where));
                
                $stmt = $this->conn->prepare("UPDATE $table SET $set WHERE $cond");
                $stmt->bind_param($types, ...$values);
                $stmt->execute();
                $stmt->close();
            }catch(Exception $e){
                die("Error while updating data!. <br>". $e);
            }
        }
    }
?>