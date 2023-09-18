<?php
include "./inc/header.php";
include "./requests.php";
req_create_home();
?>

<body>
    <div class="wrapper">
        <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
        <div class="form-box login">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                <h2>Create Home</h2>
                <div class="input-box">

                    <div class="property-type">

                        For Sale
                        <input type="radio" name="property_type" value="sale" />
                        For Rent
                        <input type="radio" name="property_type" value="rent" />
                        <label>Property Type</label>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" name="city" required />
                    <label>City</label>
                </div>
                <div class="input-box">
                    <input type="text" name="address" required />
                    <label>Address</label>
                </div>
                <div class="input-box">
                    <?php
                    include "./upload.php";
                    echo $message ?? null; ?>
                    <input type="file" name="upload[]" multiple />
                    <label>Photos</label>
                </div>
                <div class="input-box">
                    <input type="number" name="floor" required />
                    <label>Floor</label>
                </div>
                <div class="input-box">
                    <input type="text" name="description" required />
                    <label>Description</label>
                </div>
                <div class="input-box">
                    <div class="perks">

                        <input type="checkbox" name="perks[]" value="air_conditioner" />Air Conditioner
                        <input type="checkbox" name="perks[]" value="elevator" />Elevator
                        <input type="checkbox" name="perks[]" value="renovated" />Renovated
                        <input type="checkbox" name="perks[]" value="furnished" />Furnished
                        <input type="checkbox" name="perks[]" value="bars" />Bars
                        <input type="checkbox" name="perks[]" value="parking" />Parking
                        <input type="checkbox" name="perks[]" value="warehouse" />Warehouse
                        <input type="checkbox" name="perks[]" value="dimension" />Dimension
                    </div>
                    <label>Perks</label>
                </div>

                <div class="input-box">
                    <input type="number" name="price" min=1 />
                    <label>Price</label>
                </div>
                <div class="input-box">
                    <input type="number" name="rooms" min=1 />
                    <label>Rooms</label>
                </div>
                <div class="input-box">
                    <input type="number" name="sqm" min=1 />
                    <label>SQM</label>
                </div>

                <button type="submit" name="create" class="form-btn">Create</button>
            </form>
        </div>
    </div>




</body>

</html>