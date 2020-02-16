<h1>SKWD ~ Infinity of Wine</h1>

<h2><?php echo $this->_params['orderFinished']?></h2>


<div class="row">
    <div class="column">
        <img src="assets/images/slideGallery/1.jpg" alt="Enjoy a glass of wine together with us." style="width:100%"
             onclick="myFunction(this);"
             onload="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/2.jpg" alt="From all over the world: The large assortment for wine lovers!" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/3.jpg" alt="A genuine Palatinate with an exotic soul" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/4.jpg" alt="Collections from best cellars" style="width:100%" onclick="myFunction(this);">
    </div >
    <div class="column">
        <img src="assets/images/slideGallery/5.jpg" alt="Premium wineries from all over the world" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/6.jpg" alt="Famous manufacturers" style="width:100%" onclick="myFunction(this);">
    </div>
</div>

<div class="container-slide">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <img id="expandedImg" style="width:100%">
    <div id="imgtext"></div>
</div>
<h2>Don't miss it !</h2>
<?php
/*key=productId, value sale in %*/
$saleProducts = [
    1 => 10,
    2 => 15,
    3 => 20,
    4 => 30,
    5 => 50,
    6 => 75,
    7 => 50,
    8 => 90

];
?>
<section class="container">
    <?php foreach ($saleProducts as $key => $value):
        $dbQuery = null;
        $dbQuery = \skwd\models\Product::find('id=' . $key);
        if ($dbQuery !== null && count($dbQuery) !== 0) :

            $dbPicture = productsPicture($key);
            $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
            $price = $dbQuery[0]['standardPrice'];
            $oldPrice = number_format($dbQuery[0]['standardPrice']*100/(100-$value), 2, '.', '');
            ?>
            <article>
                <div class="sale-section"><?= $value . ' %' ?></div>
                <a href="?c=products&a=theProduct&i=<?= $key ?>"><img class="container-image"
                                                                      src="<?php echo $picture; ?>"></a><br>
                <div class="container-name">
                    <a href="?c=products&a=theProduct&i=<?= $key ?>"> <?= $dbQuery[0]['prodName']; ?></a>
                </div>
                <div class="old-price"><?= $oldPrice . ' €' ?></div>
                <div class="container-price new-price">
                    <?= 'New price:' . $price . ' €' ?>
                </div>
                <iframe name="hiddenFrame" class="hide"></iframe>
                <form action="?a=shoppingCartShow&i=<?= $key; ?>&p=<?= $price; ?>"
                      method="post" <?= usersIdIfLoggedIn() === null ? "" : "target=\"hiddenFrame\"" ?>>
                    <div class="basket-button">
                        <button type="submit">Add to basket</button>
                    </div>
                </form>

            </article>
        <?php endif; ?>
    <?php endforeach; ?>
</section>



