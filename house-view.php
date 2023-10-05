<?php
include "./config/app.php";
include_once "./controllers/AuthController.php";
include_once "./controllers/HouseController.php";
$authenticated = new AuthController;
$data = $authenticated->authUserDetail();
include "./inc/header.php";
?>
<!-- <div className="table-container">
    <section className="table__header">
        <h1>Houses</h1>
        <div className="input-group">
            <input type="search" placeholder="Search Data..." onChange={search} />
        </div>
    </section>
    <section className="table__body">
        <table>
            <thead>
                <tr>
                    <th>username</th>
                    <th>property_type</th>
                    <th>city</th>
                    <th>address</th>
                    <th>floor</th>
                    <th>description</th>
                    <th>price</th>
                    <th>rooms</th>
                    <th>sqm</th>
                    <th>perks</th>
                    <th>images</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th><a href="house-add.php">Add House</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $houses = new HouseController;
                $housesDetails = $houses->houseDetails();
                while ($houseDetails = mysqli_fetch_array($housesDetails)) {
                    if ($houseDetails['username'] == $_SESSION['auth_user']['user_username']) {
                ?>
                        <tr>
                            <td><?= $houseDetails['username']; ?></td>
                            <td><?= $houseDetails['property_type']; ?></td>
                            <td><?= $houseDetails['city']; ?></td>
                            <td><?= $houseDetails['address']; ?></td>
                            <td><?= $houseDetails['floor']; ?></td>
                            <td><?= $houseDetails['description']; ?></td>
                            <td><?= $houseDetails['price']; ?></td>
                            <td><?= $houseDetails['rooms']; ?></td>
                            <td><?= $houseDetails['sqm']; ?></td>
                            <td><?= $houseDetails['perks']; ?></td>
                            <td><?= $houseDetails['images']; ?></td>
                            <td><a href="./house-edit.php?id=<?= $houseDetails['id']; ?>">Edit</a></td>
                            <td>
                                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                    <button type="submit" name="house_delete_btn" value="<?= $houseDetails['id']; ?>">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </section>
</div> -->

<section class="property">
    <?php
    include "./inc/search-box-filter.php";
    ?>
    <a href="./house-add.php"><button  class="form-btn">Add House</button></a>
    <div class="property-container">

        <ul class="property-list">
            <?php
            $houses = new HouseController;
            $housesDetails = $houses->houseDetails();
            while ($houseDetails = mysqli_fetch_array($housesDetails)) {
                if ($houseDetails['username'] == $_SESSION['auth_user']['user_username']) {
            ?>
                    <li>
                        <div class="property-card">
                            <a href="./profile-house.php?id=<?= $houseDetails['id']; ?>">
                                <figure class="card-banner">
                                    <img src="./assets/images/houses/img1.jpg" alt="img1" class="img-cover">
                                    <!-- <img src="./assets/images/houses/".<?= $houseDetails['images']; ?> alt="<?= $houseDetails['images']; ?>" class="img-cover" /> -->
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
            ?>
        </ul>

    </div>
</section>