
<!-- Inventory Page for Car dealership --> 
<!-- Style for inventory.php -->
<style>
    body, html {
        margin: 0;
        padding: 0;
    }
    .main-container {
        display: flex;
        flex-direction: row;
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
    }
    .navbar {
        position: sticky;
        top: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #333;
        padding: 10px 20px;
        color: white;
        font-weight: bold;
    }
    .navbar .nav-left {
        font-size: 1.5em;
    }
    .nav-right {
        display: flex;
        gap: 20px;
    }
    .navbar .nav-right button {
        background-color: #555;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
    }
    .navbar .nav-right button:hover {
        background-color: #777;
    }
    .filter-container {
        width: 20%;
        max-height:900px;
        padding: 10px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-right: 20px;
        margin-left: 20px;
        margin-top: 10px;
    }
    .filter {
        margin-bottom: 20px;
    }
    .filter label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;    }
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
        justify-content: space-between; 
        align-items: stretch;
    }
    .car-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        width: calc(50% - 45px); /* Adjusted to fit two cards per row */
        min-height: 320px;
        max-height: 300px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        text-align: left;
        background-color: #fff;
        display: flex;
    }
    .car-image {
        width: auto; /* Adjusted the image size */
        height: 250px;
        margin-left: 0px;
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 20px;
        border-radius: 5px;
    }
    .apply-filter {
        width:100%;
        height: 40px;
        background-color: #007bff;
        color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }
</style>



<div class="navbar">
            <div class="nav-left">Carcari</div>
            <div class="nav-right">
                <span style="background-color: #3a3a3a; color: white; padding: 10px 15px; border-radius: 5px; font-size: 1em;">Car Inventory List</span>
                <?php if (isset($_GET['Login']) && $_GET['Login'] == '1'): ?>
                    <button onclick="window.location.href='inputForm.php'">Sell Car</button>
                <?php endif; ?> 
                 <?php if (isset($_GET['Login']) && $_GET['Login'] == '0'): ?>
                    <button onclick="window.location.href='orderPage.php'">View Order</button>
                <?php endif; ?> 
                <button onclick="window.location.href='index.php'">Logout</button>
            </div>
    </div>

