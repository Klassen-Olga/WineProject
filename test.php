<?php
require_once 'config/imports.php';
$counter = 1;//////////////////
$dbQuery = null;
$dbQuery = \skwd\models\Product::find();

?>

    <section  class="container" onscroll="myFunction()">

<?php foreach ($dbQuery as $key => $value): ?>

<?php 
$counter++;
$dbPicture = productsPicture($dbQuery[$key]['id']);
$picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
$price =  $dbQuery[$key]['standardPrice']-($dbQuery[$key]['standardPrice']*$dbQuery[$key]['discount']/100);
?>

    <article onscroll="myFunction()">
        <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"><img class="container-image" src="<?php echo $picture; ?>"></a><br>
        <div class="container-name">
            <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"> <?= $dbQuery[$key]['prodName']; ?></a>
        </div>
        <div class="container-price">
            <?= $price . ' €' ?>
        </div>
        <iframe name="hiddenFrame" class="hide"></iframe>
        <form action="?a=shoppingCartShow&i=<?= $dbQuery[$key]['id']; ?>&p=<?= $price; ?>"
              method="post"><!-- --><?/*= usersIdIfLoggedIn() === null ? "" : "target=\"hiddenFrame\"" */?>
            <div class="basket-button">
                <button type="submit">Add to basket</button>
            </div>
        </form>
       
    </article>
<?php if ($counter > 4) {
    
break;
}
?>

<?php endforeach; ?>
<button type="submit" onclick="myFunction()"> Add to basket</button>
<p id="test12345"></p>

    </section>

