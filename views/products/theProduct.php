<?php
$id = $_GET['i'];
$query = \skwd\models\AllProducts::find("productID=" . $id);
$pictures = \skwd\models\Picture::find("productID=" . $id);
$product = \skwd\models\Product::find("id= " . $id);
$priceOfProduct = \skwd\models\Product::find("id= " . $id)[0]['standardPrice'];
if (count($product) !== 0):
    ?>
    <section class="max-section">
        <?php if (count($pictures) !== 0): ?>
            <div class="image-theProduct">
                <?php foreach ($pictures as $key => $value): ?>
                    <img class="image-theProduct" src="<?= $value['path'] ?>">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <h2><?= $product[0]['prodName'] ?></h2><br>
        <div class="table-theProduct">
            <table>
                <?php foreach ($query as $key => $value): ?>
                    <tr>
                        <td><?php echo $query[$key]['name'] ?></td>
                        <td><?= $query[$key]['value']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="price-add-to-basket-theProduct">
            <div>
            <p>Price: <?= $product[0]['standardPrice'] . ' €' ?></p>

            <iframe name="hiddenFrame" class="hide"></iframe>
            <form action="?c=pages&a=shoppingCartShow&i=<?= $product[0]['id'] ?>&p=<?= $priceOfProduct ?>"
                  method="post" <?= usersIdIfLoggedIn() === null ? "" : "target=\"hiddenFrame\"" ?> >
                <button type="submit">Add to basket</button>
            </form>
            </div>
        </div>
                <?= $product[0]['description'] ?>
    </section>
<?php else: ?>
    <p>This product is missing</p>
<?php endif; ?>
