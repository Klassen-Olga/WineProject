<?php
$dbQuery = null;
$dbQuery = \skwd\models\Product::find();
$this->_params['error']=[];
?>
<?php if ($dbQuery === null || count($dbQuery) === 0):
    array_push($this->_params['error'], "There are no products yet");
    ?>
<?php else: ?>
    <?php foreach ($dbQuery as $key => $value): ?>
        <?php $dbPicture = \skwd\models\Picture::find('productID= ' . $dbQuery[$key]['id']);
        $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
        ?>
        <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"><img src="<?php echo $picture; ?>"></a><br>
        <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"> <?= $dbQuery[$key]['prodName']; ?></a>
        <?= $dbQuery[$key]['standardPrice'] ?>
        <iframe name="hiddenFrame" class="hide"></iframe>
        <form action="?a=basket&i=<?= $dbQuery[$key]['id'] ?>" method="post" target="hiddenFrame">

            <button type="submit">Add to basket</button>
        </form>
    <?php endforeach; ?>
<?php endif; ?>








