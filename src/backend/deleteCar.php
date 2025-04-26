<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['vin'])) {
    $vin = htmlspecialchars(trim($_POST['vin']));

    include_once "../api/database.php";
    $db = new DatabaseClient();

    try {
        $pdo = $db->customPDO(); 
        $stmt = $pdo->prepare("DELETE FROM Car WHERE VIN = ?");
        $stmt->execute([$vin]);

        // Clean redirect with success flag
        header("Location: ../frontend/inventory.php?Login=1&updated=1");
        exit;

    } catch (Exception $e) {
        echo "Error deleting car: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
