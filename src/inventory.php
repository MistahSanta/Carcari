
<!-- Inventory Page for Car dealership --> 

<!-- Filter tab on the Inventory page -->
<div class="filter-container">
        <h3>Filters</h3>
        <div class="filter">
            <label for="price">Price Range:</label>
            <select id="price">
                <option value="">Select Price Range</option>
                <option value="5000-10000">$5,000 - $10,000</option>
                <option value="10001-20000">$10,001 - $20,000</option>
                <option value="20001-30000">$20,001 - $30,000</option>
                <option value="30001-50000">$30,001 - $50,000</option>
                <option value="50001-100000">$50,001 - $100,000</option>
            </select>
        </div>
        <div class="filter">
            <label for="mileage">Mileage Range:</label>
            <select id="mileage">
                <option value="">Select Mileage Range</option>
                <option value="0-25000">0 - 25,000 miles</option>
                <option value="25001-50000">25,001 - 50,000 miles</option>
                <option value="50001-75000">50,001 - 75,000 miles</option>
                <option value="75001-100000">75,001 - 100,000 miles</option>
                <option value="100001-200000">100,001 - 200,000 miles</option>
            </select>
        </div>
        <div class="filter">
            <label for="year">Year:</label>
            <select id="year">
                <option value="">Select Year</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <!-- Add more years as needed -->
            </select>
        </div>
        <div class="filter">
            <label for="drivetrain">Drivetrain:</label>
            <select id="drivetrain">
                <option value="">Select Drivetrain</option>
                <option value="AWD">AWD</option>
                <option value="FWD">FWD</option>
                <option value="RWD">RWD</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="filter">
            <label for="model">Model:</label>
            <select id="model">
                <option value="">Select Model</option>
                <option value="Model 1">Model 1</option>
                <option value="Model 2">Model 2</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="filter">
            <label for="body-style">Body Style:</label>
            <select id="body-style">
                <option value="">Select Body Style</option>
                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="filter">
            <label for="fuel-type">Fuel Type:</label>
            <select id="fuel-type">
                <option value="">Select Fuel Type</option>
                <option value="Gasoline">Gasoline</option>
                <option value="Diesel">Diesel</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="filter">
            <label for="exterior-color">Exterior Color:</label>
            <select id="exterior-color">
                <option value="">Select Exterior Color</option>
                <option value="Red">Red</option>
                <option value="Blue">Blue</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="filter">
            <label for="transmission">Transmission:</label>
            <select id="transmission">
                <option value="">Select Transmission</option>
                <option value="Automatic">Automatic</option>
                <option value="Manual">Manual</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="filter">
            <label for="condition">Condition:</label>
            <select id="condition">
                <option value="">Select Condition</option>
                <option value="New">New</option>
                <option value="Used">Used</option>
                <!-- Add more options as needed -->
            </select>
        </div>
    </div>


    <div class="car-list">
    <!-- Dynamically load the Car's Card from the mySQL Database -->
    <?php
        include_once  __DIR__ . '/api/database.php';
        // First, grab the Car entities from the Database
        $client = new  DatabaseClient();  
        $car_entities = $client->query_all("Cars"); // Select Everything from Car Table 


        // Now we have the car entries, so display them on the card, so 
        // dynamically generate these card with this info from the database 
        if ($car_entities) {
            // Generate the HTML that PHP will spit back to index.php 
            // I wish there was a better way to do this tbh 
            while ( $entry = $car_entities->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='car-card'>";
                    //echo "<div class='card-image'>";
                    echo "<img src='https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds' alt='Picture of a car' class='car-image'>";
                    echo "<div>";

                        echo "<h4>"          . htmlspecialchars($entry['Model'])  . "</h4>";
                        echo "<p> Price: "   . htmlspecialchars($entry['Price'])  . "</p>";
                        echo "<p> Year: "    . htmlspecialchars($entry['Year'])   . "</p>";
                        echo "<p> Mileage: " . htmlspecialchars($entry['Mileage']) . "</p>";
                        echo "<p> Color: "   . htmlspecialchars($entry['Color']) . "</p>";
                        echo "<p> More Stuff: Haven't implemented in database yet! </p>";
                    
                    //echo "<p> : " . htmlspecialchars($entry['Milage']) . "</p>";
                    //echo "<p> Mileage: " . htmlspecialchars($entry['Milage']) . "</p>";
                    echo "</div>";
                echo "</div>";
            }
        }
    ?>




