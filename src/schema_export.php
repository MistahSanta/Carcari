<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once(__DIR__ . "/api/database.php");

$db = new DatabaseClient();
$pdo = $db->customPDO();

$tables = ['Car', 'Orders', 'Client', 'Seller'];

header("Content-Type: text/plain");

foreach ($tables as $table) {
    $stmt = $pdo->query("SHOW CREATE TABLE `$table`");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "-- Schema for table: $table --\n\n";
    echo $row["Create Table"] . ";\n\n";
    echo str_repeat("-", 80) . "\n\n";
}

