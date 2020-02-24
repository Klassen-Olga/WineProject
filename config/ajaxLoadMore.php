<?php
require_once 'database.php';
require_once '../helper/functions.php';
require_once '../models/baseModel.class.php';
require_once '../models/picture.class.php';
require_once 'init.php';
if (!empty($_POST["id"])):
    $db = $GLOBALS['db'];
    $showLimit = NUMBER_LIMIT;
    $lastID = $_POST['id'];

//Get all rows except already displayed
    try {

        $queryAll = $db->prepare("SELECT COUNT(*) as num_rows FROM product WHERE discount is not null and  prodId < " . $lastID . " ORDER BY prodId DESC");
        $queryAll->execute();
        $rowAll = $queryAll->fetch();
        $allNumRows = $rowAll['num_rows'];
// Get records from the database
        $statement = $db->prepare("SELECT * FROM product WHERE discount is not null and prodId < " . $lastID . " ORDER BY prodId DESC LIMIT " . $showLimit);
        $statement->execute();
    } catch (\PDOException $e) {
        die($e->getMessage());
    }
    if ($statement->rowCount() > 0) :?>
        <section class="container">
            <?php while ($row = $statement->fetch()):
                $postID = $row['prodId'];
                $dbPicture = productsPicture($row['prodId']);
                $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
                $price = $row['standardPrice'] - ($row['standardPrice'] * $row['discount'] / 100);
                ?>
                <article>
                    <div class="sale-section"><?= $row['discount'] . ' %' ?></div>
                    <a href="?c=products&a=theProduct&i=<?= $row['prodId'] ?>"><img class="container-image"
                                                                                    src="<?php echo $picture; ?>"></a><br>
                    <div class="container-name">
                        <a href="?c=products&a=theProduct&i=<?= $row['prodId'] ?>"> <?= $row['prodName']; ?></a>
                    </div>
                    <div class="old-price"><?= $row['standardPrice'] . ' €' ?></div>
                    <div class="container-price new-price">
                        <?= 'New price:' . $price . ' €' ?>
                    </div>
                    <form action="?a=shoppingCartShow&i=<?= $row['prodId']; ?>"
                          method="post">
                        <div class="basket-button">
                            <input type="submit" value="Add to basket"
                                   onclick="preventDefaultAndUseAjax(event, <?= $row['prodId']; ?>)"/>
                        </div>
                    </form>
                </article>
            <?php endwhile; ?>
        </section>
        <?php if ($allNumRows > $showLimit) : ?>
            <div class="load-more" lastID="<?php echo $postID; ?>" get="<?= http_build_query($_POST) ?> "
                 style="display: none;"></div>
        <?php else : ?>
            <div class="load-more" lastID="0">

            </div>
        <?php endif;
    else: ?>
        <div class="load-more" lastID="0">
            That's All!
        </div>
    <?php endif;
endif;



