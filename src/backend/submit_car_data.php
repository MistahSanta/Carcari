<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once "../api/database.php";

// Check for required data
$required_fields = ['make', 'model', 'trim', 'year', 'color', 'status', 'price', 'engine_specs', 'mileage', 'vin'];
foreach ($required_fields as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        die("❌ Missing required field: $field");
    }
}

// Use passed SellerID (you can improve this with sessions or login context)
if (!isset($_GET['seller_id'])) {
    die("❌ Seller ID not provided.");
}
$seller_id = (int)$_GET['seller_id'];

// Sanitize and assign form values
$vin         = $_POST['vin'];
$make        = $_POST['make'];
$model       = $_POST['model'];
$year        = (int)$_POST['year'];
$color       = $_POST['color'];
$price       = (float)$_POST['price'];
$mileage     = (int)$_POST['mileage'];
$fuel_type   = "Gasoline"; // Hardcoded unless form includes it
$drivetrain  = "FWD";      // Hardcoded unless form includes it
$body_style  = "Sedan";    // Hardcoded unless form includes it
$transmission= "Automatic"; // Hardcoded unless form includes it
$image = "../frontend/assets/Camry2004.jpg"; // for backend reference
$sold        = 0; // New listing is not sold

$db = new DatabaseClient();
$pdo = $db->customPDO();

try {
    $stmt = $pdo->prepare("
        INSERT INTO Car (
            VIN, Color, Manufacturer, Model, Year, Drivetrain, Fuel_type, Body_Style, Transmission,
            Price, Image, Mileage, SellerID, Sold
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $vin, $color, $make, $model, $year, $drivetrain, $fuel_type, $body_style,
        $transmission, $price, $image, $mileage, $seller_id, $sold
    ]);

    // Redirect back to inventory (seller view)
    header("Location: ../frontend/inventory.php?Login=1&added=1");
    exit;

} catch (Exception $e) {
    echo "❌ Failed to insert car: " . $e->getMessage();
}
?>
