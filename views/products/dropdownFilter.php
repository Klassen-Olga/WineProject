<div class="dropdown">
    <?php
    $regions = ['Germany', 'Italy', 'France', 'USA', 'Austria', 'Spain', 'Sweden', 'Finland', 'Malta'];
    ?>
    <button onclick="dropDownToggle(this)" class="dropbtn">Region</button>
    <div id="regionDropdown" class="dropdown-content" style="display: none">
        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
        <?php foreach ($regions as $region): ?>

            <a href="<?= removeQuery(array('region')) ?>&region=<?= $region; ?>"><?= $region; ?></a>
        <?php endforeach; ?>
        <a href="<?= removeQuery(array('region')); ?>" class="resetButton">Reset</a>
    </div>
</div>
<div class="dropdown">
    <button onclick="dropDownToggle(this)" class="dropbtn">Year</button>
    <?php
    $years = ["2020", "2019", "2017", "2015", "2013", "2000", "1999"];
    ?>
    <div id="yearDropdown" class="dropdown-content" style="display: none">
        <?php foreach ($years as $year): ?>
            <a href="<?= removeQuery(array('year')) ?>&year=<?= $year; ?>"><?= $year; ?></a>
        <?php endforeach; ?>
        <a href="<?= removeQuery(array('year')); ?>" class="resetButton">Reset</a>
    </div>
</div>
<div class="dropdown">
    <button onclick="dropDownToggle(this)" class="dropbtn">Price</button>
    <div id="priceDropdown" class="dropdown-content" style="display: none">
        <a href="<?= removeQuery(array('minPrice', 'maxPrice')) ?>&minPrice=0.1&maxPrice=10">Up to 10 €</a>
        <a href="<?= removeQuery(array('minPrice', 'maxPrice')) ?>&minPrice=10&maxPrice=50">From 10 to 50 €</a>
        <a href="<?= removeQuery(array('minPrice', 'maxPrice')) ?>&minPrice=50&maxPrice=100">From 50 to 100 €</a>
        <a href="<?= removeQuery(array('minPrice', 'maxPrice')) ?>&minPrice=100&maxPrice=500">From 100 to 500 €</a>
        <a href="<?= removeQuery(array('minPrice', 'maxPrice')) ?>&minPrice=5000&maxPrice=1000">From 500 to 1000 €</a>
        <a href="<?= removeQuery(array('minPrice', 'maxPrice')); ?>" class="resetButton">Reset</a>
    </div>
</div>
