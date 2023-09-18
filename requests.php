<?php
include "./sql.php";

function req_register()
{
    $username = $email = $phone = $password = $confirm_password = $hash = "";
    if (isset($_POST['register'])) {
        $username =  filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $email =  filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (strcmp($password, $confirm_password) == 0) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
        }
        sql_register($username, $email, $phone, $hash);
        // $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email','$phone', ' $hash')";

        // try {
        //     mysqli_query($conn, $sql);
        //     echo "user is now registered";
        // } catch (mysqli_sql_exception) {
        //     echo "you are cant register";
        // }
    }
    echo password_verify($password,  $hash) . '<br>';

    echo $hash;
}
function req_login()
{
    if (isset($_POST['login'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        sql_login($username, $password);
        header("location: /ProjectPhp/index.php");
    }
}


function req_create_home()
{
    include "./config/database.php";
    $query=" select * from users "; 
    $result=mysqli_query($conn, $query); 
    while($rows=mysqli_fetch_array($result)) // למלא נתונים אוטמטיים על המשתמש שמחובר לאתר 
    {
        if($rows['username']==$_SESSION['username']) 
        {
            $username =$rows['username'];
        }
            
    }
    include "./upload.php";
    if (isset($_POST['create'])) {
        // $username = $_SESSION['username'];
        $property_type = $_POST['property_type'];
        $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $floor = filter_input(INPUT_POST, "address", FILTER_SANITIZE_NUMBER_INT);
        $description =  filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
        $rooms = filter_input(INPUT_POST, "rooms", FILTER_SANITIZE_NUMBER_INT);
        $sqm = filter_input(INPUT_POST, "sqm", FILTER_SANITIZE_NUMBER_INT);
        $perks = $_POST['perks'];
        $perks = implode(',', $perks);
        sql_create_homes($username,$perks,  $property_type, $city, $address, $floor, $description, $price, $rooms,$sqm ,$files_array);
    }
}

function get_home()
{

    return sql_get_homes();
}
// mysqli_close($conn);
