<?php
include "./config/app.php";
include_once "./controllers/UserController.php";
include "./inc/header.php";
?>
<?php
if (isset($_GET['id'])) {
    $house_id = mysqli_real_escape_string($db->conn, $_GET['id']);
    $house = new HouseController;
    $houseDetails = $house->houseDetailsById($house_id);
    $owner = new UserController;
    $ownerDetails = $owner->userDetailsByUsername($houseDetails['username']);
    // $houseDetails = $house->houseDetailsById($house_id);
    $perks = $houseDetails['perks'];
    $perks = explode(",", $perks);
}
?>
<div class="section-profile-house">
    <div class="card-wrapper">
        <div class="card">
            <!-- card left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <img src="./assets/shoes_images/shoe_1.jpg" alt="shoe image">
                        <img src="./assets/shoes_images/shoe_2.jpg" alt="shoe image">
                        <img src="./assets/shoes_images/shoe_3.jpg" alt="shoe image">
                        <img src="./assets/shoes_images/shoe_4.jpg" alt="shoe image">
                    </div>
                </div>
                <div class="img-select">
                    <div class="img-item">
                        <a href="#" data-id="1">
                            <img src="./assets/shoes_images/shoe_1.jpg" alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="2">
                            <img src="./assets/shoes_images/shoe_2.jpg" alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="3">
                            <img src="./assets/shoes_images/shoe_3.jpg" alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="4">
                            <img src="./assets/shoes_images/shoe_4.jpg" alt="shoe image">
                        </a>
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class="product-content">
                <div class="product-link"> For <?= $houseDetails['property_type']; ?></div>
                <h4 class="product-title"><?= $houseDetails['address']; ?><span><?= $houseDetails['city']; ?></span></h4>
                <p class="product-price">Price: <span><?= $houseDetails['price']; ?>

                        <div class="product-detail">
                            <h2>about this item: </h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
                            <ul>
                                <li>Rooms:<?= $houseDetails['rooms']; ?></li>
                                <li>Floor:<?= $houseDetails['floor']; ?></li>
                                <li>Sqm:<?= $houseDetails['sqm']; ?></li>
                                <?php foreach ($perks as $perk) : ?>
                                    <li><?= $perk; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
            </div>
        </div>
    </div>
    <div class="product-owner">
        <p> Owner:<?= $ownerDetails['username']; ?></p>
        <p> Phone:<?= $ownerDetails['phone']; ?></p>
        <p> Email:<?= $ownerDetails['email']; ?></p>


    </div>
</div>



<script>
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage() {
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);
</script>