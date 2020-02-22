
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(window).scroll(function () {
            var lastID = $('.load-more').attr('lastID');
            if (($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax_more.php',
                    data: 'id=' + lastID,
                    beforeSend: function () {
                        $('.load-more').show();
                    },
                    success: function (html) {
                        $('.load-more').remove();
                        $('#postList').append(html);
                    }
                });
            }
        });
    });
</script>
<?php
$dbQuery = null;
$postID=null;
$counter=0;
$dbQuery = $this->_params['products']; ?>
<?php if ($dbQuery === null || count($dbQuery) === 0): ?>

<h3 class="noProd">There are no products in such a category</h3>
        <?php include 'dropdownFilter.php'; ?>
        <?php else:
            include 'dropdownFilter.php'; ?>
        <div  id="postList">
            <section class="container">
                <?php foreach ($dbQuery as $key => $value): ?>

                    <?php $dbPicture = productsPicture($dbQuery[$key]['prodId']);
                    $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
                    $price = $dbQuery[$key]['standardPrice'] - ($dbQuery[$key]['standardPrice'] * $dbQuery[$key]['discount'] / 100);
                    ?>
                    <article>
                        <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['prodId'] ?>"><img
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
                <?php
                $counter++;
                if ($counter===count($dbQuery)){
                    $postID=$dbQuery[$key]['prodId'];
                }
                    ?>
                <?php endforeach; ?>
                <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
                    <img src="loading.gif"/>
                </div>
            </section>
        <?php endif; ?>
</div>