<div class="main-container">

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
                    <option value="Excellent">Excellent</option>
                    <option value="Good">Good</option>
                    <option value="Fair">Fair</option>
                    <option value="Poor">Poor</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <button type="submit" name="applyFilters" class="apply-filter">Apply Filters</button>
            </form>

        </div>
    
    <div class="car-list">
    <!-- Dynamically load the Car's Card from the mySQL Database -->
    <?php
        // Redirect if needed
        if (isset($_GET['delete']) && $_GET['delete'] === 'success') {
            header("Location: inventory.php?Login=1&deleted=1");
            exit;
        }
        if (isset($_GET['update']) && $_GET['update'] === 'success') {
            header("Location: inventory.php?Login=1&updated=1");
            die('redirecting...'); // confirm this hits
            exit;
        }

        // Redirect after a car is bought to show clean URL
        if (isset($_GET['buy']) && $_GET['buy'] === 'success') {







            header("Location: inventory.php?Login=0&bought=1");
            exit;
        }

        // Show message after redirect
        if (isset($_GET['bought']) && $_GET['bought'] === '1') {
            echo "<p style='color: green;'>Car purchased successfully.</p>";
            echo "<meta http-equiv='refresh' content='2;url=inventory.php?Login=0'>";
        }

        // Show messages then auto-clean the URL (but don't exit, let rest of page render)
        if (isset($_GET['deleted']) && $_GET['deleted'] === '1') {
            echo "<p style='color: green;'>Car deleted successfully.</p>";
            echo "<meta http-equiv='refresh' content='2;url=inventory.php?Login=1'>";
        }
        if (isset($_GET['updated']) && $_GET['updated'] === '1') {
            echo "<p style='color: green;'>Car updated successfully.</p>";
            echo "<meta http-equiv='refresh' content='2;url=inventory.php?Login=1'>";
        }
        
        include_once  __DIR__ . '/../api/database.php';
        // First, grab the Car entities from the Database
        $client = new  DatabaseClient();  
        $query_condition = null; 

        if (!isset($_GET['applyFilters']) && isset($_GET['Login']) && $_GET['Login'] === '0') {
            $query_condition = []; // Let it default to showing all cars
        }
        
        

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
            if (!empty($drivetrain)) {
                $query_condition[] = "drivetrain = '" . $drivetrain . "'";
            }
            if (!empty($manufacturer)) {
                $query_condition[] = "make = '" . $manufacturer . "'";
            }
            if (!empty($body_style)) {
                $query_condition[] = "body_style = '" . $body_style . "'";
            }
            if (!empty($fuel_type)) {
                $query_condition[] = "fuel_type = '" . $fuel_type . "'";
            }
            if (!empty($color)) {
                $query_condition[] = "color = '" . $color . "'";
            }
            if (!empty($transmission)) {
                $query_condition[] = "transmission = '" . $transmission . "'";
            }
            //if (!empty($condition)) {
                //$query_condition[] = "operational_condition = '" . $condition . "'";
            //}
        }

        // Always exclude sold cars
        $query_condition[] = "Sold = 0";

        $car_entities = $client->query_all("Car", $query_condition ); // Select Everything from Car Table 
        

        if (!$car_entities || $car_entities->rowCount() === 0) {
            echo "<p style='color: red;'>No car entries found (query may be malformed).</p>";
        }
        


        // Now we have the car entries, so display them on the card, so 
        // dynamically generate these card with this info from the database 
        if ($car_entities) {
            // Generate the HTML that PHP will spit back to index.php 
            // I wish there was a better way to do this tbh 
            while ( $entry = $car_entities->fetch(PDO::FETCH_ASSOC)) {


                // Compute condition manually (since Operational_Condition is a generated column)
                $mileage = (int) $entry['Mileage'];
                if ($mileage === 0) {
                $computed_condition = 'New';
                } elseif ($mileage < 30000) {
                $computed_condition = 'Excellent';
                } elseif ($mileage < 70000) {
                $computed_condition = 'Good';
                } elseif ($mileage < 100000) {
                $computed_condition = 'Fair';
                } else {
                $computed_condition = 'Poor';
                }

                // Skip this car if user filtered by condition and it doesn't match
                if (!empty($condition) && $condition !== $computed_condition) {
                continue;
                }


                $img_url = $client->query("Image", "Car", ["VIN = '" . $entry["VIN"] . "'"] )->fetch(PDO::FETCH_ASSOC)["Image"];
                
                echo "<div class='car-card'>";
                    //echo "<div class='card-image'>";
                    echo "<img src='$img_url' alt='Picture of a car' class='car-image'>";
                    //echo "<div style='display: flex; flex-direction: column; gap: 10px;'>";
                    echo "<div class = 'car-details'>";
                    //echo "<div>";
                        echo "<h4>"     .  htmlspecialchars($entry['Year']) . " " . htmlspecialchars($entry['Manufacturer']) . " ". htmlspecialchars($entry['Model'])  . "</h4>";
                        echo "<p> Price: $"   . htmlspecialchars($entry['Price'])  . "</p>";
                        echo "<p> Mileage: " . htmlspecialchars($entry['Mileage']) . "</p>";
                        echo "<p> Drivetrain: "   . htmlspecialchars($entry['Drivetrain']) . "</p>";
                        echo "<p> Fuel Type: "   . htmlspecialchars($entry['Fuel_type']) . "</p>";
                        echo "<p> Body Style: "   . htmlspecialchars($entry['Body_Style']) . "</p>";
                        echo "<p> Transmission: "   . htmlspecialchars($entry['Transmission']) . "</p>";
                        echo "<p> Condition: " . htmlspecialchars($computed_condition) . "</p>";


                        //displaying the buttons
                        if (isset($_GET['Login']) && $_GET['Login'] == '1') {
                            // Wrap both buttons side-by-side
                            echo "<div style='margin-top: 10px; display: flex; gap: 10px;'>";
                        
                            // Delete button
                            echo "<form method='POST' action='../backend/deleteCar.php' onsubmit='return confirm(\"Are you sure you want to delete this car?\");'>";
                            echo "<input type='hidden' name='vin' value='" . htmlspecialchars($entry['VIN']) . "' />";
                            echo "<input type='submit' value='Delete Car' style='background-color:red; color:white; border:none; padding:5px 50px; border-radius:5px; cursor:pointer;' />";
                            echo "</form>";
                        
                            // Edit button
                            echo "<form method='GET' action='edit_car.php'>";
                            echo "<input type='hidden' name='id' value='" . htmlspecialchars($entry['VIN']) . "' />";
                            echo "<button type='submit' style='background-color:#ffc107; color:white; padding:5px 70px; border:none; border-radius:5px; cursor:pointer;'>Edit</button>";
                            echo "</form>";
                        
                            echo "</div>"; // close button container
                        }

                        // Display BUY button if user is NOT a seller
                        // Buyer view — show Buy button
                        if (isset($_GET['Login']) && $_GET['Login'] == '0') {
                            echo "<form method='POST' action='../backend/buyCar.php'>";
                            echo "<input type='hidden' name='vin' value='" . htmlspecialchars($entry['VIN']) . "' />";
                            echo "<input type='hidden' name='customer_id' value='10099946' />"; // temp until dynamic ID
                            echo "<button type='submit' style='background-color:green; color:white; border:none; padding:3px 160px; border-radius:5px; cursor:pointer;'>Buy</button>";
                            echo "</form>";
                        }

     
                    echo "</div>";
                echo "</div>";
            }
        }
    ?>
    </div>
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

