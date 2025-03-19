
<!-- Inventory Page for Car dealership --> 
<!-- Style for inventory.php -->
<style>
    body {
        display: flex;
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
    }
    .filter-container {
        width: 20%;
        padding: 10px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-right: 20px;
    }
    .filter {
        margin-bottom: 20px;
    }
    .filter label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .filter input, .filter select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .car-list {
        width: 80%;
        display: flex;
        flex-wrap: wrap;
    }
    .car-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        width: calc(50% - 45px); /* Adjusted to fit two cards per row */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        text-align: left;
        background-color: #fff;
        display: flex;
    }
    .car-image {
        width: auto; /* Adjusted the image size */
        height: 250px;
        margin-left: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        margin-right: 20px;
        border-radius: 5px;
    }
</style>


<!-- PHP only offer full page reload instead of partial page refresh -->
<!-- Filter tab on the Inventory page -->
    <div class="filter-container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="get">

            <h3>Filters</h3>
            <div class="filter">
                <label for="price">Price Range:</label>
                <select id="price" name="price">
                    <option value="">Select Price Range</option>
                    <option value="0-10000">$0 - $10,000</option>
                    <option value="10000-20000">$10,000 - $20,000</option>
                    <option value="20000-30000">$20,000 - $30,000</option>
                    <option value="30000-50000">$30,000 - $50,000</option>
                    <option value="50000-70000">$50,000 - $70,000</option>
                    <option value="70000-100000">$70,000 - $100,000</option>
                    <option value="100000-150000">$100,000 - $150,000</option>
                    <option value="150000-250000">$150,000 - $250,000</option>
                    <option value="250000-9999999">$250,000+</option>
                </select>
            </div>
            <div class="filter">
                <label for="mileage">Mileage Range:</label>
                <select id="mileage" name="mileage">
                    <option value="">Select Mileage Range</option>
                    <option value="0-10000">0 - 10,000 miles</option>
                    <option value="10000-25000">10,000 - 25,000 miles</option>
                    <option value="25000-50000">25,000 - 50,000 miles</option>
                    <option value="50000-100000">50,000 - 100,000 miles</option>
                    <option value="100000-9999999">100,000+ miles</option>
                </select>
            </div>
            <div class="filter">
                <label for="year">Year:</label>
                <select id="year" name="year">
                    <option value="">Select Year</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019 & Below">2019 & Below</option>
                </select>
            </div>
            <div class="filter">
                <label for="drivetrain">Drivetrain:</label>
                <select id="drivetrain" name="drivetrain">
                    <option value="">Select Drivetrain</option>
                    <option value="AWD">AWD</option>
                    <option value="FWD">FWD</option>
                    <option value="RWD">RWD</option>
                </select>
            </div>
            <div class="filter">
                <label for="manufacturer">Manufacturer:</label>
                <select id="manufacturer" name="manufacturer">
                    <option value="">Select Manufacturer</option>
                    <option value="Acura">Acura</option>
                    <option value="Alfa Romeo">Alfa Romeo</option>
                    <option value="Aston Martin">Aston Martin</option>
                    <option value="Audi">Audi</option>
                    <option value="Bentley">Bentley</option>
                    <option value="BMW">BMW</option>
                    <option value="Buick">Buick</option>
                    <option value="Cadillac">Cadillac</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Chrysler">Chrysler</option>
                    <option value="Dodge">Dodge</option>
                    <option value="Ferrari">Ferrari</option>
                    <option value="Fiat">Fiat</option>
                    <option value="Ford">Ford</option>
                    <option value="Genesis">Genesis</option>
                    <option value="GMC">GMC</option>
                    <option value="Honda">Honda</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="Infiniti">Infiniti</option>
                    <option value="Jaguar">Jaguar</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Kia">Kia</option>
                    <option value="Lamborghini">Lamborghini</option>
                    <option value="Land Rover">Land Rover</option>
                    <option value="Lexus">Lexus</option>
                    <option value="Lincoln">Lincoln</option>
                    <option value="Lotus">Lotus</option>
                    <option value="Lucid">Lucid</option>
                    <option value="Maserati">Maserati</option>
                    <option value="Mazda">Mazda</option>
                    <option value="McLaren">McLaren</option>
                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                    <option value="Mini">Mini</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Polestar">Polestar</option>
                    <option value="Porsche">Porsche</option>
                    <option value="Ram">Ram</option>
                    <option value="Rivian">Rivian</option>
                    <option value="Rolls-Royce">Rolls-Royce</option>
                    <option value="Smart">Smart</option>
                    <option value="Subaru">Subaru</option>
                    <option value="Tesla">Tesla</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Volvo">Volvo</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="filter">
                <label for="body-style">Body Style:</label>
                <select id="body-style" name="body-style">
                    <option value="">Select Body Style</option>
                    <option value="Truck">Truck</option>
                    <option value="SUV">SUV</option>
                    <option value="Sedan">Sedan</option>
                    <option value="Coupe">Coupe</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Crossover">Crossover</option>
                    <option value="Wagon">Wagon</option>
                    <option value="Sport">Sport</option>
                    <option value="Convertible">Convertible</option>
                    <option value="Minivan">Minivan</option>
                    <option value="Utility">Utility</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="filter">
                <label for="fuel-type">Fuel Type:</label>
                <select id="fuel-type" name="fuel-type">
                    <option value="">Select Fuel Type</option>
                    <option value="Gasoline">Gasoline</option>
                    <option value="Electric">Electric</option>
                    <option value="Hybrid">Hybrid</option>
                </select>
            </div>
            <div class="filter">
                <label for="exterior-color">Exterior Color:</label>
                <select id="exterior-color" name="exterior-color">
                    <option value="">Select Exterior Color</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Silver">Silver</option>
                    <option value="Gray">Gray</option>
                    <option value="Red">Red</option>
                    <option value="Blue">Blue</option>
                    <option value="Green">Green</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="filter">
                <label for="transmission">Transmission:</label>
                <select id="transmission" name="transmission">
                    <option value="">Select Transmission</option>
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="filter">
                <label for="condition">Condition:</label>
                <select id="condition" name="condition">
                    <option value="">Select Condition</option>
                    <option value="New">New</option>
                    <option value="Used">Used</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <button type="submit" name="applyFilters">Apply Filters</button>
            </form>

        </div>
    
    <div class="car-list">
    <!-- Dynamically load the Car's Card from the mySQL Database -->
    <?php
        include_once  __DIR__ . '/../api/database.php';
        // First, grab the Car entities from the Database
        $client = new  DatabaseClient();  
        $query_condition = null; 

        if (isset($_GET['applyFilters'])) {
            // Submit button was pressed, so take those value and apply them 
            // Probably not necessary, but just in case 
            $price = htmlspecialchars(stripslashes(trim($_GET["price"])));   
            $mileage = htmlspecialchars(stripslashes(trim($_GET["mileage"])));
            $year = htmlspecialchars(stripslashes(trim($_GET["year"])));
            $drivetrain = htmlspecialchars(stripslashes(trim($_GET["drivetrain"])));
            $manufacturer = htmlspecialchars(stripslashes(trim($_GET["manufacturer"])));
            $body_style = htmlspecialchars(stripslashes(trim($_GET["body-style"])));
            $fuel_type = htmlspecialchars(stripslashes(trim($_GET["fuel_type"])));
            $color = htmlspecialchars(stripslashes(trim($_GET["exterior-color"])));
            $transmission = htmlspecialchars(stripslashes(trim($_GET["transmission"])));
            $condition = htmlspecialchars(stripslashes(trim($_GET["condition"])));

            if (!empty($price)) {
                if (is_numeric($price)) {
                    // the user select the option for 250000+
                    $query_condition[] = "price >= '" .  preg_replace('/\W+/', "", $price);

                } else { 
                    // Do regular expression to extract the two numbes we need 
                    $price_range = extractNumbers( $price );
                    $query_condition[] = "price >= '" . $price_range[0] . "'".  " AND price <= " . "'" . $price_range[1] . "'"; 
                }
            }
            if (!empty($mileage)) {
                if (is_numeric($mileage)) {
                    // User select 100000+
                    $query_condition[] = "mileage >= '" .  preg_replace('/\W+/', "", $mileage) . "'";
                } else {
                    // Do regular expression to extract the two numbes we need

                    $mileage_range = extractNumbers( $mileage );
                    $query_condition[] = "mileage >= '" . $mileage_range[0] . "'" . " AND mileage <= " . "'" . $mileage_range[1] . "'";
                }
            }

            if (!empty($year)) {
                if (!is_numeric($year)) {
                    $query_condition[] = "year <= 2019"; // Just hard code it 
                } else {
                    $query_condition[] = "year = '" . $year . "'";
                }
            }
            // if (!empty($drivetrain)) {
            //     $query_condition[] = "drivetrain = '" . $drivetrain . "'";
            // }
            if (!empty($manufacturer)) {
                $query_condition[] = "make = '" . $manufacturer . "'";
            }
            // if (!empty($body_style)) {
            //     $query_condition[] = "body_style = '" . $body_style . "'";
            // }
            // if (!empty($fuel_type)) {
            //     $query_condition[] = "fuel_type = '" . $fuel_type . "'";
            // }
            if (!empty($color)) {
                $query_condition[] = "color = '" . $color . "'";
            }
            // if (!empty($transmission)) {
            //     $query_condition[] = "transmission = '" . $transmission . "'";
            // }
            if (!empty($condition)) {
                $query_condition[] = "operational_condition = '" . $condition . "'";
            }
        }

    
        $car_entities = $client->query_all("Car", $query_condition ); // Select Everything from Car Table 


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
    </div>

    

<!-- Helper function -->
<?php 
    function extractNumbers($inputString) {       
        // Use preg_match to find two numbers separated by a hyphen
        if (preg_match('/(\d+)-(\d+)/', $inputString, $matches)) {
            $num1 = (int) $matches[1]; // Convert to integer
            $num2 = (int) $matches[2]; // Convert to integer

            return [$num1, $num2]; // Return as an array
        }
    }
?>