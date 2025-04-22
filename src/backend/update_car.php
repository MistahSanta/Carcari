<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vin = htmlspecialchars(trim($_POST['vin']));
    $color = htmlspecialchars(trim($_POST['color']));
    $make = htmlspecialchars(trim($_POST['make']));
    $model = htmlspecialchars(trim($_POST['model']));
    $year = (int) $_POST['year'];
    $drivetrain = htmlspecialchars(trim($_POST['drivetrain']));
    $fuel_type = htmlspecialchars(trim($_POST['fuel_type']));
    $body_style = htmlspecialchars(trim($_POST['body_style']));
    $transmission = htmlspecialchars(trim($_POST['transmission']));
    $price = (float) $_POST['price'];
    $mileage = (int) $_POST['mileage'];
    $image = htmlspecialchars(trim($_POST['image']));

    if (
        $vin === '' || $color === '' || $make === '' || $model === '' ||
        $year === null || $drivetrain === '' || $fuel_type === '' ||
        $body_style === '' || $transmission === '' || $price === null || $mileage === null
    ) {
        die("<h2 style='color: red;'>Error: Missing required fields.</h2>");
    }

    include_once "../api/database.php";
    $db = new DatabaseClient();

    try {
        $pdo = $db->customPDO();

        $stmt = $pdo->prepare("
            UPDATE Car SET 
                Color = ?, 
                Manufacturer = ?, 
                Model = ?, 
                Year = ?, 
                Drivetrain = ?, 
                Fuel_type = ?, 
                Body_Style = ?, 
                Transmission = ?, 
                Price = ?, 
                Mileage = ?, 
                Image = ?
            WHERE VIN = ?
        ");

        $stmt->execute([
            $color,
            $make,
            $model,
            $year,
            $drivetrain,
            $fuel_type,
            $body_style,
            $transmission,
            $price,
            $mileage,
            $image,
            $vin
        ]);

        // Output styled success page and redirect
        echo "<!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv='refresh' content='1;url=../frontend/inventory.php?Login=1&updated=1'>
            <title>Carcari | Updating</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f9;
                    margin: 0;
                    padding: 0;
                    text-align: center;
                }
                .navbar {
                    background-color: #333;
                    color: white;
                    padding: 15px 20px;
                    font-size: 1.2em;
                    font-weight: bold;
                    text-align: left;
                }
                .message {
                    margin-top: 100px;
                }
                .message h2 {
                    color: green;
                    font-size: 28px;
                }
                .message p {
                    font-size: 18px;
                    color: #555;
                }
            </style>
        </head>
        <body>
            <div class='navbar'>Carcari</div>
            <div class='message'>
                <h2>Car updated successfully!</h2>
                <p>Redirecting you to the inventory page...</p>
            </div>
        </body>
        </html>";
        exit;
    } catch (Exception $e) {
        echo "<h2 style='color: red;'>Error updating car:</h2>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
    }
} else {
    echo "<h2 style='color: red;'>Invalid request method.</h2>";
}
