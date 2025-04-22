<?php
require_once 'src/api/database.php';

$client = new DatabaseClient();
$conn = $client->customPDO();

try {
    $stmt = $conn->query("SELECT COUNT(*) FROM Car");
    $count = $stmt->fetchColumn();
    echo "Connection successful. Car table has $count entries.";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
