<?php
function sql_register($username,$email,$phone,$hash)
{
    include "./config/database.php";
    if (empty($usernameErr) && empty($emailErr) && empty($phoneErr)) {
        // add to database
        $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email','$phone', ' $hash')";
        try {
            mysqli_query($conn, $sql);
            echo "user is now registered";
        } catch (mysqli_sql_exception) {
            echo "you are cant register";
        }
        mysqli_close($conn);
    }
    
}

?>
<?php
function sql_login($username,$password)
{
    include "./config/database.php";
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    try {
        mysqli_query($conn, $sql);
        echo "user is now logged in";
    } catch (mysqli_sql_exception) {
        echo "you are cant login";
    }
    mysqli_close($conn);
}
?>
<?php
function sql_create_homes($perks,  $property_type, $city, $address, $floor, $description, $price, $rooms,$sqm ,$files_array){
    include "./config/database.php";
    $sql = "INSERT INTO houses (property_type,city,address, floor, description,price,rooms, sqm, perks, images)
     VALUES ('$property_type', '$city', '$address','$floor','$description', '$price',  '$rooms','$sqm' ,'$perks', '$files_array')";
    try {
        mysqli_query($conn, $sql);
        echo "created successfully";
    } catch (mysqli_sql_exception) {
        echo "get failed";
    }
    mysqli_close($conn);
}
?>
<?php
function sql_get_homes(){
    include "./config/database.php";
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
