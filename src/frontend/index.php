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
    <title>Carcari</title>
<head>

<!-- TODO task for the team 
        //TODO 1) Add NavBar 
        2) User login with different access level 
        3) Add CRUD functionality 
        4) Add search button 
        5) Add Buy and sell button on Car Card 
-->

<body>
    <!-- <nav><a href="inputForm.php">a</a></nav> -->

<!-- Add the Inventory's page into here -->
<?php //include "inventory.php" ?> 
<?php include "loginPage.php" ?>







    
</body>
</html>


