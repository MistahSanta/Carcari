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
    <title>Edit Car</title>
</head>
<body>
    <h2>Edit Car Details</h2>
    <form method="POST" action="../backend/update_car.php">
        <input type="hidden" name="vin" value="<?php echo htmlspecialchars($vin); ?>">

        <label>Color:</label>
        <input type="text" name="color" value="<?php echo htmlspecialchars($car['Color']); ?>" required><br>

        <label>Manufacturer:</label>
        <input type="text" name="make" value="<?php echo htmlspecialchars($car['Manufacturer']); ?>" required><br>

        <label>Model:</label>
        <input type="text" name="model" value="<?php echo htmlspecialchars($car['Model']); ?>" required><br>

        <label>Year:</label>
        <input type="number" name="year" value="<?php echo htmlspecialchars($car['Year']); ?>" required><br>

        <label>Drivetrain:</label>
        <input type="text" name="drivetrain" value="<?php echo htmlspecialchars($car['Drivetrain']); ?>" required><br>

        <label>Fuel Type:</label>
        <select name="fuel_type" required>
            <option value="">Select Fuel Type</option>
            <option value="Gasoline" <?php if (trim($car['Fuel_type']) === 'Gasoline') echo 'selected'; ?>>Gasoline</option>
            <option value="Electric" <?php if (trim($car['Fuel_type']) === 'Electric') echo 'selected'; ?>>Electric</option>
             <option value="Hybrid" <?php if (trim($car['Fuel_type']) === 'Hybrid') echo 'selected'; ?>>Hybrid</option>
        </select><br>

        <label>Body Style:</label>
        <input type="text" name="body_style" value="<?php echo htmlspecialchars($car['Body_Style']); ?>" required><br>

        <label>Transmission:</label>
        <input type="text" name="transmission" value="<?php echo htmlspecialchars($car['Transmission']); ?>" required><br>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($car['Price']); ?>" required><br>

        <label>Mileage:</label>
        <input type="number" name="mileage" value="<?php echo htmlspecialchars($car['Mileage']); ?>" required><br>

        <label>Image URL:</label>
        <input type="text" name="image" value="<?php echo htmlspecialchars($car['Image']); ?>"><br><br>

        <button type="submit">Update Car</button>
    </form>
</body>
</html>
