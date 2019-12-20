<?php foreach ($dbQuery as $key => $value): ?>
    <?php $dbPicture = \skwd\models\Picture::find('productID= ' . $dbQuery[$key]['id']);
    $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
    ?>
    <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"><img src="<?php echo $picture; ?>"></a><br>
    <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"> <?= $dbQuery[$key]['prodName']; ?></a>


    <?= $dbQuery[$key]['standardPrice'] ?>
<?php endforeach; ?>








