<?php
echo "shoppingCartShow.php";
/*if (isset($_COOKIE['destination'])&&$_COOKIE['destination']==='basket'){
    unset($_COOKIE['destination']);
}
if (isset($_COOKIE['id'])===false && isset($_SESSION['id'])===false){
    setcookie('destination','basket', time() + 600, '/');
    header('Location: index.php?c=pages&a=login');
}
else{
    if (isset($_GET['i'])){
        $productId=$_GET['i'];
        $dbPicture = \skwd\models\Picture::find('productID= ' . $productId);
        $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
        $product=\skwd\models\Product::find('id='.$productId);
        $product=$product[0];
        $standardPrice=$product['standardPrice'];
        $newBasketProduct=array('id'=>$productId,'prodName'=>$product['prodName'],'picturePath'=>$picture,'standardPrice'=>$standardPrice);
        if (isset($_SESSION['shoppingCart'])){
            $_SESSION['shoppingCart'][]=$newBasketProduct;
        }
        else{
            $_SESSION['shoppingCart'][]=$newBasketProduct;
        }
    }

}*/

