<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log into CarCari</title>

    <!-- Google Fonts: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background: url('https://images.pexels.com/photos/3377405/pexels-photo-3377405.jpeg?cs=srgb&dl=pexels-elina-araja-1743227-3377405.jpg&fm=jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        /* Main Container */
        .main-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }

        /* Login Container Styling */
        .login-container {
            background-color: #fff;
            padding: 30px 30px 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 32px;
            color: #333;
        }

        /* Form styling */
        .login-container label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .login-container input[type="text"], 
        .login-container input[type="password"] {
            width: 95%;
            padding: 14px 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Login Button Styling */
        .login-container input[type="submit"] {
            width: 100%;
            background-color: #000;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            background-color: #333;
        }

        /* Sign up Section */
        .signup-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .signup-container p {
            margin: 0 0 10px;
            font-size: 22px;
            font-weight: bold;
        }

        /* Sign up Button Styling */
        .signup-container button {
            width: 100%;
            background-color: #fff;
            border: 2px solid #000;
            color: black;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .signup-container button:hover {
            background-color: #f4f4f4;
        }

        /* Copyright Section */
        .copyright-container {
            margin-top: 2px;
            font-size: 12px;
            color: #777;
            font-weight: normal;
            text-align: center;
        }

        /* Mobile responsiveness */
        @media (max-width: 500px) {
            .login-container {
                padding: 20px;
            }

            .login-container h2 {
                font-size: 24px;
            }
        }

    </style>
</head>
<body>

    <div class="main-container">
        <!-- Login Section -->
        <div class="login-container">
            <h2>Log into CarCari</h2>
            <form action="../backend/handleLogin.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">

                <input type="submit" name="Login" value="Login">
            </form>
            <!-- Success/Error Messages -->
            <?php if (isset($_GET['Login']) && $_GET['Login'] == 'failed'): ?>
                <p class="error">Error. Login was not successful.</p>
            <?php endif; ?>
        </div>

        <!-- Space between login and sign up sections -->
        <div style="height: 20px;"></div>

        <!-- Sign Up Section -->
        <div class="signup-container">
            <p>Don't have a CarCari Account?</p>
            <button onclick="location.href='../frontend/signupPage.php'">Sign Up</button>
        </div>

        <!-- Copyright Section -->
        <div class="copyright-container">
            <p>&copy; 2025 CarCari | Terms of Use | Privacy Policy</p>
        </div>
    </div>

</body>
</html>