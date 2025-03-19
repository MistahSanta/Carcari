
<?php

include_once 'src/api/database.php';

$carcari = new  DatabaseClient(); 

$data = [
    'Model' => 'Lexus',
    "Price" => 284432,
    "Year" => 2016,
    "Mileage" => 576311,
    "Make" => "Lexus",
    "Color" => "Blue",
    "Engine" => "V8",
    "Trim" => "SOMETHING L"
];

// $data = [
//     "Username" => "normal",
//     "Password" => "123",
//     "role" => 0,
// ];


// echo $carcari->query_all("User", ["year > 2020", "Price > 3000"] )->fetch(PDO::FETCH_ASSOC); // Fetch one row as an associative array

$carcari->insertIntoTable("Car", $data);


?>
