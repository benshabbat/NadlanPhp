<?php
include('function.php'); 
session_start(); 


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Nadlan</title>
</head>

<body>
  <header class="header">
    <a class="logo" href="index.php">Logo</a>
    <input type="checkbox" id="check" />
    <label for="check" class="icons">
      <i class='bx bx-menu' id="menu-icon"></i>
      <i class='bx bx-x' id="close-icon"></i>
    </label>
    <?php
    nav();
    ?>
    <!-- <nav class="navbar">
      <a href="login.php">My Profile</a>
      <a href="login.php">Houses</a>
      <button class="btn-login">Login</button>
    </nav> -->
  </header>
</body>

</html>