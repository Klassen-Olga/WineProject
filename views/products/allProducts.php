<?php
$dbQuery = null;
$dbQuery = \skwd\models\Product::find();
$this->_params['error'] = [];
?>
<?php if ($dbQuery === null || count($dbQuery) === 0):
    array_push($this->_params['error'], "There are no products yet");
    ?>
<?php else: ?>
    <section class="container">
        <?php foreach ($dbQuery as $key => $value): ?>

            <?php $dbPicture = productsPicture($dbQuery[$key]['id']);
            $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
            $price =  $dbQuery[$key]['standardPrice']-($dbQuery[$key]['standardPrice']*$dbQuery[$key]['discount']/100);
            ?>
                <article>
                    <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"><img class="container-image" src="<?php echo $picture; ?>"></a><br>
                    <div class="container-name">
                        <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"> <?= $dbQuery[$key]['prodName']; ?></a>
                    </div>
                    <div class="container-price">
                        <?= $price . ' €' ?>
                    </div>

                    <form action="?a=shoppingCartShow&i=<?= $dbQuery[$key]['id']; ?>" id="addToBasketForm"
                          method="get">
                        <div class="basket-button">
                            <input type="submit" onclick="preventDefaultAndUseAjax(event, <?= $dbQuery[$key]['id']; ?>)" value="Add to basket"/>
                        </div>
                    </form>

                </article>

        <?php endforeach; ?>
    </section>
<?php endif; ?>










