<?php
$id=$_GET['i'];
$query=\skwd\models\AllProducts::find("productID=".$id);
$pictures=\skwd\models\Picture::find("productID=".$id);
$product=\skwd\models\Product::find("id= ".$id);
if (count($product)!==0):
?>
<h2><?=$product[0]['prodName']?></h2><br>
<article><?= $product[0]['description']?></article><br>
<table>
    <?php foreach ($query as $key=> $value):?>
        <tr>
            <td><?php echo $query[$key]['name']?></td>
            <td><?=$query[$key]['value'];?></td>
        </tr>
    <?php endforeach;?>
</table>
<p>Price: <?= $product[0]['standardPrice']. ' €'?></p>
<a href="?c=pages&a=checkout">Proceed to checkout</a>
    <iframe name="hiddenFrame" class="hide"></iframe>
    <form action="?c=pages&a=shoppingCart&i=<?= $product[0]['id'] ?>" method="post" <?= usersIdIfLoggedIn()===null? "": "target=\"hiddenFrame\"" ?> >
        <button type="submit">Add to basket</button>
    </form>
<?php if (count($pictures)!==0):?>
    <?php foreach($pictures as $key=>$value):?>
        <img src="<?= $value['path']?>"
    <?php endforeach;?>
<?php endif;?>
<?php else:?>
    <p>This product is missing</p>
<?php endif;?>
