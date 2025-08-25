<?php
namespace CareToFund\Models;
require __DIR__ . '/../../config/db/db.php';

class Crud {
    private $db;
    private $conn;
    private $table;

    public function __construct($table) {
        $this->db = new \myDB();
        $this->conn = $this->db->getConnection();
        $this->table = $table;
    }
    // Create
    public function create(array $data) {
        $columns = implode(',', array_keys($data));
        $values = "'" . implode("','", array_map([$this->conn, 'real_escape_string'], array_values($data))) . "'";
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
        return $this->conn->query($sql);
    }

    // Read
    // public function read($id) {
    //     $id = $this->conn->real_escape_string($id);
    //     $sql = "SELECT * FROM {$this->table} WHERE id = '$id'";
    //     $result = $this->conn->query($sql);
    //     return $result ? $result->fetch_assoc() : null;
    // }

    public function select($row="*",$where=NULL){
        try{
            if(!is_null($where)){
                $cond = $types = "";
                foreach($where as $key => $value){
                    $cond .= "$key = ? AND ";
                    $types .= substr(gettype($value), 0, 1);
                }
                $cond = substr($cond, 0, -4);

                $stmt = $this->conn->prepare("SELECT $row FROM {$this->table} WHERE $cond");
                $stmt->bind_param($types, ...array_values($where));
            }else{
                $stmt = $this->conn->prepare("SELECT $row FROM {$this->table}");
            }
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result && $result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC); 
            }
            return [];
        }catch(\Exception $e){
            die("Error while selecting data!. <br>". $e);
        }
    }

    // Update
    public function update($id, array $data) {
        $id = $this->conn->real_escape_string($id);
        $fields = [];
        foreach ($data as $key => $value) {
            $fields[] = "$key = '" . $this->conn->real_escape_string($value) . "'";
        }
        $fields_str = implode(', ', $fields);
        $sql = "UPDATE {$this->table} SET $fields_str WHERE id = '$id'";
        return $this->conn->query($sql);
    }

    // Delete
    public function delete($id) {
        $id = $this->conn->real_escape_string($id);
        $sql = "DELETE FROM {$this->table} WHERE id = '$id'";
        return $this->conn->query($sql);
    }
    
    // Find user by email
    public function readByEmail($email) {
        $email = $this->conn->real_escape_string($email);
        $sql = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }
}
?>