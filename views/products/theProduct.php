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
            <div>
                <h2><?= $product[0]['prodName'] ?></h2><br>
                <?php foreach ($pictures as $key => $value): ?>
                    <img class="image-theProduct" src="<?= $value['path'] ?>"
                <?php endforeach; ?>
                <?= $product[0]['description'] ?>
            </div>
        <?php endif; ?>
        <div>
            <table>
                <?php foreach ($query as $key => $value): ?>
                    <tr>
                        <td><?php echo $query[$key]['name'] ?></td>
                        <td><?= $query[$key]['value']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div>
            <p>Price: <?= $product[0]['standardPrice'] . ' €' ?></p>

            <iframe name="hiddenFrame" class="hide"></iframe>
            <form action="?c=pages&a=shoppingCartShow&i=<?= $product[0]['id'] ?>&p=<?= $priceOfProduct ?>"
                  method="post" <?= usersIdIfLoggedIn() === null ? "" : "target=\"hiddenFrame\"" ?> >
                <button type="submit">Add to basket</button>
            </form>
            <div>
    </section>
<?php else: ?>
    <p>This product is missing</p>
<?php endif; ?>
