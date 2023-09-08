<?php
include "./html/header.html";
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

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
        <h2>Create Home</h2>
        <label for="property_type">Property Type</label><br>
        For Sale
        <input type="radio" name="property_type" value="sale" />
        For Rent
        <input type="radio" name="property_type" value="rent" />
        <br>
        <label for="city">City</label><br>
        <input type="text" name="city" /><br>
        <label for="address">Address</label><br>
        <input type="text" name="address" /><br>
        <label for="floor">Floor</label><br>
        <input type="text" name="floor" /><br>
        <label for="upload">Photos</label><br>
        <?php
        include "./upload.php";
        echo $message ?? null; ?>
        <input type="file" name="upload" /><br>
        <label for="description">Description</label><br>
        <input type="text" name="description" /><br>
        <label for="perks[]">Perks</label><br>
        <input type="checkbox" name="perks[]" value="air_conditioner" />Air Conditioner<br>
        <input type="checkbox" name="perks[]" value="elevator" />Elevator<br>
        <input type="checkbox" name="perks[]" value="renovated" />Renovated<br>
        <input type="checkbox" name="perks[]" value="furnished" />Furnished<br>
        <input type="checkbox" name="perks[]" value="bars" />Bars<br>
        <label for="price">Price</label><br>
        <input type="number" name="price" /><br>
        <label for="rooms">Rooms</label><br>
        <input type="number" name="rooms" min=1 /><br>
        <button type="submit" name="create">Create</button>
    </form>

</body>

</html>

<?php
if (isset($_POST['create'])) {
    $property_type = $_POST['property_type'];
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
    $floor = filter_input(INPUT_POST, "address", FILTER_SANITIZE_NUMBER_INT);
    $description =  filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
    $rooms = filter_input(INPUT_POST, "rooms", FILTER_SANITIZE_NUMBER_INT);
    $perks = $_POST['perks'];
    $perks = implode(',', $perks);
    echo $perks,  $property_type, $city, $address, $floor, $description, $price, $rooms;
}
?>