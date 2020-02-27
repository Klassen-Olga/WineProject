<?php
$dbQuery = null;
$postID = null;
$counter = 0;
$dbQuery = $this->_params['products']; ?>
<?php if ($dbQuery === null || count($dbQuery) === 0): ?>

    <h3 class="noProd">There are no products in such a category</h3>
    <?php include 'dropdownFilter.php'; ?>
<?php else:
include 'dropdownFilter.php'; ?>
<div id="postList">
    <section class="container">
        <?php foreach ($dbQuery as $key => $value): ?>
            <?php $dbPicture = productsPicture($dbQuery[$key]['prodId']);
            $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/products/noPicture.jpg';
            $price =floatval($dbQuery[$key]['standardPrice']);
            if ($dbQuery[$key]['discount'] !== null) {
                $price= number_format($price - ($price * $dbQuery[$key]['discount'] / 100), 2, '.', '');
            }
            //$price = $dbQuery[$key]['standardPrice'] - ($dbQuery[$key]['standardPrice'] * $dbQuery[$key]['discount'] / 100);
            ?>
            <article>
                <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['prodId'] ?>"><img alt="products-picture"
                            class="container-image" src="<?php echo $picture; ?>"></a><br>
                <div class="container-name">
                    <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['prodId'] ?>"> <?= $dbQuery[$key]['prodName']; ?></a>
                </div>
                <div class="container-price">
                    <?= $price . ' €' ?>
                </div>

                <form action="?c=pages&a=shoppingCartShow&i=<?= $dbQuery[$key]['prodId']; ?>"
                      method="post">
                    <div class="basket-button">
                        <input type="submit"
                               onclick="preventDefaultAndUseAjax(event, <?= $dbQuery[$key]['prodId']; ?>)"
                               value="Add to basket"/>
                    </div>
                </form>
            </article>
        <?php endforeach; ?>
    </section>
    <?php endif; ?>
    <div id="nextPreviousNoAjax">
        <?php if ($_GET['page'] != 1): ?>
            <a href="<?= removeQuery(array('page')) ?>&page=<?= $_GET['page'] - 1 ?>">Previous</a>
        <?php endif; ?>
        <?php if ($_GET['page'] != $this->_params['pagesNumber']) : ?>
            <a href="<?= removeQuery(array('page')) ?>&page=<?= $_GET['page'] + 1 ?>">Next</a>
        <?php endif; ?>
    </div>
</div>

