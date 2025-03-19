
<!DOCTYPE html>
<html>
<head>
    <title>Login / Signup</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 10px;
            width: 300px;
        }

        .form-container label, .form-container input {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>


    <div class="container">
        
        <div class="form-container">
            <h2>Sign Up</h2>
            <form action="../backend/handleSignup.php" method="post">
                <label for="signupUsername">Username:</label>
                <input type="text" id="signupUsername" name="signupUsername" required>

                <label for="signupPassword">Password:</label>
                <input type="password" id="signupPassword" name="signupPassword" required>

                <label for="access-level">What Access level do you want</label>
                <select id="access-level" name="access-level">
                    <option value="">Select Access Level</option>
                    <option value="0">Buyer</option>
                    <option value="1">Seller</option>
                    <option value="2">Manufacturer</option>

                </select>
                <br></br>
                <input type="submit" name="Signup" value="Sign Up">
            </form>

            <?php if (isset($_GET['signup']) && $_GET['signup'] == 'success'): ?>

            <p style="color: green;">Signup successful! You can now <a href="../frontend/index.php">login</a>.</p>
            <?php elseif (isset($_GET['signup']) && $_GET['signup'] == 'error'): ?>
                <p style="color: red;">Error. Signup was not successful.</p>
            <?php else: ?>
                <p></p>
            <?php endif; ?>
        </div>

    </div>

</body>
</html>