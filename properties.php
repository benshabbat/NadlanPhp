<?php
include_once "./controllers/HouseController.php";
include "./inc/header.php";
?>

<section class="property">
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
                            <figure class="card-banner">
                                <img src="./assets/images/houses/".<?=$houseDetails['images']; ?> alt="<?= $houseDetails['images']; ?>" class="img-cover" />
                            </figure>

                            <div class="card-content">
                                <h3 class="property-h3">
                                    <a href="#" class="card-title">City <?= $houseDetails['city']; ?> Address <?= $houseDetails['address']; ?> </a>
                                </h3>
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