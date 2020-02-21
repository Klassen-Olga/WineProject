<?php
$dbQuery = null;
$dbQuery = $this->_params['products']; ?>
<?php if ($dbQuery === null || count($dbQuery) === 0): ?>
<h3 class="noProd">There are no products in such a category.<h5>
<?php include 'dropdownFilter.php';?>
<?php else:
    include 'dropdownFilter.php'; ?>
<section>
</section>
    <section class="container">
        <?php foreach ($dbQuery as $key => $value): ?>

            <?php $dbPicture = productsPicture($dbQuery[$key]['prodId']);
            $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
            $price =  $dbQuery[$key]['standardPrice']-($dbQuery[$key]['standardPrice']*$dbQuery[$key]['discount']/100);
            ?>
                <article>
                    <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['prodId'] ?>"><img class="container-image" src="<?php echo $picture; ?>"></a><br>
                    <div class="container-name">
                        <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['prodId'] ?>"> <?= $dbQuery[$key]['prodName']; ?></a>
                    </div>
                    <div class="container-price">
                        <?= $price . ' €' ?>
                    </div>

                    <form action="?c=pages&a=shoppingCartShow&i=<?= $dbQuery[$key]['prodId']; ?>"
                          method="post">
                        <div class="basket-button">
                            <input type="submit" onclick="preventDefaultAndUseAjax(event, <?= $dbQuery[$key]['prodId']; ?>)" value="Add to basket"/>
                        </div>
                    </form>

                </article>

        <?php endforeach; ?>
    </section>
<?php endif; ?>