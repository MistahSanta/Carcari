<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* ──────────────────────────────────────────────────────────────
   orderPage.php  –  shows the live contents of the Orders table
   ----------------------------------------------------------------
   Optional URL parameters:
      ?customer=10013374   → show only that buyer’s orders
      ?period=pastMonth    → filter by date period
   ────────────────────────────────────────────────────────────── */

include_once __DIR__ . '/../api/database.php';
$db  = new DatabaseClient();
$pdo = $db->customPDO();

// Print current DB name for debug
$stmt = $pdo->query("SELECT DATABASE()");
//echo "🔍 Current DB: " . $stmt->fetchColumn() . "<br>";

$where = [];
$bind = [];

// Optional filters from URL
if (!empty($_GET['customer'])) {
    $where[] = 'o.CustomerID = ?';
    $bind[] = (int)$_GET['customer'];
}

if (!empty($_GET['period'])) {
    $period = $_GET['period'];
    if ($period === 'pastMonth') {
        $where[] = 'o.Date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)';
    } elseif ($period === 'pastYear') {
        $where[] = 'o.Date >= DATE_SUB(NOW(), INTERVAL 1 YEAR)';
    }
}

// Build SQL query
$sql = "
    SELECT o.OrderID,
           o.Description,
           DATE(o.Date) AS orderDate,
           o.Total_price
    FROM Orders o
";

if ($where) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
}
$sql .= ' ORDER BY o.OrderID DESC';

$stmt = $pdo->prepare($sql);
$stmt->execute($bind);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Debug printout
//echo "<pre>RAW ORDER FETCH:\n";
//print_r($orders);
//echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order History - Carcari</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f9; }
        h1 { color: #000; text-align: center; padding-top: 30px; }
        table { width: 70%; margin: 0 auto; border-collapse: collapse; background: #fff; border-radius: 12px; overflow: hidden; }
        th, td { padding: 14px; border: 1px solid #ddd; text-align: left; }
        th { background: #f2f2f2; }
        .button-container { text-align: center; margin-bottom: 20px; }
        .back-button { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; }
    </style>
</head>
<body>

<h1>Order History</h1>

<div class="button-container">
    <a href="https://localhost/Carcari/src/frontend/inventory.php?Login=0" class="back-button">
        ← Back to Inventory
    </a>
</div>

<pre>
<?php
//echo "Customer ID Filter: " . ($_GET['customer'] ?? 'None') . "\n";
//echo "Order Count: " . count($orders) . "\n";
?>
</pre>

<table>
    <thead>
        <tr>
            <th>Order #</th>
            <th>Description</th>
            <th>Date</th>
            <th>Price ($)</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!$orders): ?>
            <tr><td colspan="4" style="text-align:center;">No orders found.</td></tr>
        <?php else: foreach ($orders as $o): ?>
            <tr>
                <td><?= htmlspecialchars($o['OrderID']) ?></td>
                <td><?= htmlspecialchars($o['Description']) ?></td>
                <td><?= htmlspecialchars($o['orderDate']) ?></td>
                <td><?= number_format($o['Total_price'], 2) ?></td>
            </tr>
        <?php endforeach; endif; ?>
    </tbody>
</table>

</body>
</html>
