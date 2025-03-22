<?php
// This file holds the database object that allows php to communicate with the mySQL database 
// This is an API, so simply use include_once 'database.php' to import this file and use the Database object to  perform CRUD operation to mySQL database 

class DatabaseClient { 
    
    // Retrieve all records from a table, optionally filtering by conditions
    public function query_all(string $table, array $condition = null) { 
        $conn = $this->connect_to_DB();
        $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table); // Prevent SQL injection
        
        try {
            $sql = is_null($condition) ? "SELECT * FROM $table"
                                       : "SELECT * FROM $table WHERE " . implode(" AND ", $condition);
            
            $sql_stmt = $conn->query($sql);

            if ($sql_stmt == false) { 
                throw new Exception("Query failed! " . $conn->errorInfo());
            }
            return $sql_stmt; // Avoiding fetchAll to allow flexibility in user fetching
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Retrieve specific entries from a table with optional conditions
    public function query(string $entry, string $table, array $condition = null) {
        $conn = $this->connect_to_DB();
        $entry = preg_replace('/[^a-zA-Z0-9_]/', '', $entry);
        $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
        
        try {
            $sql = is_null($condition) ? "SELECT $entry FROM $table"
                                       : "SELECT $entry FROM $table WHERE " . implode(" AND ", $condition);
            
            $sql_stmt = $conn->query($sql);
            if ($sql_stmt === false) { 
                throw new Exception("Query failed! " . implode(", ", $conn->errorInfo()));
            }
            return $sql_stmt; // Avoiding fetchAll for flexibility
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Insert a new record into a table
    public function insertIntoTable(string $table, array $data) {
        $conn = $this->connect_to_DB();
        try { 
            $columns = implode(", ", array_keys($data));
            $placeholders = implode(", ", array_fill(0, count($data), "?"));
            $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

            $stmt = $conn->prepare($sql);
            $stmt->execute(array_values($data));

            return $conn->lastInsertId(); // Return last inserted ID
        } catch (PDOException $e) {
            echo "Error inserting into $table: " . $e->getMessage();
            return false;
        }
    }

    // Update an existing record in a table
    public function updateTable(string $table, array $data, array $condition) {
        $conn = $this->connect_to_DB();
        try {
            $set_clause = implode(", ", array_map(fn($key) => "$key = ?", array_keys($data)));
            $where_clause = implode(" AND ", $condition);
            $sql = "UPDATE $table SET $set_clause WHERE $where_clause";

            $stmt = $conn->prepare($sql);
            $stmt->execute(array_values($data));

            return $stmt->rowCount(); // Return number of affected rows
        } catch (PDOException $e) {
            echo "Error updating $table: " . $e->getMessage();
            return false;
        }
    }

    // Delete a record from a table
    public function deleteFromTable(string $table, array $condition) {
        $conn = $this->connect_to_DB();
        try {
            $where_clause = implode(" AND ", $condition);
            $sql = "DELETE FROM $table WHERE $where_clause";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->rowCount(); // Return number of deleted rows
        } catch (PDOException $e) {
            echo "Error deleting from $table: " . $e->getMessage();
            return false;
        }
    }

    // Execute a custom SQL command (For development use only)
    public function customSQLcommand($sql_statement) { 
        $conn = $this->connect_to_DB(); 
        echo $conn->query($sql_statement)->fetchColumn(); 
    }

    // Internal function to establish a database connection
    private function connect_to_DB() {
        require __DIR__ . "/../../config.php"; // Import database credentials
        $db_connection_string = "mysql:host=$host;dbname=$db;charset=UTF8";
  
        try { 
            $pdo = new PDO($db_connection_string, $user, $password); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) { 
            echo "Failed to connect to DB: " . $e->getMessage(); 
            exit;
        }
    }
}
?>
