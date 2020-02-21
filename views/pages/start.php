<h1>SKWD ~ Infinity of Wine</h1>
<?php if($this->_params['orderFinished']==true){
    echo '<div class="checkoutMessage">';
    echo 'thank you for your shopping';
    echo '</div>';
    $this->_params['orderFinished']=NULL;
}
?>


<div class="row">
    <div class="column">
        <img src="assets/images/slideGallery/1.jpg" id="slideFirst" alt="Enjoy a glass of wine together with us." style="width:100%" onclick="myFunction(this);"/>
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/2.jpg" alt="From all over the world: The large assortment for wine lovers!" style="width:100%" onclick="myFunction(this);"/>
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/3.jpg" alt="A genuine Palatinate with an exotic soul" style="width:100%" onclick="myFunction(this);"/>
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/4.jpg" alt="Collections from best cellars" style="width:100%" onclick="myFunction(this);"/>
    </div >
    <div class="column">
        <img src="assets/images/slideGallery/5.jpg" alt="Premium wineries from all over the world" style="width:100%" onclick="myFunction(this);"/>
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/6.jpg" alt="Famous manufacturers" style="width:100%" onclick="myFunction(this);"/>
    </div>
</div>

<div class="container-slide">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <img id="expandedImg" style="width:100%">
    <div id="imgtext"></div>
</div>
<?php
$products=\skwd\models\Product::find('discount is not null');
if ($products !== null && count($products) !== 0) :
?>
<h2>Don't miss it !</h2>
<section class="container">
    <?php
    foreach ($products as $product):
            $dbPicture = productsPicture($product['id']);
            $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
            $oldPrice = $product['standardPrice'];
            $price = number_format($oldPrice-($oldPrice*$product['discount']/100), 2, '.', '');
            ?>
            <article>
                <div class="sale-section"><?= $product['discount'] . ' %' ?></div>
                <a href="?c=products&a=theProduct&i=<?= $product['id'] ?>"><img class="container-image"
                                                                      src="<?php echo $picture; ?>"></a><br>
                <div class="container-name">
                    <a href="?c=products&a=theProduct&i=<?= $product['id'] ?>"> <?= $product['prodName']; ?></a>
                </div>
                <div class="old-price"><?= $oldPrice . ' €' ?></div>
                <div class="container-price new-price">
                    <?= 'New price:' . $price . ' €' ?>
                </div>
                <form action="?a=shoppingCartShow&i=<?= $product['id']; ?>" id="addToBasketForm"
                      method="post">
                    <div class="basket-button">
                        <input type="submit" value="Add to basket" onclick="preventDefaultAndUseAjax(event, <?= $product['id']; ?>)"/>
                    </div>
                </form>

            </article>

    <?php endforeach; ?>
</section>
<?php endif; ?>



