<?php

class Database
{

    private $db_host = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "portfolioDB";


    private $mysqli = null;
    // private $result = array();
    private $result = [];
    private $conn = false;

    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
            }
            $this->conn = true;
        }
    }

    public function insert($table, $params = [])
    {
        // Check to see if the table exists
        if ($this->tableExists($table)) {  // Corrected this line

            // Assuming you want to dynamically build the SQL query based on $params
            $columns = implode(", ", array_keys($params));
            $values = implode("', '", array_values($params));

            $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
            // Make the query to insert data into the database
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true; // Insert successful
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // Insert failed
            }
        } else {
            return false; // Table does not exist
        }
    }



    // function to update row in the database
    public function update($table, $params = [], $where = null)
    {
        // Check to see if the table exists
        if ($this->tableExists($table)) {
            // Assuming you want to dynamically build the SQL query based on $params
            $args = [];
            foreach ($params as $key => $value) {
                $args[] = "$key = '$value'";
            }
            // Execute the query
            $sql = "UPDATE $table SET " . implode(", ", $args);
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            // Make the query to update data into the database
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true; // Update successful
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // Update failed
            }
        } else {
            return false;
        }

    }

    // function to delete row in the database
    public function delete($table, $where = null)
    {
        // Check to see if the table exists
        if ($this->tableExists($table)) {
            // Execute the query
            $sql = "DELETE FROM $table";
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            // Make the query to delete data into the database
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true; // Delete successful
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // Delete failed
            }
        } else {
            return false;
        }
    }

    // function to select row in the database
    public function select($table, $row = "*", $join = null, $where = null, $order = null, $limit = null)
    {

        // Check to see if the table exists
        if ($this->tableExists($table)) {
            $sql = "SELECT $row FROM $table";
            if ($join != null) {
                $sql .= " JOIN $join";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            if ($order != null) {
                $sql .= " ORDER BY $order";
            }
            if ($limit != null) {
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start,$limit";
            }

            // echo $sql;

            $query = $this->mysqli->query($sql);
            if ($query) {
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            } else {
                array_push($this->result, "Table $table does not exist");
                return false;
            }
        } else {
            return false;
        }

    }

    public function pagination($table, $join = null, $where = null, $limit = null)
    {

        // Check to see if the table exists
        if ($this->tableExists($table)) {
            $sql = "SELECT count(*) FROM $table";
            if ($join != null) {
                $sql .= " JOIN $join";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }

            $query = $this->mysqli->query($sql);

            $total_record = $query->fetch_array();
            $total_record = $total_record[0];

            $total_page = ceil($total_record / $limit);

            $url = basename($_SERVER['PHP_SELF']);

            $page = $_GET['page'] ?? 1;
            // $page = isset($_GET['page']) ? $_GET['page'] : 1;

            $output = '<ul class="pagination">';

            if ($page > 1) {
                $prev = $page - 1;
                $output .= "<li class='page-item'><a class='page-link' href='{$url}?page={$prev}'>Previous</a></li>";
            }

            for ($i = 1; $i <= $total_page; $i++) {
                $cls = ($i == $page) ? 'active' : '';
                $output .= "<li class='page-item'><a class='page-link {$cls}' href='{$url}?page={$i}'>{$i}</a></li>";
            }

            if ($page < $total_page) {
                $next = $page + 1;
                $output .= "<li class='page-item'><a class='page-link' href='{$url}?page={$next}'>Next</a></li>";
            }

            $output .= '</ul>';
            echo $output;




        } else {
            return false;
        }

    }

    public function sql($sql)
    {
        $query = $this->mysqli->query($sql);

        if ($query) {
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        } else {
            array_push($this->result, $this->mysqli->error);
            return false;
        }

    }

    public function getMysqli()
    {
        return $this->mysqli;
    }

    public function getUserId($username) {
        $query = "SELECT `uID` FROM `users` WHERE `username` = ?";
        $stmt = $this->getMysqli()->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['uID'];
    }

    

    private function tableExists($table)
    {
        // Check to see if the table exists
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb = $this->mysqli->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows > 0) {
                return true;
            } else {
                array_push($this->result, "Table $table does not exist");
                return false;
            }
        }
    }

    public function getResult()
    {
        // Return the result
        $val = $this->result;
        $this->result = [];
        return $val;
    }

    // close connection
    public function __destruct()
    {
        // Close the connection
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
            }
        }
    }



}