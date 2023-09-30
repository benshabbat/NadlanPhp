<div class="main-wrapper-list">
    <div class="container-list">
        <div class="main-title">
            <h1>Furniture Shop List</h1>
        </div>
        <div class="display-style-btns">
            <button type="button" id="grid-active-btn">
                <i class="fas fa-th"></i>
            </button>
            <button type="button" id="details-active-btn">
                <i class="fas fa-list-ul"></i>
            </button>
        </div>

        <div class="item-list">

            <?php
            $houses = new HouseController;
            $housesDetails = $houses->houseDetails();
            while ($houseDetails = mysqli_fetch_array($housesDetails)) {
                if ($houseDetails['username'] == $_SESSION['auth_user']['user_username']) {
            ?>
                    <div class="item">
                        <div class="item-img">
                            <img src="assets/images/houses/" .<?= $houseDetails['images']; ?>>
                            <div class="icon-list">
                                <button type="button">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                                <button type="button">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                                <button type="button">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="item-detail">
                            <a href="#" class="item-name">Futons</a>
                            <div class="item-price">
                                <span class="new-price"><?= $houseDetails['price']; ?></span>
                            </div>
                            <p><?= $houseDetails['description']; ?></p>
                            <button type="button" class="add-btn">add to cart</button>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>