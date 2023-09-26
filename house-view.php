<?php
include "./config/app.php";
include_once "./controllers/AuthController.php";
include_once "./controllers/HouseController.php";
$authenticated = new AuthController;

include "./inc/header.php";
?>


<div className="table-container">
    <section className="table__header">
        <h1>Houses</h1>
        <div className="input-group">
            <input type="search" placeholder="Search Data..." onChange={search} />
        </div>
    </section>
    <section className="table__body">
        <table>
            <thead>
                <tr>
                    <th>username</th>
                    <th>property_type</th>
                    <th>city</th>
                    <th>address</th>
                    <th>floor</th>
                    <th>description</th>
                    <th>price</th>
                    <th>rooms</th>
                    <th>sqm</th>
                    <th>perks</th>
                    <th>upload</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody> <?php
                    $houses = new HouseController;
                    $housesDetails = $houses->houseDetails();
                    while ($houseDetails = mysqli_fetch_array($housesDetails)) {
                        if ($houseDetails['username'] == "david") {
                    ?>
                        <tr>
                            <td><?= $houseDetails['username']; ?></td>
                            <td><?= $houseDetails['property_type']; ?></td>
                            <td><?= $houseDetails['city']; ?></td>
                            <td><?= $houseDetails['address']; ?></td>
                            <td><?= $houseDetails['floor']; ?></td>
                            <td><?= $houseDetails['description']; ?></td>
                            <td><?= $houseDetails['price']; ?></td>
                            <td><?= $houseDetails['rooms']; ?></td>
                            <td><?= $houseDetails['sqm']; ?></td>
                            <td><?= $houseDetails['perks']; ?></td>
                            <td><?= $houseDetails['images']; ?></td>
                            <td><a href="./house-edit.php?id=<?= $houseDetails['id']; ?>">Edit</a></td>
                            <td>
                                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="$_POST">
                                    <button type="submit" name="delete_btn" value="<?= $houseDetails['id']; ?>">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php
                        }
                    }
                    //     else {
                    //        echo "No records found";
                    //    }
                ?>
            </tbody>
        </table>
    </section>
</div>