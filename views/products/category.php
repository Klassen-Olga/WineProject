<?php
$category = $_GET['s'];
$this->_params['error'] = [];
$setWithProductIdAndPropertyId = \skwd\models\PropertyProProduct::find('value= \'' . $category . '\'');
?>
<?php if (count($setWithProductIdAndPropertyId) === 0):
    array_push($this->_params['error'], 'There is no products with category ' . $category . ' yet');
else :?>
    <section class="container">
        <?php foreach ($setWithProductIdAndPropertyId as $key => $value):
            $productId = $value['productID'];
            $product = \skwd\models\Product::find('prodId=' . $productId);
            $dbPicture = productsPicture($productId);
            $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
            $priceOfProduct=$product[0]['standardPrice'];
            if ($product[0]['discount']!==null){
                $priceOfProduct = $product[0]['standardPrice']-($product[0]['standardPrice']*$product[0]['discount']/100);
            }
            ?>
            <article>
                <a href="?c=products&a=theProduct&i=<?= $productId ?>"><img class="container-image" src="<?php echo $picture; ?>"></a><br>
                <div class="container-name">
                    <a href="?c=products&a=theProduct&i=<?= $productId ?>"> <?= $product[0]['prodName']; ?></a>
                </div>
                <div class="container-price">
                    <?= $priceOfProduct . ' €' ?>
                </div>
                <form action="?c=pages&a=shoppingCartShow&i=<?= $productId ?>" method="post">
                    <div class="basket-button">
                        <input type="submit" onclick="preventDefaultAndUseAjax(event, <?=$productId ?>)" value="Add to basket"/>
                    </div>
                </form>
            </article>
        <?php endforeach; ?>
    </section>
<?php endif; ?>

