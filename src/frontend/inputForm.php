
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Car Data Input Form</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="index,follow" />
  <meta name="generator" content="GrapesJS Studio" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      width: 80%;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    form {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      width: 48%;
    }

    .form-group.full-width {
      width: 100%;
    }

    label {
      margin-bottom: 5px;
      color: #555;
    }

    input[type="text"],
    input[type="number"],
    textarea {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    textarea {
      resize: vertical;
    }

    button {
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    * {
      box-sizing: border-box;
    }

    #i6cnei {
      position: relative;
    }

    @media (max-width: 992px) {
      #i6cnei {
        position: relative;
        left: 75px;
      }
    }
  </style>
</head>

<body id="ijtr">

  <body id="ijtr-2">
    <div id="i6cnei" class="container">
      <h1 id="i3g99f">Carcari Vehicle Input Form</h1>
      <form method="post" action="../backend/submit_car_data.php?seller_id=20019675">
        <div class="form-group"><label for="make">Make:</label><input type="text" id="make-5" name="make"/></div>
        <div class="form-group"><label for="model">Model:</label><input type="text" id="model-5" name="model"/></div>
        <div class="form-group"><label for="trim">Trim:</label><input type="text" id="trim-5" name="trim"/></div>
        <div class="form-group"><label for="year">Year:</label><input type="number" id="year-5" name="year"/></div>
        <div class="form-group"><label for="color">Color:</label><input type="text" id="color-5" name="color"/></div>
        <div class="form-group"><label for="status">Status:</label><input type="text" id="status-5" name="status"/>
        </div>
        <div class="form-group"><label for="price" id="it7x5p">Price:</label><input type="number" id="price-5" name="price"/>
        </div>
        <div class="form-group"><label for="engine_specs">Engine Specifications:</label><input type="text" id="engine_specs-5" name="engine_specs"/>
        </div>
        <div class="form-group"><label for="mileage">Mileage:</label><input type="number" id="mileage-5" name="mileage"/>
        </div>
        <div class="form-group"><label for="vin">VIN:</label><input type="text" id="vin-5" name="vin"/></div>
        <div class="form-group full-width">
          <label for="description">Description:</label><textarea id="description-5" name="description" rows="4"></textarea>
        </div>
        <div class="form-group full-width"><button type="submit">Submit</button></div>
      </form>
    </div>
  </body>
</body>

</html>