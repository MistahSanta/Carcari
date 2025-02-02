
<!-- Inventory Page for Car dealership --> 


<!-- Dynamically load the Car's Card from the mySQL Database -->
<?php

    require  __DIR__ . '/api/database.php';

    // First, grab the Car entities from the Database
    $client = new  DatabaseClient();  


    $car_entities = $client->query_all( "Car"); // Select Everything from Car Table 

    
    echo "<div class='car-inventory-container'>";
    // Now we have the car entries, so display them on the card, so 
    // dynamically generate these card with this info from the database 
    if ($car_entities) {
        // Generate the HTML that PHP will spit back to index.php 
        // I wish there was a better way to do this tbh 
        while ( $entry = $car_entities->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='card-container'>";

                echo "<div class='card-image'>";
                    echo "<img src='https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds' alt='Picture of a car'>";
                echo "</div>";

                echo "<p>" . htmlspecialchars($entry['Model']) . "</p>";
                echo "<p>" . htmlspecialchars($entry['Year'])  . "</p>";
                echo "<p>" . htmlspecialchars($entry['Color']) . "</p>";
                echo "<p>" . htmlspecialchars($entry['Price']) . "</p>";

            echo "</div>";

        }

    }
    
    echo "</div>";


?>

