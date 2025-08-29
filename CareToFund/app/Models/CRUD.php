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

    public function select($row = "*", $where = NULL, $orderBy = NULL, $orderDir = "ASC", $limit = NULL) {
        try {
            $sql = "SELECT $row FROM {$this->table}";
            $params = [];
            $types = "";

            // WHERE clause
            if (!is_null($where) && count($where) > 0) {
                $cond = "";
                foreach ($where as $key => $value) {
                    $cond .= "$key = ? AND ";
                    $types .= substr(gettype($value), 0, 1);
                    $params[] = $value;
                }
                $cond = substr($cond, 0, -4);
                $sql .= " WHERE $cond";
            }

            // ORDER BY clause
            if (!is_null($orderBy)) {
                $orderDir = strtoupper($orderDir) === "DESC" ? "DESC" : "ASC";
                $sql .= " ORDER BY $orderBy $orderDir";
            }

            // LIMIT clause
            if (!is_null($limit) && is_numeric($limit)) {
                $sql .= " LIMIT $limit";
            }

            $stmt = $this->conn->prepare($sql);

            if (!empty($params)) {
                $stmt->bind_param($types, ...$params);
            }

            $stmt->execute();
            $result = $stmt->get_result();
            if ($result && $result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
            return [];
        } catch (\Exception $e) {
            die("Error while selecting data!. <br>" . $e);
        }
    }

    // Update
    // public function update($id, array $data) {
    //     $id = $this->conn->real_escape_string($id);
    //     $fields = [];
    //     foreach ($data as $key => $value) {
    //         $fields[] = "$key = '" . $this->conn->real_escape_string($value) . "'";
    //     }
    //     $fields_str = implode(', ', $fields);
    //     $sql = "UPDATE {$this->table} SET $fields_str WHERE id = '$id'";
    //     return $this->conn->query($sql);
    // }
    public function update($data, $where){
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

            $stmt = $this->conn->prepare("UPDATE {$this->table} SET $set WHERE $cond");
            $stmt->bind_param($types, ...$values);
            $stmt->execute();
            $stmt->close();
        }catch(\Exception $e){
            die("Error while updating data!. <br>". $e);
        }
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

    public function join($table, $on, $where = []) {
    try {
        $sql = "SELECT * FROM {$this->table} INNER JOIN $table ON $on";
        $params = [];
        $types = "";

        if (!empty($where)) {
            $cond = "";
            foreach ($where as $key => $value) {
                $cond .= "$key = ? AND ";
                $types .= substr(gettype($value), 0, 1);
                $params[] = $value;
            }
            $cond = substr($cond, 0, -4);
            $sql .= " WHERE $cond";
        }

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    } catch (\Exception $e) {
        die("Error while joining tables with where!. <br>" . $e);
    }
}
}
?>