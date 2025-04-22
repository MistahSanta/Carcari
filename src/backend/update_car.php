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

    // Safety check for required fields (avoid false negatives like 0 mileage)
    if (
        $vin === '' || $color === '' || $make === '' || $model === '' ||
        $year === null || $drivetrain === '' || $fuel_type === '' ||
        $body_style === '' || $transmission === '' || $price === null || $mileage === null
    ) {
        die("Error: Missing required fields.");
    }

    include_once "../api/database.php";
    $db = new DatabaseClient();

    try {
        $pdo = $db->customPDO(); // raw PDO connection

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

        // ✅ Redirect if successful
        header("Location: ../frontend/inventory.php?Login=1&updated=1");
        exit;
    } catch (Exception $e) {
        die("Error updating car: " . $e->getMessage());
    }
} else {
    die("Invalid request method.");
}
