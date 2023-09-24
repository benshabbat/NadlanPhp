<?php
include "./config/app.php";

include_once "./controllers/AuthController.php";
$authenticated = new AuthController;
$userDetails = $authenticated->authUserDetail();
include "./inc/header.php";
?>


<div class="wrapper">
    <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
    <div class="form-box login">
        <?php
        if (isset($_GET['id'])) {
            $house_id = mysqli_real_escape_string($db->conn,$_GET['id']);
            $house = new HouseController;
            $result = $house->edit($house_id);
            $houseDetails = $house->houseDetailsById($house_id);
            
        }
        ?>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
            <?php include "./message.php" ?>
            <h2>House Edit</h2>
            <div>
                <label>Property Type:</label>
                <div class="column">
                    <input type="radio" name="property_type" value="sale" checked= <?= $houseDetails['property_type']; ?>  />
                    For Sale
                    <input type="radio" name="property_type" value="rent" checked= <?= $houseDetails['property_type']; ?> />
                    For Rent
                </div>
            </div>
            <div class="input-box">
                <label>City</label>
                <input type="text" name="city" value=<?= $houseDetails['city']; ?> required />
            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address" value=<?= $houseDetails['address']; ?> required />
            </div>
            <div class="input-box">
                <label>Floor</label>
                <input type="number" name="floor" value=<?= $houseDetails['floor']; ?> required />
            </div>
            <div class="input-box">
                <label>Description</label>
                <input type="text" name="description" value=<?= $houseDetails['description']; ?> required />
            </div>
            <div class="input-box">
                <label>Price</label>
                <input type="number" name="price" min=1  value=<?= $houseDetails['price']; ?>/>
            </div>
            <div class="input-box">
                <label>Rooms</label>
                <input type="number" name="rooms" min=1 value=<?= $houseDetails['rooms']; ?> />
            </div>
            <div class="input-box">
                <label>SQM</label>
                <input type="number" name="sqm" min=1 value=<?= $houseDetails['sqm']; ?>/>
            </div>
            <div>
                <label>Perks:</label>
                <div class="column">
                    <input type="checkbox" name="perks[]" value="air_conditioner" checked= <?= $houseDetails['perks']; ?> />Air Conditioner
                    <input type="checkbox" name="perks[]" value="elevator" checked= <?= $houseDetails['perks']; ?> />Elevator
                    <input type="checkbox" name="perks[]" value="renovated" checked= <?= $houseDetails['perks']; ?> />Renovated
                    <input type="checkbox" name="perks[]" value="furnished" checked= <?= $houseDetails['perks']; ?> />Furnished
                    <input type="checkbox" name="perks[]" value="bars" checked= <?= $houseDetails['perks']; ?>/>Bars
                    <input type="checkbox" name="perks[]" value="parking" checked= <?= $houseDetails['perks']; ?>/>Parking
                    <input type="checkbox" name="perks[]" value="warehouse" checked= <?= $houseDetails['perks']; ?>/>Warehouse
                    <input type="checkbox" name="perks[]" value="dimension" checked= <?= $houseDetails['perks']; ?>/>Dimension
                </div>
            </div>

            <div class="input-box">
                <label>Photos</label>
                <?php
                include "./inc/upload.php";
                echo $message ?? null; ?>
                <input type="file" name="image[]" multiple />
            </div>

            <button type="submit" name="house_add_btn" class="form-btn">Create</button>
        </form>
    </div>
</div>