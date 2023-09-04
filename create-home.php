<?php
include "./html/header.html"

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Nadlan</title>
</head>

<body>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h2>Create Home</h2>
        <label>Property Type</label><br>
        For Sale
        <input type="radio" name="propertyType" value="sale" />
        For Rent
        <input type="radio" name="propertyType" value="rent" />
        <br>
        <label>City</label><br>
        <input type="text" name="city" /><br>
        <label>Address</label><br>
        <input type="text" name="address" /><br>
        <label>Photos</label><br>
        <input type="file" name="photos" /><br>
        <label>Description</label><br>
        <input type="text" name="description" /><br>
        <label>Perks</label><br>
        <input type="text" name="perks" /><br>
        <label>Price</label><br>
        <input type="number" name="price" /><br>
        <label>Rooms</label><br>
        <input type="number" name="rooms" min=1 /><br>
        <button type="submit">Create</button>
    </form>

</body>

</html>