<!-- Main page that loads all the components of the Carcari Web page --> 

<!-- Enable PHP to display error on the webpage -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html> 

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Carcari</title>
<head>



<body>

<h1>My first PHP page LMAO</h1>

<!-- Add the Inventory's page into here !-->
<?php include "inventory.php" ?>

















<?php

//require 'src/api/database.php';

// $carcari = new  DatabaseClient(); 

// $data = [
//     'model' => 'Honda',
//     "year" => 1999,
//     "color" => 'blue',
//     "price" => 123423.23
// ];

// $carcari->insertIntoTable("Car", $data);

//$carcari->insertIntoCarTable("Toyota Camry", 2012, "Red", 12342.43);

?>



    
</body>
</html>


