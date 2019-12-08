products:
<br> <br>

<a href="?b=alle">alle Producte</a>
<?php include __DIR__.'/../allProducts.php';?>

<?php foreach($result as $key =>$value):?>

<form method = "get" action="./views/pages/theProduct.php">
<?= $result[$key]['name'];?>
<input type="submit" name="product" value="<?= $result[$key]['name'];?>">
</form>
    <br>
<?php endforeach; ?>