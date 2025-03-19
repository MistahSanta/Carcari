<?php   

// This code will handle saving user credientials to the database after a new user signs up

// Verify that we recieve the correct POST request - i.e. Sign up HTTP POST  request 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Signup'])) {

    // To prevent against SQL injection, we will filter bad character. 
    $username = htmlspecialchars(stripslashes(trim($_POST["signupUsername"])));
    $password = htmlspecialchars(stripslashes(trim($_POST["signupPassword"])));   
    
    // Now, we will query the Database to see if that user exist 
    include_once "../api/database.php";

    $conn = new DatabaseClient(); 

    # Since we already filter, we can simply dereference the variable in the string
    $potential_user =$conn->query_all("User", ["Username = '$username'"])->fetch(PDO::FETCH_ASSOC); 
    
    if (! $potential_user) {
        
        # Grab the access level the user wants 
        $access_level = htmlspecialchars(stripslashes(trim($_POST["access-level"])));   

        $data = [
            "Username" => $username,
            "Password" => $password,
            "Role"     => $access_level,
        ];

        // add the new user credientials to the database 
        $conn->insertIntoTable("User", $data );

        // Successfully signed up 
        header("Location: ../frontend/signupPage.php?signup=success");
        exit(); 

    } else { // This is not safe it is easy for hackers guess password once they know the username is valid 
        echo "Login failed:  User already exist! Try logging in";  
        header("Location: ../frontend/signupPage.php?signup=error");
    }

}



?>