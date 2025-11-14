<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Database Connection
 * MySQLi Connection Class
 * ========================================
 */

class Database {
    // Database credentials
    private $host = 'localhost';
    private $user = 'nrrskfvk_user_situneo_digital';
    private $pass = 'Devin1922$';
    private $dbname = 'nrrskfvk_situneo_digital';

    // Connection
    private $conn;
    private $error;

    /**
     * Constructor - Auto connect to database
     */
    public function __construct() {
        $this->connect();
    }

    /**
     * Connect to MySQL database
     *
     * @return bool Connection status
     */
    private function connect() {
        // Create connection
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            $this->error = "Connection failed: " . $this->conn->connect_error;
            return false;
        }

        // Set charset to UTF-8
        $this->conn->set_charset("utf8mb4");

        return true;
    }

    /**
     * Get connection object
     *
     * @return mysqli Connection object
     */
    public function getConnection() {
        return $this->conn;
    }

    /**
     * Execute query (SELECT, INSERT, UPDATE, DELETE)
     *
     * @param string $sql SQL query
     * @return mixed Query result or false
     */
    public function query($sql) {
        $result = $this->conn->query($sql);

        if (!$result) {
            $this->error = "Query error: " . $this->conn->error;
            return false;
        }

        return $result;
    }

    /**
     * Prepare SQL statement
     *
     * @param string $sql SQL query with placeholders
     * @return mysqli_stmt Prepared statement
     */
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    /**
     * Escape string to prevent SQL injection
     *
     * @param string $str String to escape
     * @return string Escaped string
     */
    public function escape($str) {
        return $this->conn->real_escape_string($str);
    }

    /**
     * Get last inserted ID
     *
     * @return int Last insert ID
     */
    public function lastInsertId() {
        return $this->conn->insert_id;
    }

    /**
     * Get affected rows from last query
     *
     * @return int Number of affected rows
     */
    public function affectedRows() {
        return $this->conn->affected_rows;
    }

    /**
     * Fetch single row as associative array
     *
     * @param string $sql SQL query
     * @return array|null Single row or null
     */
    public function fetchOne($sql) {
        $result = $this->query($sql);

        if (!$result) {
            return null;
        }

        return $result->fetch_assoc();
    }

    /**
     * Fetch all rows as associative array
     *
     * @param string $sql SQL query
     * @return array Array of rows
     */
    public function fetchAll($sql) {
        $result = $this->query($sql);

        if (!$result) {
            return [];
        }

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    /**
     * Insert data into table
     *
     * @param string $table Table name
     * @param array $data Associative array of column => value
     * @return bool Success status
     */
    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_map([$this, 'escape'], array_values($data))) . "'";

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

        return $this->query($sql) !== false;
    }

    /**
     * Update data in table
     *
     * @param string $table Table name
     * @param array $data Associative array of column => value
     * @param string $where WHERE clause (without WHERE keyword)
     * @return bool Success status
     */
    public function update($table, $data, $where) {
        $set = [];
        foreach ($data as $column => $value) {
            $set[] = "{$column} = '" . $this->escape($value) . "'";
        }
        $set = implode(', ', $set);

        $sql = "UPDATE {$table} SET {$set} WHERE {$where}";

        return $this->query($sql) !== false;
    }

    /**
     * Delete data from table
     *
     * @param string $table Table name
     * @param string $where WHERE clause (without WHERE keyword)
     * @return bool Success status
     */
    public function delete($table, $where) {
        $sql = "DELETE FROM {$table} WHERE {$where}";

        return $this->query($sql) !== false;
    }

    /**
     * Get error message
     *
     * @return string Error message
     */
    public function getError() {
        return $this->error;
    }

    /**
     * Check if connection is alive
     *
     * @return bool Connection status
     */
    public function isConnected() {
        return $this->conn && $this->conn->ping();
    }

    /**
     * Close database connection
     */
    public function close() {
        if ($this->conn && $this->conn instanceof mysqli) {
            $this->conn->close();
            $this->conn = null;
        }
    }

    /**
     * Destructor - Auto close connection
     */
    public function __destruct() {
        $this->close();
    }
}

// Create global database instance
$db = new Database();
$conn = $db->getConnection();
?>
