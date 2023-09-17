<?php include 'inc/header.php';
include "./requests.php" ?>

<?php
$users = get_home();
?>


<h2>Past Feedback</h2>

<?php if (empty($users)) : ?>
  <p class="lead mt-3">There is no feedback</p>
<?php endif; ?>

<?php foreach ($users as $item) : ?>
  <div class="card my-3 w-75">
    <div class="card-body text-center">
      <?php echo $item['username']; ?>
      <div class="text-secondary mt-2">By <?php echo $item['username']; ?> on <?php echo date_format(
                  date_create($item['reg_date']),
                  'g:ia \o\n l jS F Y'
                ); ?></div>
    </div>
  </div>
<?php endforeach; ?>