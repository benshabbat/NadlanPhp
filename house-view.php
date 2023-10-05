<?php
include "./config/app.php";
include_once "./controllers/AuthController.php";
include_once "./controllers/HouseController.php";
$authenticated = new AuthController;
$data = $authenticated->authUserDetail();
$houses = new HouseController;
$housesDetails = $houses->houseDetails();
$housesPrice = $houses->houseDetailsForOprtions('price');
$housesRooms =  $houses->houseDetailsForOprtionsRooms();
include "./inc/header.php";
?>
<section class="property">
    <?php
    include "./inc/search-box-filter.php";
    ?>
    <a href="./house-add.php"><button class="form-btn">Add House</button></a>
    <div class="property-container">

        <ul class="property-list">
            <?php
            $housesDetails = $houses->search($property, $city, $rooms, $valueToSearch);
            while ($houseDetails = mysqli_fetch_array($housesDetails)) {
                if ($houseDetails['username'] == $_SESSION['auth_user']['user_username']) {
                    if ($minPrice <= $houseDetails['price'] && $maxPrice >= $houseDetails['price']) {
            ?>
                        <li>
                            <div class="property-card">
                                <a href="./profile-house.php?id=<?= $houseDetails['id']; ?>">
                                    <?php
                                    foreach (json_decode($houseDetails['images']) as $image) {
                                    ?>
                                        <figure class="card-banner">
                                            <img src="./assets/images/houses/<?= $image; ?>" alt="<?= $image ?>" class="img-cover">
                                        </figure>
                                    <?php
                                        break;
                                    }
                                    ?>


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
                                    <div class="crud">

                                        <a href="./house-edit.php?id=<?= $houseDetails['id']; ?>">Edit</a>

                                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                            <button type="submit" name="house_delete_btn" value="<?= $houseDetails['id']; ?>">Delete</button>
                                        </form>
                                    </div>
                                </a>
                            </div>
                        </li>
            <?php
                    }
                }
            }
            ?>
        </ul>

    </div>
</section>