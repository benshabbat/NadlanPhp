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

    <form class="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
        <h2 class="header">Create Home</h2>
        <label for="property_type" class="form-label"><span>Property Type</span></label>
        <div class="property-type">

            For Sale
            <input type="radio" name="property_type" value="sale" />
            For Rent
            <input type="radio" name="property_type" value="rent" />
        </div>

        <label for="city"><span>City</span></label>
        <input type="text" name="city" />
        <label for="address">Address</label>
        <input type="text" name="address" />
        <label for="floor">Floor</label>
        <input type="text" name="floor" />
        <label for="upload">Photos</label>
        <?php
        include "./upload.php";
        echo $message ?? null; ?>
        <input type="file" name="upload" />
        <label for="description">Description</label>
        <input type="text" name="description" />
        <label for="perks[]">Perks</label>
        <div class="perks">

            <input type="checkbox" name="perks[]" value="air_conditioner" />Air Conditioner
            <input type="checkbox" name="perks[]" value="elevator" />Elevator
            <input type="checkbox" name="perks[]" value="renovated" />Renovated
            <input type="checkbox" name="perks[]" value="furnished" />Furnished
            <input type="checkbox" name="perks[]" value="bars" />Bars
        </div>
        <label for="price">Price</label>
        <input type="number" name="price" />
        <label for="rooms">Rooms</label>
        <input type="number" name="rooms" min=1 />
        <button type="submit" name="create" class="form-btn">Create</button>
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