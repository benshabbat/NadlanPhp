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
                    <?php
                    foreach (json_decode($houseDetails['images']) as $image) {
                    ?>
                        <div class="img-showcase">
                            <img src="./assets/images/houses/<?= $image; ?>" alt="<?= $image ?>" />
                        </div>
                    <?php
                        break;
                    }
                    ?>
                </div>
                <div class="img-select">
                    <?php
                    $i = 1;
                    foreach (json_decode($houseDetails['images']) as $image) {
                    ?>
                        <div class="img-item">
                            <a href="#" data-id="<?= $i; ?>">
                                <img src="./assets/images/houses/<?= $image; ?>" alt="<?= $image; ?>" />
                            </a>
                        </div>
                    <?php
                        $i++;
                    }
                    ?>
                </div>

            </div>
            
            <!-- card right -->
            <div class="product-content">
                <div class="product-link"> For <?= $houseDetails['property_type']; ?></div>
                <h4 class="product-title"><?= $houseDetails['address']; ?><span><?= $houseDetails['city']; ?></span></h4>
                <p class="product-price">Price: <span><?= $houseDetails['price']; ?>

                        <div class="product-detail">
                            <h4><?= $houseDetails['description']; ?></h4>
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

        document.querySelector('.img-showcase').style.transform = $imgId;
    }

    window.addEventListener('resize', slideImage);
</script>