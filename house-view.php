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
                </tr>
            </thead>
            <tbody> <?php
                    $house = new HouseController;
                    $houseDetails = $house->houseDetail();
                    if ($houseDetails) {
                        foreach ($houseDetails as $houseDetail) {
                    ?>
                        <tr>
                            <td><?php echo $houseDetail['username']; ?></td>
                            <td><?php echo $houseDetail['property_type']; ?></td>
                            <td><?php echo $houseDetail['city']; ?></td>
                            <td><?php echo $houseDetail['address']; ?></td>
                            <td><?php echo $houseDetail['floor']; ?></td>
                            <td><?php echo $houseDetail['description']; ?></td>
                            <td><?php echo $houseDetail['price']; ?></td>
                            <td><?php echo $houseDetail['rooms']; ?></td>
                            <td><?php echo $houseDetail['sqm']; ?></td>
                            <td><?php echo $houseDetail['perks']; ?></td>
                            <td><?php echo $houseDetail['images']; ?></td>
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