<?php

namespace CareToFund\Models;

require __DIR__ . '/../../config/db/db.php';

class Crud
{
    private $db;
    private $conn;
    private $table;

    public function __construct($table)
    {
        $this->db = new \myDB();
        $this->conn = $this->db->getConnection();
        $this->table = $table;
    }

    public function create(array $data)
    {
        $columns = implode(',', array_keys($data));
        $values = "'" . implode("','", array_map([$this->conn, 'real_escape_string'], array_values($data))) . "'";
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
        return $this->conn->query($sql);
    }


    public function select($row = "*", $where = NULL, $orderBy = NULL, $orderDir = "ASC", $limit = NULL, $like = NULL)
    {
        try {
            $sql = "SELECT $row FROM {$this->table}";
            $params = [];
            $types = "";

            // WHERE 
            if (!is_null($where) && count($where) > 0) {
                $condArr = [];
                foreach ($where as $key => $value) {
                    if (is_null($value)) {
                        $condArr[] = "$key IS NULL";
                    } else {
                        $condArr[] = "$key = ?";
                        $types .= substr(gettype($value), 0, 1);
                        $params[] = $value;
                    }
                }
                $cond = implode(' AND ', $condArr);
                $sql .= " WHERE $cond";
            }

            // ORDER BY 
            if (!is_null($orderBy)) {
                $orderDir = strtoupper($orderDir) === "DESC" ? "DESC" : "ASC";
                $sql .= " ORDER BY $orderBy $orderDir";
            }

            // LIMIT 
            if (!is_null($limit) && is_numeric($limit)) {
                $sql .= " LIMIT $limit";
            }

            // LIKE 
            if (!is_null($like) && count($like) > 0) {
                $likeArr = [];
                foreach ($like as $key => $value) {
                    $likeArr[] = "$key LIKE ?";
                    $types .= "s";
                    $params[] = "%$value%";
                }
                $likeCond = implode(' OR ', $likeArr);
                $sql .= is_null($where) ? " WHERE " : " AND ";
                $sql .= "($likeCond)";
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

    public function update($data, $where)
    {
        try {
            $set = $set_types = "";
            foreach ($data as $key => $value) {
                $set .= "$key = ?,";
                $set_types .= substr(gettype($value), 0, 1);
            }
            $set = substr($set, 0, -1);

            $cond = $cond_types = "";
            foreach ($where as $key => $value) {
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
            return true;
        } catch (\Exception $e) {
            die("Error while updating data!. <br>" . $e);
        }
    }

    // Delete
    public function delete($where)
    {
        try {
            $cond = $types = "";
            foreach ($where as $key => $value) {
                $cond .= "$key = ? AND ";
                $types .= substr(gettype($value), 0, 1);
            }
            $cond = substr($cond, 0, -4);

            $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE $cond");
            $stmt->bind_param($types, ...array_values($where));
            $stmt->execute();
            $stmt->close();
            return true;
        } catch (\Exception $e) {
            die("Error while deleting data!. <br>" . $e);
        }
    }

    // Find user by email
    public function readByEmail($email)
    {
        $email = $this->conn->real_escape_string($email);
        $sql = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }

    public function join($table, $on, $where = [], $orderBy = NULL, $orderDir = "ASC", $limit = NULL, $like = [])
    {
        try {
            $sql = "SELECT * FROM {$this->table} INNER JOIN $table ON $on";
            $params = [];
            $types = "";


            $cond = [];
            if (!empty($where)) {
                foreach ($where as $key => $value) {
                    $cond[] = "$key = ?";
                    $types .= substr(gettype($value), 0, 1);
                    $params[] = $value;
                }
            }

            $likeCond = [];
            if (!empty($like)) {
                foreach ($like as $key => $value) {
                    $likeCond[] = "$key LIKE ?";
                    $types .= "s";
                    $params[] = "%$value%";
                }
            }

            if (!empty($likeCond)) {
                $cond[] = '(' . implode(' OR ', $likeCond) . ')';
            }

            if (!empty($cond)) {
                $sql .= " WHERE " . implode(" AND ", $cond);
            }

            // ORDER BY
            if (!is_null($orderBy)) {
                if (stripos($orderBy, 'asc') !== false || stripos($orderBy, 'desc') !== false) {
                    $sql .= " ORDER BY $orderBy";
                } else {
                    $orderDir = strtoupper($orderDir) === "DESC" ? "DESC" : "ASC";
                    $sql .= " ORDER BY $orderBy $orderDir";
                }
            }

            // LIMIT 
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
            die("Error while joining tables with where!. <br>" . $e);
        }
    }
}
