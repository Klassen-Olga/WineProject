<?php
/*if (isset($_COOKIE['destination'])&&$_COOKIE['destination']==='basketShow'){
    unset($_COOKIE['destination']);
}
if (isset($_COOKIE['id'])===false && isset($_SESSION['id'])===false){
    setcookie('destination','basketShow', time() + 600, '/');
    header('Location: index.php?c=pages&a=login');
}
if (isset($_SESSION['shoppingCart'])===false):*/?><!--
<h3>Your shopping cart is empty</h3>
    <p>Continue shopping on your SKWD online shop</p><a href="?c=products&a=allProducts"> here</a>
<?php /*else:*/?>
<h3>Your basket products</h3>
<?php
/*    foreach ((array)$_SESSION['shoppingCart'] as $products):*/?>
    <?php /*foreach ((array)$products as $product):*/?>
        <a href="?c=products&a=theProduct&i=<?/*= $product['id'] */?>"><img src="<?php /*echo $product['picturePath']; */?>"></a><br>
        <a href="?c=products&a=theProduct&i=<?/*= $product['id'] */?>"> <?/*= $product['prodName']; */?></a>
        <?/*= $product['standardPrice'] */?>
    <?php /*endforeach;*/?>
<?php /*endforeach;*/?>
--><?php /*endif;*/?>
