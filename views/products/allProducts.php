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
        <?php $dbPicture = productsPicture($dbQuery[$key]['id']);
        $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
        //TODO: Function to price manipulation
        $price=$dbQuery[$key]['standardPrice'];
        ?>
        <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"><img src="<?php echo $picture; ?>"></a><br>
        <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"> <?= $dbQuery[$key]['prodName']; ?></a>
        <?= $price ?>
        <iframe name="hiddenFrame" class="hide"></iframe>
        <form action="?a=shoppingCart&i=<?= $dbQuery[$key]['id'] ?>&p=<?=$price?>" method="post" <?= usersIdIfLoggedIn()===null? "": "target=\"hiddenFrame\"" ?>>
            <button type="submit">Add to basket</button>
        </form>
    <?php endforeach; ?>
<?php endif; ?>