<div class="car-card">
            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds" alt="2023 Polestar 2" class="car-image">
            <div>
                <h4>Polestar 2</h4>
                <p>Price: $32,960</p>
                <p>Year: 2023</p>
                <p>Mileage: 4,776</p>
                <p>Drivetrain: AWD</p>
                <p>Body Style: Sedan</p>
                <p>Fuel Type: Electric</p>
                <p>Exterior Color: Snow White</p>
                <p>Transmission: Automatic</p>
                <p>Condition: Used </p>
            </div>
        </div>
<!-- 

        <div class="car-card">
            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds" alt="2023 Polestar 2" class="car-image">
            <div>
                <h4>Polestar 2</h4>
                <p>Price: $32,960</p>
                <p>Year: 2023</p>
                <p>Mileage: 4,776</p>
                <p>Drivetrain: AWD</p>
                <p>Body Style: Sedan</p>
                <p>Fuel Type: Electric</p>
                <p>Exterior Color: Snow White</p>
                <p>Transmission: Automatic</p>
                <p>Condition: Used </p>
            </div>
        </div> -->
        <!-- <div class="car-card">
            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds" alt="2023 Kia EV6 GT" class="car-image">
            <div>
                <h4>Kia EV6 GT</h4>
                <p>Price: $36,981</p>
                <p>Year: 2023</p>
                <p>Mileage: 14,107</p>
                <p>Drivetrain: AWD</p>
                <p>Body Style: SUV</p>
                <p>Fuel Type: Electric</p>
                <p>Exterior Color: Aurora Black</p>
                <p>Transmission: Automatic</p>
                <p>Condition: Used</p>
            </div>
        </div>
        <div class="car-card">
            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds" alt="2024 Tesla Model 3 Long Range" class="car-image">
            <div>
                <h4>Tesla Model 3 Long Range</h4>
                <p>Price: $36,985</p>
                <p>Year: 2024</p>
                <p>Mileage: 8,731</p>
                <p>Drivetrain: AWD</p>
                <p>Body Style: Sedan</p>
                <p>Fuel Type: Electric</p>
                <p>Exterior Color: Stealth Grey</p>
                <p>Transmission: Automatic</p>
                <p>Condition: Used</p>
            </div>
        </div>
        <div class="car-card">
            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds" alt="2023 Toyota GR86 Premium" class="car-image">
            <div>
                <h4>Toyota GR86 Premium</h4>
                <p>Price: $26,990</p>
                <p>Year: 2023</p>
                <p>Mileage: 33,824</p>
                <p>Drivetrain: RWD</p>
                <p>Body Style: Coupe</p>
                <p>Fuel Type: Gasoline</p>
                <p>Exterior Color: Neptune Blue</p>
                <p>Transmission: Manual</p>
                <p>Condition: Used</p>
            </div>
        </div>
        <div class="car-card">
            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds" alt="2021 Mercedes-Benz AMG GT 63" class="car-image">
            <div>
                <h4>Mercedes-Benz AMG GT 63</h4>
                <p>Price: $79,500</p>
                <p>Year: 2021</p>
                <p>Mileage: 47,621</p>
                <p>Drivetrain: AWD</p>
                <p>Body Style: Coupe</p>
                <p>Fuel Type: Gasoline</p>
                <p>Exterior Color: Polar White</p>
                <p>Transmission: Automatic</p>
                <p>Condition: Used</p>
            </div>
        </div>
        <div class="car-card">
            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds" alt="2024 Porsche 911 Turbo S" class="car-image">
            <div>
                <h4>Porsche 911 Turbo S</h4>
                <p>Price: $279,992</p>
                <p>Year: 2024</p>
                <p>Mileage: 7</p>
                <p>Drivetrain: AWD</p>
                <p>Body Style: Coupe</p>
                <p>Fuel Type: Gasoline</p>
                <p>Exterior Color: Pure White</p>
                <p>Transmission: Automatic</p>
                <p>Condition: New</p>
            </div>
        </div> -->
     </div>




<body>
   
</body>
</html>