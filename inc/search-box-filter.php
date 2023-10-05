
<div class="wrapper">
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" autocomplete="off">
        <div class="input-box">
            <label>Search</label>
            <input type="text" name="valueToSearch" placeholder="Value To Search">
        </div>
        <select name="cityOption">
            <option value="">City</option>
            <?php while ($row = mysqli_fetch_array($housesDetails)) : ?>
                <option>
                    <?= $row['city']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <select name="number_rooms">
            <option value="">Rooms</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>

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