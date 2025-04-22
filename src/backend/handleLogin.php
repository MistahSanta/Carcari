<?php   
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session so we can use $_SESSION variables

// This code will handle collecting and verifiy the user login credientials with the database 
// After the User press sign in

// Verify that we recieve the correct POST request - i.e. Login HTTP POST  request 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Login'])) {

    // To prevent against SQL injection, we will filter bad character. 
    $username = htmlspecialchars(stripslashes(trim($_POST["username"])));
    $password = htmlspecialchars(stripslashes(trim($_POST["password"])));   

    // Now, we will query the Database to see if that user exist 
    include_once "../api/database.php";
    $conn = new DatabaseClient(); 

    try {
        # Since we already filter, we can simply dereference the variable in the string
        $potential_client = $conn->query_all("Client", ["Username = '$username'"])->fetch(PDO::FETCH_ASSOC); 
        $potential_seller = $conn->query_all("Seller", ["Username = '$username'"])->fetch(PDO::FETCH_ASSOC); 
        
        if ($potential_client) {
            // Found a potential user 
            // TODO stretch code - add hash password for better security 
            if ($password == $potential_client["Password"]) {
                // Perfect, the user is now log in, so redirect them to the correct page
                // with their correct user access level 
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'buyer';
                header("Location: ../frontend/inventory.php?Login=0");  
                exit;
            } else {
                // Incorrect password 
                // TODO add a retry feature -stretch goal 
                header("Location: ../frontend/index.php?Login=failed");
                exit;
            }

        } else if ($potential_seller) {
            if ($password == $potential_seller["Password"]) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'seller';
                header("Location: ../frontend/inventory.php?Login=1");  
                exit;
            } else { 
                header("Location: ../frontend/index.php?Login=failed");  
                exit;
            }

        } else { 
            // NO user found - This is not safe it is easy for hackers guess password once they know the username is valid 
            header("Location: ../frontend/index.php?Login=failed");  
            exit;
        }
        
    } catch (Exception $e) {
        // Catch unexpected errors and log them for debugging
        error_log("Login error: " . $e->getMessage());
        echo "Server error: Something went wrong.";
        http_response_code(500);
        exit;
    }
}
?>
