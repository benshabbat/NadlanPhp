<?php


$roomsNumberMax = 13;
?>

<div class="wrapper">
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" autocomplete="off">
        <div class="input-box">
            <label>Search</label>
            <input type="text" name="valueToSearch" placeholder="Value To Search">
        </div>
        <select name="minPrice">
            <option value="">Min Price</option>
            <option value=0>0</option>
            <?php foreach ($housesPrice as $houseDetails) { ?>
                <option>
                    <?= $houseDetails['price']; ?>
                </option>
            <?php } ?>
        </select>

        <select name="maxPrice">
            <option value="">Max Price</option>
            <?php foreach ($housesPrice as $houseDetails) { ?>
                <option>
                    <?= $houseDetails['price']; ?>
                </option>
            <?php } ?>
        </select>
        <!-- <div>
            <label>Min Price</label>
            <input type="number" name="minPrice" placeholder="Min Price">
        </div>
        <div >
            <label>Max Price</label>
            <input type="number" name="maxPrice" placeholder="Max Price">
        </div> -->
        <select name="cityOption">
            <option value="">City</option>
            <?php foreach ($housesDetails as $houseDetails) { ?>
                <option>
                    <?= $houseDetails['city']; ?>
                </option>
            <?php } ?>
        </select>

        <select name="number_rooms">
            <option value="">Rooms</option>
            <?php foreach ($housesRooms as $houseDetails) { ?>
                <option>
                    <?= $houseDetails['rooms']; ?>
                </option>
            <?php } ?>
        </select>

        <select name="property">
            <option value="">Property</option>
            <option value="sale">Sale</option>
            <option value="rent">Rent</option>
        </select>
        <div class="buttons">
            <button type="submit" name="search" class="form-btn" value="Filter">Search</button>
            <button type="submit" name="clear" class="form-btn" value="Filter">Clear</button>
        </div>
    </form>
</div>