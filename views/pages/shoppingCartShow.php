<?php
$accountId = isset($_SESSION['id']) ? $_SESSION['id'] : $_COOKIE['id'];
$shoppingCart = \skwd\models\ShoppingCart::find('accountId=' . $accountId);
$shoppingCart = $shoppingCart[0];
$shoppingCartItems = \skwd\models\ShoppingCartItem::find('shoppingCartId=' . $shoppingCart['id']);
if (count($shoppingCartItems) === 0):?>

    <article class="basket-noProducts">
        <h3>Your shopping cart is empty</h3>
        <p>Continue shopping on your SKWD online shop <a href="?c=products&a=allProducts"> here</a></p>
    </article>
<?php else: ?>
    <?php

    $sum = 0;
    $itemNumb = 0;
    foreach ($shoppingCartItems as $item) {
        $sum += $item['actualPrice'] * $item['qty'];
        $itemNumb += $item['qty'];
    }
    ?>
    <h1>Your basket products</h1>
    <section class="basket-container">
        <div class="subtotal">
            <h2>Subtotal for <?= $itemNumb ?> items: <?= $sum . ' €' ?></h2>
            <div class="proceedToCheckout">
                <a href="?c=pages&a=checkout">Proceed to order</a>
            </div>
        </div>

        <div class="row-basket">
            <?php foreach ($shoppingCartItems as $shoppingCartItem):
                $pictures = productsPicture($shoppingCartItem['productID']);
                $picturePath = count($pictures) > 0 ? $pictures[0]['path'] : 'assets/images/noPicture.jpg';
                $productName = \skwd\models\Product::find('id=' . $shoppingCartItem['productID'])[0]['prodName'];
                ?>
                <div class="column-basket">
                    <a href="?c=products&a=theProduct&i=<? $shoppingCartItem['productID'] ?>"> <?= $productName ?></a><br>
                    <div class="basket-image">
                        <a href="?c=products&a=theProduct&i=<?= $shoppingCartItem['productID'] ?>"><img
                                    src="<?= $picturePath ?>"></a>
                    </div>
                    <br>
                    <div class="product-basket-content">
                        <p>Price: <?= $shoppingCartItem['actualPrice'] ?></p>
                        <p>Quantity: <?= $shoppingCartItem['qty'] ?></p>
                        <iframe name="hiddenFrame" class="hide"></iframe>
                        <form method="post"
                              action="?c=pages&a=shoppingCartShow&i=<?= $shoppingCartItem['productID'] ?>&cartOp=delete"
                              target="hiddenFrame">
                            <button type="submit">Delete</button>
                        </form>
                        <iframe name="hiddenFrame" class="hide"></iframe>
                        <form method="post"
                              action="?c=pages&a=shoppingCartShow&i=<?= $shoppingCartItem['productID'] ?>&p=<?= $shoppingCartItem['actualPrice'] ?>&cartOp=upDate"
                              target="hiddenFrame">
                            <select name="qty">
                                <option value="1">1</option>
                                <?php for ($i = 2; $i < 11; ++$i): ?>
                                    <option value="<?= $i ?>" <?= isset($shoppingCartItem['qty']) ? ($shoppingCartItem['qty'] == $i ? " selected " : '') : '' ?>><?= $i ?></option>;
                                <?php endfor; ?>
                            </select>
                            <button type="submit">Change quantity</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </section>
<?php endif; ?>

