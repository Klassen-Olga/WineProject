<?php
$accountId = getAccountId();
$shoppingCartItems =getShoppingCartItems($accountId);
if (count($shoppingCartItems) === 0):?>

    <article class="basket-noProducts" id="basket-noProducts">
        <h3>Your shopping cart is empty</h3>
        <p>Continue shopping on your SKWD online shop <a href="?c=products&a=allProducts"> here</a></p>
    </article>
<?php else: ?>
    <?php
$itemNumb=getBasketQTY($accountId);
$sum=getBasketSubtotal($accountId);
    ?>

    <section class="basket-container" id="basket-container">
        <h1>Your basket products</h1>
        <div class="subtotal">
            <h2 id="shoppingCartTotal">Subtotal for <?= $itemNumb ?> items: <?= $sum . ' €' ?></h2>
            <div class="proceedToCheckout">
                <a href="?c=pages&a=checkout">Proceed to order</a>
            </div>
        </div>

        <div class="row-basket" id="rowBasket">
            <?php foreach ($shoppingCartItems as $shoppingCartItem):


                $product=\skwd\models\Product::find('prodId= '.$shoppingCartItem['productID']);
                if($product!==null && count($product)>0 ):
                    $product=$product[0];
                    $pictures = productsPicture($shoppingCartItem['productID']);
                    $picturePath = count($pictures) > 0 ? $pictures[0]['path'] : 'assets/images/products/noPicture.jpg';
                    $productName = $product['prodName'];
                    $price=is_null($product['discount']) ? $product['standardPrice']: number_format($product['standardPrice']-($product['standardPrice']*$product['discount']/100), 2, '.', '')
                    ?>
                    <div class="column-basket">

                        <div class="basket-image">
                            <a href="?c=products&a=theProduct&i=<?= $shoppingCartItem['productID'] ?>"><img
                                        src="<?= $picturePath ?>"></a>

                        </div>
                        <p>Price: <?= $price ?>€</p>
                        <a href="?c=products&a=theProduct&i=<?=$shoppingCartItem['productID'] ?>"> <?= $productName ?></a><br>
                        <div class="product-basket-content">
                            <form method="post" action="?c=pages&a=shoppingCartShow&i=<?= $shoppingCartItem['productID'] ?>&cartOp=upDate">

                                <select name="qty" class="qtySelector" onchange="changeQTY(this, <?= $shoppingCartItem['productID']?>)">
                                    <option value="1">1</option>
                                    <?php for ($i = 2; $i < 11; ++$i): ?>
                                        <option value="<?= $i ?>" <?= isset($shoppingCartItem['qty']) ? ($shoppingCartItem['qty'] == $i ? " selected " : '') : '' ?>><?= $i ?></option>;
                                    <?php endfor; ?>
                                </select>
                                <button type="submit" class="submitChangeQTY">Change quantity</button>
                                <br><br>
                            </form>
                            <form method="post"
                                  action="?c=pages&a=shoppingCartShow&i=<?= $shoppingCartItem['productID'] ?>&cartOp=delete">
                                <input type="submit" value="Delete" onclick="deleteItem(event,this, <?= $shoppingCartItem['productID'] ?>)"/>
                            </form>
                        </div>
                    </div>
            <?php endif;?>
                <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
