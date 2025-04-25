<?php   

include_once "../api/database.php";
$db = new DatabaseClient();
$pdo = $db->customPDO();

$stmt = $pdo->query("SELECT DATABASE()");
//echo "🔍 Connected to DB: " . $stmt->fetchColumn() . "\n";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['vin'])) {
    $vin = $_POST['vin'];
    $customer_id = 10099946;

    try {
        $pdo->beginTransaction();

        // Get car info
        $stmt = $pdo->prepare("SELECT * FROM Car WHERE VIN = ?");
        $stmt->execute([$vin]);
        $car = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$car) {
            throw new Exception("❌ Car not found.");
        }

        $price = $car['Price'];
        $seller_id = $car['SellerID'];
        $description = $car['Year'] . " " . $car['Manufacturer'] . " " . $car['Model'];
        $date = date("Y-m-d");

        // Insert order
        $stmt = $pdo->prepare("
            INSERT INTO Orders (VIN, CustomerID, SellerID, Date, Total_price, Description)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$vin, $customer_id, $seller_id, $date, $price, $description]);

        echo "✅ Inserted into Orders\n";

        // Instead of deleting the car, mark it sold
        $stmt = $pdo->prepare("UPDATE Car SET Sold = 1 WHERE VIN = ?");
        $stmt->execute([$vin]);


        //echo "✅ Car marked as Sold\n";

        $pdo->commit();

    } catch (Exception $e) {
        $pdo->rollBack();
     //   echo "❌ TRANSACTION ERROR: " . $e->getMessage();
    }
    } else {
     //echo "❌ VIN not provided.";
    }

    header("Location: ../frontend/orderPage.php?customer=$customer_id");
    exit;

?>
