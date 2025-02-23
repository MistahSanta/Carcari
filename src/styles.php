<!-- Holds all the CSS or style component used by the entire program. Loaded in the <head> 
    inside the index.php file --> 

<!-- Style for inventory.php -->
<style>
    body {
        display: flex;
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
    }
    /* Fit the image to the parent contain */
    img {
        width:100%;
        height: 100%;
        object-fit: contain;
    }
    nav {
        overflow: hidden;
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
