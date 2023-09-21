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

    <?php if (isset($_SESSION['authenticated'])) : ?>
      <nav class="navbar">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
          <button type="submit" name="logout_btn">Logout</button>
        </form>
        <a href="houses.php">כל הדירות</a>
        <a href="profile.php">Hello <?php echo $_SESSION['auth_user']["user_username"]; ?></a>
      </nav>
    <?php else : ?>
      <nav class="navbar">
        <a href="profile.php">My Profile</a>
        <a href="houses.php">Houses</a>
        <a href="login.php">Login</a>
        <!-- <button class="btn-login">Login</button> -->
      </nav>
    <?php endif; ?>
  </header>
</body>

</html>