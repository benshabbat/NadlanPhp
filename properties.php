<?php
include_once "./controllers/HouseController.php";
include "./inc/header.php";



if (isset($_POST['search'])) // search cars
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = " SELECT * FROM `houses` WHERE CONCAT (`username`,`city`, `typecar`, `images`, `address`, `sqm`, `rooms`, `floor`, `price`,`property_type`) LIKE '%" . $valueToSearch . "%' ";
} else {
    $query = " SELECT * FROM `houses`";
}
$result = mysqli_query($con, $query);
?>

<section class="property">
    <div class="search-fltier">
        <div class="input-search">
            <input type="text" name="valueToSearch" placeholder="Value To Search">
            <button type="submit" name="search" class="btn" value="Filter">חפש</button>
        </div>
    </div>
    <div class="property-slider-box">
        <label for="priceRange">Price Range:</label>
        <input type="text" id="priceRange" readonly>
        <div id="price-range" class="property-slider"></div>
    </div>
    <div class="property-container">
        <ul class="property-list">
            <?php
            $houses = new HouseController;
            $housesDetails = $houses->houseDetails();
            if ($housesDetails) {
                foreach ($housesDetails as $houseDetails) {
            ?>
                    <li>
                        <div class="property-card">
                            <a href="./profile-house.php?id=<?= $houseDetails['id']; ?>">
                                <figure class="card-banner">
                                    <img src="./assets/images/houses/img1.jpg" alt="img1" class="img-cover">
                                    <!-- <img src="./assets/images/houses/".<?= $houseDetails['images']; ?> alt="<?= $houseDetails['images']; ?>" class="img-cover" /> -->
                                </figure>

                                <div class="card-content">

                                    <h2 href="#" class="card-title">City <?= $houseDetails['city']; ?> </h2>
                                    <h3 href="#" class="card-title">Address <?= $houseDetails['address']; ?> </h3>

                                    <ul class="card-list">
                                        <li class="card-item">
                                            <div class="item-icon">
                                                <ion-icon name="cube-outline"></ion-icon>
                                            </div>

                                            <span class="item-text"><?= $houseDetails['sqm']; ?> sqm</span>
                                        </li>

                                        <li class="card-item">
                                            <div class="item-icon">
                                                <ion-icon name="bed-outline"></ion-icon>
                                            </div>
                                            <span class="item-text"><?= $houseDetails['rooms']; ?> Rooms</span>
                                        </li>

                                        <li class="card-item">
                                            <div class="item-icon">
                                                <ion-icon name="man-outline"></ion-icon>
                                            </div>
                                            <span class="item-text"><?= $houseDetails['floor']; ?> floor</span>
                                        </li>
                                    </ul>

                                    <div class="card-meta">
                                        <div>
                                            <span class="meta-title">Price</span>
                                            <span class="meta-text"><?= $houseDetails['price']; ?>$</span>
                                        </div>

                                        <div>
                                            <span class="meta-title">For</span>
                                            <span class="meta-text"> <?= $houseDetails['property_type']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
            <?php
                }
            } else {
                echo "No records found";
            }
            ?>
        </ul>
    </div>
</section>