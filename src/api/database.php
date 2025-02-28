<?php
// This file holds the database object that allows php to communicate with the mySQL database 
// This is an API, so simply use require 'database.php' to import this file and use the Database object to  perform CRUD operation to mySQL database 


class DatabaseClient { 
    
    // TODO allow for multiple entries by passing in array of strings
    public function query_all( string $table, array $condition = null ) { 
        $conn = $this->connect_to_DB();
        // Filter the possible names to prevent SQL injection 
        $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
        
        try {
            $sql = is_null($condition) ? "SELECT * FROM $table" // Condition is null, so dont add WHERE statement
                                       : "SELECT * FROM $table WHERE " . implode(" AND ", $condition);
            
            echo "SQL Statement: $sql\n\n"; //debugging 
            
            $sql_stmt = $conn->query( $sql );

            if ($sql_stmt == false) { 
                throw new Exception("Query failed! " . conn->errorInfo() );
            }
            return $sql_stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    // Runs a Select SQL statement
    // entry = Table attribute that you want to select,
    // condition = statement after WHERE for filtering. If not given, assume no condition to filter for   
    // TODO allow for multiple entries by passing in array of strings
    public function query(string $entry, string $table, array $condition = null ) {
        $conn = $this->connect_to_DB();
        // Filter the possible names to prevent SQL injection 
        $entity = preg_replace('/[^a-zA-Z0-9_]/', '', $entry);
        $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
        
        try {
            $sql = is_null($condition) ? "SELECT $entry FROM $table" // Condition is null, so dont add WHERE statement
                                       : "SELECT $entry FROM $table WHERE " . implode(" AND ", $condition);
            
            //echo "SQL Statement: $sql\n\n"; //debugging 
            
            $sql_stmt = $conn->query( $sql );

            if ($sql_stmt == false) { 
                throw new Exception("Query failed! " . conn->errorInfo() );
            }
            return $sql_stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }

    }


    // Give it a custom SQL command and it will execute it 
    // Only for development use - remove for production use
    public function customSQLcommand( $sql_statement ) { 
        $conn = $this->connect_to_DB(); 

       echo $conn->query( $sql_statement )->fetchColumn(); 
    }

    // Generic Insert function. Specify table name and the data 
    // NOTE PHP does not have a way for me to enforce validity check of data 
    // like React has with type interface, so for now, we will just assume 
    // the data is good and rely on mySQL rejecting invalid data (hopefully :pray )
    public function insertIntoTable( string $table, array $data ) {
        $conn = $this->connect_to_DB(); 

        try { 
            $columns = implode(", ", array_keys($data)); // Create a list of the data key 
            $placeholder = implode(", ", array_fill(0, count($data), "?"));

            $sql = "INSERT INTO $table ($columns) VALUES ($placeholder)";

            $stmt = $conn->prepare($sql);
            $stmt->execute(array_values($data));

        } catch (PDOException $e) {
            echo "Error when trying to insert into $table: ". $e->getMessage();
            exit;
        }
    }




    // ** Everything below this comment is internal functions by the Database Class functions

    // Use internally by the other public function inside DatabaseClient. 
    // Returns a db connection client to do CRUD operation on the DB if succesfully connected
    private function connect_to_DB() {
        require  __DIR__ . "/../../config.php"; // import sensitive database credientials 
        $db_connection_string = "mysql:host=$host;dbname=$db;charset=UTF8"; // Private connection string to the mySQL that specify which database and root user credientials
  
        try { 

            $pdo = new PDO($db_connection_string, $user, $password); 

            // $current_db = $pdo->query('SELECT DATABASE()')->fetchColumn();
            // echo $current_db;
            
            // Set the PDO error mode to exception (for better error handling)
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $pdo;

        } catch (PDOException $e){ 
            echo "Failed to connected to DB: " . $e->getMessage(); 
            exit;
        }
    }
    


}


?>