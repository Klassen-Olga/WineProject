<h1>SKWD ~ Infinity of Wine</h1>


<div class="row">
    <div class="column">
        <img src="assets/images/slideGallery/1.jpg" alt="Enjoy a glass of wine together with us." style="width:100%" onclick="myFunction(this);"
             onload="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/2.jpg" alt="Snow" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/3.jpg" alt="Mountains" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/4.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/5.jpg" alt="Mountains" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/6.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
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
    2 => 11,
    3 => 12,
    4 => 13,
    5 => 14,
    6 => 15,
    7=>50,
    8=>75

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
            $oldPrice=0;
            ?>
            <article>
                <div class="sale-section"><?= $value.' %'?></div>
                <a href="?c=products&a=theProduct&i=<?= $key ?>"><img class="container-image"
                                                                      src="<?php echo $picture; ?>"></a><br>
                <div class="container-name">
                    <a href="?c=products&a=theProduct&i=<?= $key ?>"> <?= $dbQuery[0]['prodName']; ?></a>
                </div>
                <div class="old-price"><?= $oldPrice. ' €'?></div>
                <div class="container-price new-price">
                    <?='New price:' . $price . ' €' ?>
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



