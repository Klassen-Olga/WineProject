<?php if($this->_params['orderFinished']==true){

    echo '<div class="checkoutMessage">';
    echo 'Thank you for your shopping <br> <br> <p class="smallText">You can view or print out your order under the my orders page.</p>';
    if($_SESSION['payMethod']=='paypal'){
        echo '<script> window.onload = function () {window.open("https://www.paypal.com/sg/signin");} </script>';  
    }
    echo '</div>';
    $this->_params['orderFinished']=NULL;
}
$products = $this->_params['products'];
?>

<div id="postList">
    <h1>SKWD ~ Infinity of Wine</h1>
    <?php if ($this->_params['orderFinished'] == true) {
        echo '<div class="checkoutMessage">';
        echo 'thank you for your shopping';
        echo '</div>';
        $this->_params['orderFinished'] = NULL;
    } ?>
    <div class="row">
        <div class="column" >
            <img class="zoom"  src="assets/images/slideGallery/1.jpg" id="slideFirst" alt="Enjoy a glass of wine together with us."
                 style="width:100%" onclick="expandSlide(this);"/>
        </div>
        <div class="column">
            <img class="zoom"  src="assets/images/slideGallery/2.jpg"
                 alt="From all over the world: The large assortment for wine lovers!" style="width:100%"
                 onclick="expandSlide(this);"/>
        </div>
        <div class="column">
            <img class="zoom" src="assets/images/slideGallery/3.jpg" alt="A genuine Palatinate with an exotic soul"
                 style="width:100%" onclick="expandSlide(this);"/>
        </div>
        <div class="column">
            <img class="zoom" src="assets/images/slideGallery/4.jpg" alt="Collections from best cellars" style="width:100%"
                 onclick="expandSlide(this);"/>
        </div>
      <div class="column">
            <img class="zoom" src="assets/images/slideGallery/5.jpg" alt="Premium wineries from all over the world"
                 style="width:100%" onclick="expandSlide(this);"/>
        </div> 
        <div class="column">
            <img class="zoom" src="assets/images/slideGallery/6.jpg" alt="Famous manufacturers" style="width:100%"
                 onclick="expandSlide(this);"/>
        </div>
    </div>

    <div class="container-slide">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <img id="expandedImg" style="width:100%">
        <div id="imgtext"></div>
    </div>
    <?php
    if ($products !== null && count($products) !== 0) :
        ?>
        <h2>Don't miss it !</h2>
        <section class="container" id="container">
            <?php
            foreach ($products as $product):
                $dbPicture = productsPicture($product['prodId']);
                $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/products/noPicture.jpg';
                $oldPrice = $product['standardPrice'];
                $price = number_format($oldPrice - ($oldPrice * $product['discount'] / 100), 2, '.', '');
                ?>
                <article>
                    <div class="sale-section"><?= $product['discount'] . ' %' ?></div>
                    <a href="?c=products&a=theProduct&i=<?= $product['prodId'] ?>"><img class="container-image"
                                                                                        src="<?php echo $picture; ?>"></a><br>
                    <div class="container-name">
                        <a href="?c=products&a=theProduct&i=<?= $product['prodId'] ?>"> <?= $product['prodName']; ?></a>
                    </div>
                    <div class="old-price"><?= $oldPrice . ' €' ?></div>
                    <div class="container-price new-price">
                        <?= 'New price:' . $price . ' €' ?>
                    </div>
                    <form action="?a=shoppingCartShow&i=<?= $product['prodId']; ?>"
                          method="post">
                        <div class="basket-button">
                            <input type="submit" value="Add to basket"
                                   onclick="preventDefaultAndUseAjax(event, <?= $product['prodId']; ?>)"/>
                        </div>
                    </form>

                </article>
                <?php $postID = $product['prodId']; ?>
            <?php endforeach; ?>
            <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;"></div>
        </section>
    <?php endif; ?>
</div>
<div id="nextPrevious">
    <?php if ($_GET['page'] != 1): ?>
    <a href="<?= $_SERVER['PHP_SELF'] ?>?c=pages&a=start&page=<?= $_GET['page'] - 1 ?>#container">Previous</a>
    <?php endif;?>
    <?php if ($_GET['page'] != $this->_params['pagesNumber']) : ?>
    <a href="<?= $_SERVER['PHP_SELF'] ?>?c=pages&a=start&page=<?= $_GET['page'] + 1 ?>#container">Next</a>
    <?php endif; ?>
</div>
<div>
    <button id="loadMore">Load More</button>
</div>


