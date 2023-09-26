<?php

include_once "./controllers/HouseController.php";

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
                    <th>Photos</th>
                </tr>
            </thead>
            <tbody> <?php
            
                    $houses = new HouseController;
                    $housesDetails = $houses->houseDetails();
                    if ($housesDetails) {
                        foreach ($housesDetails as $houseDetails) {
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
                            </form>
                        </td>
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