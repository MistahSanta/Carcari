
<?php

include_once 'src/api/database.php';

$carcari = new  DatabaseClient(); 

// $data = [
//     'Model' => 'Polestar 2',
//     "Price" => 32960,
//     "Year" => 2023,
//     "Milage" => 4776,
//     "Make" => "IDK lol",
//     "Color" => "Snow White",
//     "Engine" => "V8",
//     "Trim" => "SOMETHIGN LOL"
// ];

// $data = [
//     "Username" => "normal",
//     "Password" => "123",
//     "role" => 0,
// ];

echo "testing";
echo $carcari->query_all("User" )->fetch(PDO::FETCH_ASSOC); // Fetch one row as an associative array

// $carcari->insertIntoTable("User", $data);


?>
