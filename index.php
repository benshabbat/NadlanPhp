<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    
    <body>
    <form action="index.php" method="post">
        <label>Home</label><br>
        <input type="text" name="home" /><br>
        <label>Address</label><br>
        <input type="text" name="address" /><br>
        <label>Rooms</label><br>
        <input type="number" name="rooms" min=1 /><br>
        <label>Cost</label><br>
        <input type="number" name="cost" min=0 /><br>
        <button type="submit">Create</button>
    </form>
</body>

</html>
<?php echo "$_POST[home]" ?>