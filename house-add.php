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
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
            <?php include "./message.php" ?>
            <h2>House ADD</h2>
            <div>
                <label>Property Type:</label>
                <div class="column">
                    <input type="radio" name="property_type" value="sale" />
                    For Sale
                    <input type="radio" name="property_type" value="rent" />
                    For Rent
                </div>
            </div>
            <div class="input-box">
                <label>City</label>
                <input type="text" name="city" required />
            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address" required />
            </div>
            <div class="input-box">
                <label>Floor</label>
                <input type="number" name="floor" min=1 />
            </div>
            <div class="input-box">
                <label>Description</label>
                <input type="text" name="description" required />
            </div>
            <div class="input-box">
                <label>Price</label>
                <input type="number" name="price" min=1 />
            </div>
            <div class="input-box">
                <label>Rooms</label>
                <select name="rooms">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
                <!-- <input type="number" name="rooms" min=1 /> -->
            </div>
            <div class="input-box">
                <label>SQM</label>
                <input type="number" name="sqm" min=1 />
            </div>
            <div>
                <label>Perks:</label>

                <input type="checkbox" name="perks[]" value="air_conditioner" />Air Conditioner
                <input type="checkbox" name="perks[]" value="elevator" />Elevator
                <input type="checkbox" name="perks[]" value="renovated" />Renovated
                <input type="checkbox" name="perks[]" value="furnished" />Furnished<br />

                <input type="checkbox" name="perks[]" value="bars" />Bars
                <input type="checkbox" name="perks[]" value="parking" />Parking
                <input type="checkbox" name="perks[]" value="warehouse" />Warehouse
                <input type="checkbox" name="perks[]" value="dimension" />Dimension
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