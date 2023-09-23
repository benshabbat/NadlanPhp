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
                    $house = new HouseController;
                    $houseDetails = $house->houseDetail();
                    if ($houseDetails) {
                        foreach ($houseDetails as $houseDetail) {
                    ?>
                        <tr>
                            <td><?= $houseDetail['username']; ?></td>
                            <td><?= $houseDetail['property_type']; ?></td>
                            <td><?= $houseDetail['city']; ?></td>
                            <td><?= $houseDetail['address']; ?></td>
                            <td><?= $houseDetail['floor']; ?></td>
                            <td><?= $houseDetail['description']; ?></td>
                            <td><?= $houseDetail['price']; ?></td>
                            <td><?= $houseDetail['rooms']; ?></td>
                            <td><?= $houseDetail['sqm']; ?></td>
                            <td><?= $houseDetail['perks']; ?></td>
                            <td><?= $houseDetail['images']; ?></td>
                            <td><a href="./house-edit/id?=<?= $houseDetail['id']; ?>.php">Edit</a></td>
                            <td><a href="">Delete</a></td>
                        </tr>
                <?php
                        }
                    } else {
                        echo "No records found";
                    }
                ?>
            </tbody>
        </table>
    </section>
</div>