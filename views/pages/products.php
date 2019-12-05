products:
<br> <br>

<a href="?b=alle">alle Producte</a>
<?include __DIR__.'/../allProducts.php';?>

<?php foreach($result as $key =>$value):?>

<form method = "get" action="./views/pages/theProduct.php">
<?echo $result[$key]['name'];?>
<input type="submit" name="product" value="<?echo$result[$key]['name'];?>">
</form>
    <br>
<?php endforeach; ?>