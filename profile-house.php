<?php
include "./config/app.php";
include_once "./controllers/AuthController.php";

$authenticated = new AuthController;
$userDetails = $authenticated->authUserDetail();
include "./inc/header.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  </head>
  <body>
  <?php
        if (isset($_GET['id'])) {
            $house_id = mysqli_real_escape_string($db->conn,$_GET['id']);
            $house = new HouseController;
            $houseDetails = $house->edit($house_id);
            // $houseDetails = $house->houseDetailsById($house_id);
            $perks = $houseDetails['perks'];
            $perks = explode(",",$perks);
            
        }
        ?>
    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "shoes_images/shoe_1.jpg" alt = "shoe image">
              <img src = "shoes_images/shoe_2.jpg" alt = "shoe image">
              <img src = "shoes_images/shoe_3.jpg" alt = "shoe image">
              <img src = "shoes_images/shoe_4.jpg" alt = "shoe image">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "shoes_images/shoe_1.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "shoes_images/shoe_2.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "shoes_images/shoe_3.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "shoes_images/shoe_4.jpg" alt = "shoe image">
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"><?= $houseDetails['city']; ?></h2>
          <a href = "#" class = "product-link"> For <?= $houseDetails['property_type']; ?></a>

          <div class = "product-price">
            <p class = "new-price">Price: <span><?= $houseDetails['price']; ?></span></p>
          </div>

          <div class = "product-detail">
            <h2>about this item: </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
            <ul>
            <?php foreach ($perks as $perk): ?>
              <li><?= $perk; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    
    <script src="./assets/js/script.js"></script>
