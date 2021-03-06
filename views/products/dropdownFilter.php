<div class="dropdown-wrap">
<div class="dropdown">
    <?php
    $regions=$this->_params['region'];
    ?>
    <button  class="dropbtn" ">Region</button>
    <div id="regionDropdown" class="dropdown-content">
        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
        <?php foreach($regions as $region):?>

            <a href="<?= removeQuery(array('region', 'page'))?>&region=<?=$region;?>&page=1"><?=$region;?></a>
        <?php endforeach;?>
        <a href="<?=removeQuery(array('region'));?>" class="resetButton">Reset</a>
    </div>
</div>
<div class="dropdown">
    <button class="dropbtn">Year</button>
    <?php
    $years=$this->_params['year'];
    ?>
    <div id="yearDropdown" class="dropdown-content">
        <?php foreach($years as $year):?>
            <a href="<?= removeQuery(array('year', 'page'))?>&year=<?=$year;?>&page=1"><?=$year;?></a>
        <?php endforeach;?>
        <a href="<?=removeQuery(array('year'));?>" class="resetButton">Reset</a>
    </div>
</div>
<div class="dropdown">
    <button class="dropbtn">Price</button>
    <div id="priceDropdown" class="dropdown-content">
            <a href="<?= removeQuery(array('minPrice', 'maxPrice', 'page'))?>&minPrice=0.1&maxPrice=10">Up to 10€</a>
            <a href="<?= removeQuery(array('minPrice', 'maxPrice', 'page'))?>&minPrice=10&maxPrice=50">From 10 to 50 €</a>
            <a href="<?= removeQuery(array('minPrice', 'maxPrice', 'page'))?>&minPrice=50&maxPrice=100">From 50 to 100 €</a>
            <a href="<?= removeQuery(array('minPrice', 'maxPrice', 'page'))?>&minPrice=100&maxPrice=500">From 100 to 500 €</a>
            <a href="<?= removeQuery(array('minPrice', 'maxPrice', 'page'))?>&minPrice=500&maxPrice=1000">From 500 to 1000 €</a>
            <a href="<?=removeQuery(array('minPrice', 'maxPrice','page'));?>&page=1" class="resetButton">Reset</a>
    </div>
</div>
</div>