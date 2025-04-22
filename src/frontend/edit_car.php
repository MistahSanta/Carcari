<?php
session_start();
if ($_SESSION['role'] !== 'seller') exit;
require_once '../api/database.php';

$vin = $_GET['id'];
$client = new DatabaseClient();
$car = $client->query_all("Car", ["VIN = '$vin'"])->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Car | Carcari</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 15px 20px;
            font-size: 1.2em;
            font-weight: bold;
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"],
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1em;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

    </style>
</head>
<body>
    <div class="navbar">Carcari - Edit Car</div>
    
    <div class="form-container">
        <h2>Edit Car Details</h2>
        <form method="POST" action="../backend/update_car.php">
            <input type="hidden" name="vin" value="<?php echo htmlspecialchars($vin); ?>">

            <label>Color:</label>
            <input type="text" name="color" value="<?php echo htmlspecialchars($car['Color']); ?>" required>

            <label>Manufacturer:</label>
            <input type="text" name="make" value="<?php echo htmlspecialchars($car['Manufacturer']); ?>" required>

            <label>Model:</label>
            <input type="text" name="model" value="<?php echo htmlspecialchars($car['Model']); ?>" required>

            <label>Year:</label>
            <input type="number" name="year" value="<?php echo htmlspecialchars($car['Year']); ?>" required>

            <label>Drivetrain:</label>
            <input type="text" name="drivetrain" value="<?php echo htmlspecialchars($car['Drivetrain']); ?>" required>

            <label>Fuel Type:</label>
            <select name="fuel_type" required>
                <option value="">Select Fuel Type</option>
                <option value="Gasoline" <?php if ($car['Fuel_type'] === 'Gasoline') echo 'selected'; ?>>Gasoline</option>
                <option value="Electric" <?php if ($car['Fuel_type'] === 'Electric') echo 'selected'; ?>>Electric</option>
                <option value="Hybrid" <?php if ($car['Fuel_type'] === 'Hybrid') echo 'selected'; ?>>Hybrid</option>
            </select>

            <label>Body Style:</label>
            <input type="text" name="body_style" value="<?php echo htmlspecialchars($car['Body_Style']); ?>" required>

            <label>Transmission:</label>
            <input type="text" name="transmission" value="<?php echo htmlspecialchars($car['Transmission']); ?>" required>

            <label>Price:</label>
            <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($car['Price']); ?>" required>

            <label>Mileage:</label>
            <input type="number" name="mileage" value="<?php echo htmlspecialchars($car['Mileage']); ?>" required>

            <label>Image URL:</label>
            <input type="text" name="image" value="<?php echo htmlspecialchars($car['Image']); ?>">

            <button type="submit">Update Car</button>
        </form>
    </div>
</body>
</html>
