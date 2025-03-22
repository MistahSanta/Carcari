
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - CarCari</title>

    <!-- Google Fonts: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background: url('https://images.pexels.com/photos/2117937/pexels-photo-2117937.jpeg?cs=srgb&dl=pexels-scottwebb-2117937.jpg&fm=jpg') no-repeat center center fixed;
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

        /* Form Container Styling */
        .form-container {
            background-color: #fff;
            padding: 30px 30px 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 32px;
            color: #333;
        }

        /* Form styling */
        .form-container label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-container input[type="text"], 
        .form-container input[type="password"],
        .form-container select {
            width: 95%;
            padding: 14px 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-container input[type="text"]:focus,
        .form-container input[type="password"]:focus,
        .form-container select:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Sign up Button Styling */
        .form-container input[type="submit"] {
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

        .form-container input[type="submit"]:hover {
            background-color: #333;
        }

        /* Sign-up Success/Error Messages */
        .form-container p.success {
            color: green;
        }

        .form-container p.error {
            color: red;
        }

        /* Copyright Section */
        .copyright-container {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            font-weight: normal;
            text-align: center;
        }

        /* Mobile responsiveness */
        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
            }

            .form-container h2 {
                font-size: 24px;
            }
        }

            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #333;
        }

        /* Sign-up Success/Error Messages */
        .form-container p.success {
            color: green;
        }

        .form-container p.error {
            color: red;
        }

        /* Copyright Section */
        .copyright-container {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            font-weight: normal;
            text-align: center;
        }

        /* Mobile responsiveness */
        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
            }

            .form-container h2 {
                font-size: 24px;
            }
        }

    </style>
</head>
<body>

    <div class="main-container">
        <!-- Sign Up Form Section -->
        <div class="form-container">
            <h2>Sign Up</h2>
            <form action="../backend/handleSignup.php" method="post">
                <label for="signupUsername">Username:</label>
                <input type="text" id="signupUsername" name="signupUsername" required>

                <label for="signupPassword">Password:</label>
                <input type="password" id="signupPassword" name="signupPassword" required>

                <label for="access-level">What Access level do you want?</label>
                <select id="access-level" name="access-level" required>
                    <option value="">Select Access Level</option>
                    <option value="Client">Buyer</option>
                    <option value="Seller">Seller</option>
                </select>
                <br><br>
                <input type="submit" name="Signup" value="Sign Up">
            </form>

            <!-- Success/Error Messages -->
            <?php if (isset($_GET['signup']) && $_GET['signup'] == 'success'): ?>
                <p class="success">Signup successful! You can now <a href="../frontend/index.php">login</a>.</p>
            <?php elseif (isset($_GET['signup']) && $_GET['signup'] == 'error'): ?>
                <p class="error">Error. Signup was not successful.</p>
            <?php else: ?>
                <p></p>
            <?php endif; ?>
        </div>

        <!-- Copyright Section -->
        <div class="copyright-container">
            <p>&copy; 2025 CarCari | Terms of Use | Privacy Policy</p>
        </div>
    </div>

</body>
</html>
