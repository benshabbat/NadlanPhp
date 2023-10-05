<?php
include_once "./controllers/HouseController.php";
$houses = new HouseController;
$housesDetails = $houses->houseDetails();

$housesPrice = $houses->houseDetailsForOprtions('price');
$housesRooms =  $houses->houseDetailsForOprtionsRooms();


?>

<section class="property">
    <?php
    include "./inc/search-box-filter.php";
    ?>
    <div class="property-container">
        <ul class="property-list">
            <?php
            $housesDetails = $houses->search($property, $city, $rooms, $valueToSearch);
            if ($housesDetails) {
                foreach ($housesDetails as $houseDetails) {
                    if ($minPrice <= $houseDetails['price'] && $maxPrice >= $houseDetails['price']) {

            ?>
                        <li>
                            <div class="property-card">
                                <a href="./profile-house.php?id=<?= $houseDetails['id']; ?>">
                                    <figure class="card-banner">
                                        <img src="./assets/images/houses/img1.jpg" alt="img1" class="img-cover">
                                        <!-- <img src="./assets/images/houses/".<?= $houseDetails['images']; ?> alt="<?= $houseDetails['images']; ?>" class="img-cover" /> -->
                                    </figure>

                                    <div class="card-content">

                                        <a class="card-title">City <?= $houseDetails['city']; ?> Address <?= $houseDetails['address']; ?> </a>

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
                }
            } else {
                echo "No records found";
            }
            ?>
        </ul>

    </div>
</section>