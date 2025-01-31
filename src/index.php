

<!DOCTYPE html> 

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carcari</title>
<head>



<body>

<h1>My first PHP page LMAO test</h1>

<?php

require 'src/api/database.php';

// Try to connect to the database 


$carcari = new  DatabaseClient(); 

$data = [
    'model' => 'Lexus',
    "year" => 2024,
    "color" => 'red',
    "price" => 1234.23
];

$carcari->insertIntoTable("Car", $data);

//$carcari->insertIntoCarTable("Toyota Camry", 2012, "Red", 12342.43);

?>



    
</body>
</html>


